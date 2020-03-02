<?php
namespace App\Controller\Paperadmin;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Firebase\JWT\JWT;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use \Exception;
use Cake\Datasource\ConnectionManager;

class UserController extends AppController
 {
   
	 public function initialize()
    {
        parent::initialize();
		$this->Auth->allow(['usersearch']);
		$this->viewBuilder()->layout('admin/admin_home'); 
		// if(!$this->Auth->user())
		// {
			// $this->viewBuilder()->layout('admin/admin_login'); 
		// }
		// else
		// {
			// $this->viewBuilder()->layout('admin/admin_login'); 
		// }
		$access_token="EAACEdEose0cBALE3GCBHIXuFnmRZCj0i1djWHg9LsrKaW3OInOGseTnRP7Jm8Vs1wPybi3BmQN9R1kPPW5jBz0jpTBwXCbpZAqFrtas5zqhJVZAvsz1IguemOyCgU2FA8Esl2kk8Hy0u3XiejdkYqngwcYXyN9zwoQWRXx6fxGjBB0w8YrOQAlgVSGkkwwZD";
	}
    public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		 error_reporting(0);
	}
	public function hokerlist()
    {
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$UserTable = TableRegistry::get('Users');
		$routeTable = TableRegistry::get('Route');
		
		$userdata=$UserTable->find()
						->contain(['Route'])
					  ->where(['Users.status'=>'active','Users.role_id'=>'3','Users.parent_user_id'=>$parent_user_id])
					  ->toArray();
		$routedata=$routeTable->find()
						->where(['status'=>'y','parent_user_id'=>$parent_user_id])
						->toArray();
		if($this->request->is('post'))
        {
			extract($this->request->data);
			if($name)
			{
				
				if(count($selected_area)>0)
				{
					
					 $this->request->data['area_id']=implode(',',$selected_area);
				}
				$this->request->data['role_id']=3;
				$this->request->data['user_code']=$this->generatetoken();
				// pr($this->request->data);
				// die;
				$this->request->data['parent_user_id']=$parent_user_id;
				$entity=$UserTable->newEntity($this->request->data);
				if($UserTable->save($entity))
				{
					$this->Flash->set('Hoker Added Successfully', [
						'element' => 'success'
					]);
					return $this->redirect(['action' => 'hokerlist']);
				}
				else
				{
					$this->Flash->set('Something Went Wrong', [
						'element' => 'error'
					]);
					return $this->redirect(['action' => 'hokerlist']);
				}
			}
			else
			{
				return $this->redirect(['action' => 'hokerlist']);
			}
		}
		$this->set(compact('userdata','routedata'));
    }
	 public function generatetoken()
    {
        
        $token_code=substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 4)), 0,6);
        // $token_code=$token_code;
        $userTable = TableRegistry::get('Users');
        $Tokencheck=$userTable->find('all',['conditions'=>['user_code'=>$token_code]])->count();
        if(($Tokencheck)>0)
        {
            $token_code=$this->generatetoken();
        }
		// echo $token_code;
		// die;
        return $token_code;

    }
	public function generateusercode($req_data)
	{
		// pr($req_data);
		// die;
		$route_name=strtoupper($req_data['route_name']);
		$area_name=strtoupper($req_data['area_name']);
		$words = explode(" ",$route_name);
		$code_pre = "";
        $i=1;
		foreach ($words as $w) {
		  $code_pre .= $w[0];
		  if($i>2)
			  break;
		  $i++;
		}
		$words2 = explode(" ",$area_name);
		$j=1;
		foreach ($words2 as $w) {
		  $code_pre .= $w[0];
		  if($j>2)
			  break;
		  $j++;
		}
		$new_id=$req_data['last_inserted_id']+1;
		$user_code=$code_pre.$new_id;
		// pr($code_pre);
		// die;
		return $user_code;
		// $route_id=
	}
	public function viewhoker()
	{
		if($this->request->is('post'))
        {
			extract($this->request->data);
			$UserTable = TableRegistry::get('Users');
			$AreaTable = TableRegistry::get('Area');
			$userdata=$UserTable->find()
						->contain(['Route'])
						->select(['Users.route_id','Users.area_id','Users.id','Users.name','Users.email','Users.mobile','Users.join_date','Route.route_name'])
					  ->where(['Users.id'=>$user_id])
					  ->first();
			if(count($userdata)>0)
			{
				// selected area 
				$selected_area=$userdata['area_id'];
				$area_array_id=explode(",",$selected_area);
				$areadata=$AreaTable->find()
					->select(['id','area_name'])
					 ->where(['id IN'=>$area_array_id])
					  ->toArray();
				// pr($areadata);die;	 
				$userdata['area']=$areadata;
				$response['status'] =true;
				
				$response['data'] =$userdata;
				$response['msg'] = 'Route Found'; 
			}
			else
			{
				$response['status'] =false;
				$response['msg'] = 'No Route found'; 
			}
			// $this->
			
		}
		else
		{
			$response['status'] =false;
			$response['msg'] = 'No Route found'; 
			  
		}
	    echo json_encode($response);
		die;
	}
	public function deletehoker($user_id)
	{
		if($user_id)
		{
			$UserTable = TableRegistry::get('Users');
			$userdata=$UserTable->find()
						// ->contain(['Route'])
					  ->where(['Users.id'=>$user_id])
					  ->first();
			if(count($userdata)>0)
			{
				$userdata->status="n";
				if($UserTable->save($userdata))
				{
					$this->Flash->set('Hoker Added Successfully', [
						'element' => 'success'
					]);	
				}
				else
				{
					$this->Flash->set('No Hoker  Found', [
						'element' => 'error'
					]);	
				}
			}
			else
			{
				$this->Flash->set('No Hoker  Found', [
						'element' => 'error'
					]);	
			}
		}
		else
		{
		   $this->Flash->set('No Hoker  Found', [
						'element' => 'error'
					]);	
		}
		return $this->redirect(['action' => 'hokerlist']);  
		
	}
	public function routewisearea()
	{
			$this->viewBuilder()->layout(false); 
		if($this->request->is('post'))
        {
			// print_R($this->request->data);
			extract($this->request->data);
			if($route_id)
			{
				$AreaTable = TableRegistry::get('Area');
				$areadata=$AreaTable->find()
					  ->where(['route_id'=>$route_id])
					  ->toArray();
			}
			else
			{
				$areadata=[];
			}
			$this->set(compact('areadata'));
			
	    
		}
	}
	public function routewiseareauser()
	{
			$this->viewBuilder()->layout(false); 
		if($this->request->is('post'))
        {
			// print_R($this->request->data);
			extract($this->request->data);
			if($route_id)
			{
				$AreaTable = TableRegistry::get('Area');
				$areadata=$AreaTable->find()
						//->contain(['Area'])
					  ->where(['Area.route_id'=>$route_id])
					  ->toArray();
				// pr($routedata);
				// die;
			}
			else
			{
				$areadata=[];
			}
			$this->set(compact('areadata'));
			
	    
		}
	}
	public function userlist()
    {
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$UserTable = TableRegistry::get('Users');
		$userdata=$UserTable->find()
						->contain(['Route'])
					  ->where(['Users.status'=>'active','Users.role_id'=>'1','Users.parent_user_id'=>$parent_user_id])
					  ->order(['Users.id'=>'DESC'])
					  ->toArray();
		
		// pr($userdata);
		// die;
		$this->set(compact('userdata'));
    }
	public function createuser()
    {
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$UserTable = TableRegistry::get('Users');
		$UsertransationTable = TableRegistry::get('Usertransation');
		$routeTable = TableRegistry::get('Route');
		$RouteplanTable = TableRegistry::get('Routeplan');
		$PrintplanTable = TableRegistry::get('Printplan');
		$areaTable = TableRegistry::get('Area');
		// $Product = TableRegistry::get('Product');
		$WeekdaysTable = TableRegistry::get('Weekdays');
		
		$routedata=$routeTable->find()
						//->contain(['Area'])
						->where(['status'=>'y','parent_user_id'=>$parent_user_id])
						->toArray();
		$Weekdaysdata=$WeekdaysTable->find()
						//->contain(['Area'])
						->where(['status'=>'y'])
						->toArray();
		$ProductTable = TableRegistry::get('Product');
		$UserproductTable = TableRegistry::get('Userproduct');
		$productdata=$ProductTable->find()
					  ->where(['status'=>'y','parent_user_id'=>$parent_user_id])
					  ->toArray();
		// pr($productdata);
		// die;
		$this->set(compact('routedata','productdata','Weekdaysdata'));
		if($this->request->is('post'))
        {
			date_default_timezone_set("UTC");
			$utcdate=date('Y-m-d');
			$current_utc=strtotime($utcdate);
			// pr($this->request->data);
			// die;
			extract($this->request->data);
			if($name && $route_id)
			{
				$u['name']=$name;
				$u['email']=$email;
				$u['mobile']=$mobile;
				$u['role_id']='1';
				$u['route_id']=$route_id;
				$u['area_id']=$select_area;
				$u['address']=$address;
				$u['dob']=$dob;
				$u['adhar_no']=$adhar_no;
				$u['pan_no']=$pan_no;
				$u['join_date']=$join_date;
				$u['extra_phoneno']=$extra_phoneno;
				$u['balance']=$opening_balance;
				$u['parent_user_id']=$parent_user_id;
				// $u['dob']=$dob;
				$u['created_utc']=$current_utc;
				$u['balance_states']=$balance_type;
				if($user_code=='')
				{
					// get route name 
				
					$routedata=$routeTable->find()
							->where(['id'=>$route_id])
							->select(['route_name'])
							->first();
					// pr($routedata);
					// die;
					$areadata=$areaTable->find()
							->where(['id'=>$select_area])
							->select(['area_name'])
							->first();
					$req_data['route_name']=$routedata->route_name;
					$req_data['area_name']=$areadata->area_name;
					$req_data['name']=$name;
					$result=$UserTable->find()
							//->contain(['Area'])
							->select(['id'])
							->order(['id'=>'DESC'])
							->first();
					// pr($result);
					// die;
					$req_data['last_inserted_id']=$result->id;
					$u['user_code']=$this->generateusercode($req_data);
				}
				else
				{
					$u['user_code']=$user_code;
				}
				
				$working_type=$u['working_type']=$working_days_type;
				if($fix_user_working_days=='')
					$fix_user_working_days=0;
					
				$u['fix_working_days']=$fix_user_working_days;
				try{
						$entity=$UserTable->newEntity($u);
						if($result=$UserTable->save($entity))
						{
							$connection = ConnectionManager::get('default');
							$inserted_user_id=$result->id;
							$t['user_id']=$inserted_user_id;
							$t['parent_user_id']=$parent_user_id;
							if($balance_type=="adv")
							{
								$t['cr']=$opening_balance;
								$t['dr']=0;
							}
							else
							{
								$t['dr']=$opening_balance;
								$t['cr']=0;
							}
							$t['transation_utc']=$current_utc;
							$t['comment']="account opening balance";
							$entity=$UsertransationTable->newEntity($t);
							if($UsertransationTable->save($entity))
							{
								// product detail 
								$p=0;
								foreach($product_copy as $product)
								{
									$p_str=explode('_',$product);
									// pr($p_str);
									// die;
									if($p_str[0] && $p_str[1])
									{
										$po[$p]['product_id']=$p_str[0];
										$po[$p]['copies']=$p_str[1];
										$po[$p]['user_id']=$inserted_user_id;
										$po[$p]['parent_user_id']=$parent_user_id;
										$p++;
									}
								}
								$productentities = $UserproductTable->newEntities($po);
								 if($UserproductTable->saveMany($productentities))
								 {
								 }
								 else
								 {
										$this->Flash->set('Product Adding Failed', [
									'element' => 'error'
									]); 
								 }
								  // add route plan
								 $rp['user_id']=$inserted_user_id;
								 $rp['route_id']=$route_id;
								 $rp['area_id']=$select_area;
								 $rp['parent_user_id']=$parent_user_id;
								 if($selected_route_user_id)
								 {
									 // insert after specific user id 
									 $lastdata=$RouteplanTable->find()
									//->contain(['Area'])
									->select(['id','seq_no'])
									->where(['id'=>$selected_route_user_id])
									->first();
									$last_inserted_id=$lastdata->id;
									$seq_no=$rp['seq_no']=$seqdata=$lastdata->seq_no+1;
									$new_id=$last_inserted_id+1;
									
									 $query="UPDATE routeplan SET id = id + 1,seq_no=seq_no+1 WHERE id >='$new_id' order by id DESC";
									 $q2="INSERT INTO routeplan (id,user_id,route_id,area_id,seq_no) 
										VALUES ('$new_id','$inserted_user_id','$route_id','$select_area','$seq_no');";
									$fetchquery=$connection->execute($query);
									if($fetchquery)
									{
										$f2=$connection->execute($q2);
									}
									
								 }
								 else
								 {
									 // normal insert
									$lastdata=$RouteplanTable->find()
									//->contain(['Area'])
									->select(['id','seq_no'])
									->order(['id'=>'DESC'])
									->first();
									$rp['seq_no']=($lastdata->seq_no)+1;
									$rpentity=$RouteplanTable->newEntity($rp);
									$RouteplanTable->save($rpentity);
						
								 }
								 // add print plan 
								 $pp['user_id']=$inserted_user_id;
								 $pp['route_id']=$route_id;
								 $pp['area_id']=$select_area;
								 $pp['parent_user_id']=$parent_user_id;
								 if($selected_print_user_id)
								 {
									 // insert after specific user id 
									 $lastdata=$PrintplanTable->find()
									//->contain(['Area'])
									->select(['id','seq_no'])
									->where(['id'=>$selected_print_user_id])
									->first();
									$last_inserted_id=$lastdata->id;
									$pp['seq_no']=$seqdata=$lastdata->seq_no+1;
									$new_id=$last_inserted_id+1;
					
								 $query="UPDATE print_plan SET id = id + 1,seq_no=seq_no+1 WHERE id >='$new_id' order by id DESC";
								 $q2="INSERT INTO print_plan (id,user_id,route_id,area_id,seq_no) 
										VALUES ('$new_id','$inserted_user_id','$route_id','$select_area','$seq_no');";
									$fetchquery=$connection->execute($query);
									if($fetchquery)
									{
										$f2=$connection->execute($q2);
									}
								}
								 else
								 {
									 // normal insert
									$lastdata=$PrintplanTable->find()
									//->contain(['Area'])
									->select(['id','seq_no'])
									->order(['id'=>'DESC'])
									->first();
									$pp['seq_no']=($lastdata->seq_no)+1;
									$ppentity=$PrintplanTable->newEntity($pp);
									$PrintplanTable->save($ppentity);
						
								}
								// save user working days 
								 if($working_type=="select")
								 {
									$UserworkdaysTable = TableRegistry::get('Userworkdays');
									$w_arr=explode(',',$working_week);
									if(count($w_arr)>0)
									{
										$o=0;
										 foreach($w_arr as $w)
										 {
											 // pr($w);
											 // die;
											$wo[$o]['user_id']=$inserted_user_id;
											$wo[$o]['workdays_id']=$w;
											$wo[$o]['parent_user_id']=$parent_user_id;
											$o++;
										 }
										$went = $UserworkdaysTable->newEntities($wo);
										$UserworkdaysTable->saveMany($went);
									}
									
								 }
								$this->Flash->set('User Save Successfully', [
									'element' => 'success'
								]);
								return $this->redirect(['action' => 'userlist']);
							}
							else 
							{
								$this->Flash->set('Failed to Store Trsacation value', [
								'element' => 'error'
								]);
								return $this->redirect(['action' => 'userlist']);	
							}
							
						}
						else
						{
							$this->Flash->set('Some thing Went Wrong,Try Again', [
								'element' => 'error'
							]);
							return $this->redirect(['action' => 'createuser']);	
						}
					}
				catch(Exception $e){
					$msg=$e->getMessage();
					$this->Flash->set($msg, [
						'element' => 'error'
						]);
					return $this->redirect(['action' => 'userlist']);	
						}
			}
			else
			{
				$this->Flash->set('Some Required Parameter missing', [
						'element' => 'error'
					]);
					return $this->redirect(['action' => 'createuser']);
			}
			
		}
    }
	public function checkusercode()
	{
		$this->viewBuilder()->layout(false); 
		if($this->request->is('post'))
        {
			extract($this->request->data);
			if($user_code)
			{
				$UserTable = TableRegistry::get('Users');
				$userdata=$UserTable->find()
					->where(['Users.user_code'=>$user_code])
					  ->count();
				if($userdata==0)
				{
					$response['status'] =true;
					$response['msg'] = 'User Code Available'; 
				}
				else
				{
					$response['status'] =false;
					$response['msg'] = 'User Code Already taken, Try Another'; 
					  
				}
			}
		}
		else
		{
			$response['status'] =false;
			$response['msg'] = 'Required parameter missing'; 
			  
		}
	    echo json_encode($response);
		die;
	}
	public function testquery()
	{
		// $selected_route_user_id=5;
		// $RouteplanTable = TableRegistry::get('Routeplan');
		// $lastdata=$RouteplanTable->find()
						// ->contain(['Area'])
						// ->select(['id','seq_no','user_id'])
						// ->where(['user_id'=>$selected_route_user_id])
						// ->first();
						// $last_inserted_id=$lastdata->id;
						// $seq_no=$rp['seq_no']=$seqdata=$lastdata->seq_no+1;
		// pr(2);
		// die;
		// $inserted_user_id=11;
		// $route_id=1;
		// $select_area=2;
		// $new_id=$last_inserted_id+1;
		// $connection = ConnectionManager::get('default');
		// echo $query="UPDATE routeplan SET id = id + 1,seq_no=seq_no+1 WHERE id >='$new_id' order by id DESC";
	// echo $q2="INSERT INTO routeplan (id,user_id,route_id,area_id,seq_no) 
							// VALUES ('$new_id','$inserted_user_id','$route_id','$select_area','$seq_no');";
						// $fetchquery=$connection->execute($query);
						// if($fetchquery)
						// {
							// $f2=$connection->execute($q2);
						// }
		echo $w_str="1,2,3,4,5,7";
		$w_arr=explode(',',$w_str);
		if(count($w_arr)>0)
		{
			$o=0;
			 foreach($w_arr as $w)
			 {
				$wo[$o]['user_id']=1;
				$wo[$o]['workdays_id']=$w;
			 }
		}
		die;
	}
	public function viewuser($user_code)
    {
	   if($user_code=='')
	   {
		   extract($this->request->data);
		   $UserTable = TableRegistry::get('Users');
	   }
	
    }
	public function routeplan()
	{
		// $route_id=1;
		$this->viewBuilder()->layout(false); 
		if($this->request->is('post'))
        {
			// print_R($this->request->data);
			extract($this->request->data);
			if($route_id)
			{
				$RouteplanTable = TableRegistry::get('Routeplan');
				$data=$RouteplanTable->find()
						->contain(['Users.Route.Area'])
					  ->where(['Routeplan.route_id'=>$route_id])
					  ->order(['Routeplan.seq_no'=>'ASC'])
					  ->toArray();
				
			}
			else
			{
				$data=[];
			}
			// pr($data);
			// die;
			$this->set(compact('data','selected_route_user_id'));
			
	    
		}
	}
	public function printplan()
	{
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		// $route_id=1;
		$this->viewBuilder()->layout(false); 
		if($this->request->is('post'))
        {
			// print_R($this->request->data);
			extract($this->request->data);
			if($route_id)
			{
				$routeTable = TableRegistry::get('Route');
				$routedata=$routeTable->find()
						//->contain(['Area'])
						->where(['status'=>'y','parent_user_id'=>$parent_user_id])
						->toArray();
				$AreaTable = TableRegistry::get('Area');
					$areadata=$AreaTable->find()
						  ->where(['route_id'=>$route_id,'parent_user_id'=>$parent_user_id])
						  ->toArray();
				$PrintplanTable = TableRegistry::get('Printplan');
				if($area_id)
				{
					$data=$PrintplanTable->find()
						->contain(['Users.Route.Area'])
					  ->where(['Printplan.route_id'=>$route_id,'Users.area_id'=>$area_id,'Printplan.parent_user_id'=>$parent_user_id])
					  ->order(['Printplan.seq_no'=>'ASC'])
					  ->toArray();
				}
				else
				{
					$data=$PrintplanTable->find()
						->contain(['Users.Route.Area'])
					  ->where(['Printplan.route_id'=>$route_id,'Printplan.parent_user_id'=>$parent_user_id])
					  ->order(['Printplan.seq_no'=>'ASC'])
					  ->toArray();
				}
				
			}
			else
			{
				$data=[];
			}
			// pr($routedata);
			// die;   
			$this->set(compact('data','routedata','areadata','area_id','route_id'));
			
	    
		}
	}
	public function usersearch()
	{
		// $route_id=1;
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}  
		$this->viewBuilder()->layout(false); 
		if($this->request->is('post'))
        {
			extract($this->request->data);
			// pr($this->request->data);
			// die;
			if($keyword)
			{
				$connection = ConnectionManager::get('default');
				$q="SELECT * FROM users WHERE (name LIKE '%$keyword%' or user_code LIKE '%$keyword%') and role_id='1' and parent_user_id='$parent_user_id' and status='active'";
				$result=$connection->execute($q)->fetchAll('assoc');
			}
		}
		else
		{
			$result=[];
		}
			// pr($result);
			// die;  
		$this->set(compact('result','search_id'));
	}
	
	
	
	
 }
?>
