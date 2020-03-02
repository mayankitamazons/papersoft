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

class SettingController extends AppController
 {
   
	 public function initialize()
    {
        parent::initialize();
		// $this->Auth->allow();
		$this->viewBuilder()->layout('Admin/admin_home'); 
		// if(!$this->Auth->user())
		// {
			// $this->viewBuilder()->layout('admin/admin_login'); 
		// }
		// else
		// {
			// $this->viewBuilder()->layout('admin/admin_login'); 
		// }
	
	}
    public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		 error_reporting(0);
	}
	public function routelist()
    {
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$RouteTable = TableRegistry::get('Route');
		$routedata=$RouteTable->find()
					
					  ->where(['status'=>'y','parent_user_id'=>$parent_user_id])
					  ->toArray();
		// pr($routedata);
		// die;
		if($this->request->is('post'))
        {
			// pr($this->request->data);
			// die;
		  extract($this->request->data);
		  if($route_name && $route_code)
		  {
			$data=$RouteTable->find()
					  ->where(['route_code'=>$route_code,'parent_user_id'=>$parent_user_id,'status'=>'y'])
					  ->first();
			
			if(count($data)>0)
			{
				$this->Flash->set('This Route Code is Already Created', [
						'element' => 'error'
					]);
				return $this->redirect(['action' => 'routelist']);
			}
			else
			{
				// new entity
				$this->request->data['parent_user_id']=$parent_user_id;
				$entity=$RouteTable->newEntity($this->request->data);
				if($RouteTable->save($entity))
				{
					$this->Flash->set('Route Save Successfully', [
						'element' => 'success'
					]);
					return $this->redirect(['action' => 'routelist']);
				}
				else
				{
					
				}
			}
		  }
		  else
		  {
			return $this->redirect(['action' => 'routelist']);  
		  }
		}
		$this->set(compact('routedata'));
    }
	public function viewroute()
	{
		if($this->request->is('post'))
        {
			extract($this->request->data);
			$RouteTable = TableRegistry::get('Route');
			$routedata=$RouteTable->find()
					  ->where(['id'=>$route_id])
					  ->first();
			if(count($routedata)>0)
			{
				$response['status'] =true;
				$response['data'] =$routedata;
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
	public function editroute()
	{
	   if($this->request->is('post'))
        {
			// pr($this->request->data);
			// die;
			extract($this->request->data);
			$RouteTable = TableRegistry::get('Route');
			$routedata=$RouteTable->find()
					  ->where(['id'=>$edit_route_id])
					  ->first();
			
			if(count($routedata)>0)
			{
				$routedata->route_name=$route_name;
				$old_route_code=$routedata->route_code;
				if($route_code!=$old_route_code)
				{
				   $routematch=$RouteTable->find()
					  ->where(['route_code'=>$route_code])
					  ->count();
					// pr($routematch);
					// die;
					if($routematch>0)
					{
					   $this->Flash->set('This Route Code is Already Used Try Another', [
								'element' => 'error'
							]);
						return $this->redirect(['action' => 'routelist']); 
					}
				}
					$routedata->route_code=$route_code;
					$routedata->delivery_charge=$delivery_charge;
					if($RouteTable->save($routedata))
							{
								$this->Flash->set('Route Data Updated Successfully', [
											'element' => 'success'
										]);
							}
							else
							{
							   $this->Flash->set('Something Went Wrong', [
											'element' => 'error'
										]);	
							}
				
				
			}
			else
			{
				$this->Flash->set('Something Went Wrong', [
								'element' => 'error'
							]);	
			}
		}
		else
		{
			$this->Flash->set('Invalid Access', [
								'element' => 'error'
							]);	
			return $this->redirect(['action' => 'routelist']); 
		}
		return $this->redirect(['action' => 'routelist']); 
	}
	public function deleteroute($route_id)
	{
		if($route_id)
		{
			$RouteTable = TableRegistry::get('Route');
			$routedata=$RouteTable->find()
					  ->where(['id'=>$route_id])
					  ->first();
			if(count($routedata)>0)
			{
				$routedata->status="n";
				if($RouteTable->save($routedata))
				{
					$this->Flash->set('Route Deleted Successfully', [
						'element' => 'success'
					]);
				}
				else
				{
					$this->Flash->set('Something Went Wrong', [
						'element' => 'error'
					]);
				}
			}
			else
			{
				$this->Flash->set('No Route Found', [
						'element' => 'error'
					]);
			}
		}
		else
		{
		   $this->Flash->set('No Route Found', [
						'element' => 'error'
					]);	
		}
		return $this->redirect(['action' => 'routelist']);  
		
	}
	public function editgroup()
	{
	   if($this->request->is('post'))
        {
			// pr($this->request->data);
			// die;
			extract($this->request->data);
			$AreaTable = TableRegistry::get('Area');
			$areadata=$AreaTable->find()
					  ->where(['id'=>$edit_area_id])
					  ->first();
			
			if(count($areadata)>0)
			{
				$areadata->area_name=$area_name;
				$old_area_code=$areadata->area_code;
				if($area_code!=$old_area_code)
				{
				   $areamatch=$AreaTable->find()
					  ->where(['area_code'=>$area_code])
					  ->count();
					// pr($routematch);
					// die;
					if($areamatch>0)
					{
					   $this->Flash->set('This Group Code is Already Used Try Another', [
								'element' => 'error'
							]);
						return $this->redirect(['action' => 'grouplist']); 
					}
				}
					$areadata->area_code=$area_code;
					$areadata->delivery_charge=$delivery_charge;
					if($AreaTable->save($areadata))
							{
								$this->Flash->set('Group Data Updated Successfully', [
											'element' => 'success'
										]);
							}
							else
							{
							   $this->Flash->set('Something Went Wrong', [
											'element' => 'error'
										]);	
							}
				
				
			}
			else
			{
				$this->Flash->set('Something Went Wrong', [
								'element' => 'error'
							]);	
			}
		}
		else
		{
			$this->Flash->set('Invalid Access', [
								'element' => 'error'
							]);	
			return $this->redirect(['action' => 'grouplist']); 
		}
		return $this->redirect(['action' => 'grouplist']); 
	}
	public function viewarea()
	{
		if($this->request->is('post'))
        {
			extract($this->request->data);
			$AreaTable = TableRegistry::get('Area');
			$areadata=$AreaTable->find()
					
					  ->where(['Area.id'=>$area_id])
					  ->first();
			if(count($areadata)>0)
			{
				$response['status'] =true;
				$response['data'] =$areadata;
				$response['msg'] = 'Area  Found'; 
			}
			else
			{
				$response['status'] =false;
				$response['msg'] = 'No Area found'; 
			}
			// $this->
			
		}
		else
		{
			$response['status'] =false;
			$response['msg'] = 'No Area found'; 
			  
		}
	    echo json_encode($response);
		die;
	}
	public function grouplist()
    {
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$areaTable = TableRegistry::get('Area');
		$routeTable = TableRegistry::get('Route');
		$areadata=$areaTable->find()
					->where(['Area.status'=>'y','Area.parent_user_id'=>$parent_user_id])
					  ->toArray();
      
		 // pr($areadata);
		 // die;
		if($this->request->is('post'))
        {
			// pr($this->request->data);
			// die;
		  extract($this->request->data);
		  if($area_name && $area_code)
		  {
			$data=$areaTable->find()
						
					  ->where(['area_code'=>$area_code,'parent_user_id'=>$parent_user_id,'status'=>'y'])
					  ->first();
			
			if(count($data)>0)
			{
				$this->Flash->set('This Area Code is Already Created', [
						'element' => 'error'
					]);
				return $this->redirect(['action' => 'grouplist']);
			}
			else
			{
				// new entity
				$this->request->data['parent_user_id']=$parent_user_id;
				$entity=$areaTable->newEntity($this->request->data);
				// pr($entity);
				// die;
				if($areaTable->save($entity))
				{
					return $this->redirect(['action' => 'grouplist']);
				}
				else
				{
					
				}
			}
		  }
		  else
		  {
			  	$this->Flash->set('Required Paramter missing', [
										'element' => 'error'
									]);
			return $this->redirect(['action' => 'grouplist']);  
		  }
		}
		$this->set(compact('areadata'));
    }
	public function deletearea($area_id)
	{
		if($area_id)
		{
			$areaTable = TableRegistry::get('Area');
			$areadata=$areaTable->find()
					  ->where(['id'=>$area_id])
					  ->first();
			if(count(areadata)>0)
			{
				$areadata->status="n";
				if($areaTable->save($areadata))
				{
					$this->Flash->set('Area Deleted Successfully', [
						'element' => 'success'
					]);
				}
				else
				{
					$this->Flash->set('Something Went Wrong', [
						'element' => 'error'
					]);
				}
			}
			else
			{
				$this->Flash->set('No Area Found', [
						'element' => 'error'
					]);
			}
		}
		else
		{
		   $this->Flash->set('No Area Found', [
						'element' => 'error'
					]);	
		}
		return $this->redirect(['action' => 'grouplist']);  
		
	}
	public function productlist()
    {
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$ProductTable = TableRegistry::get('Product');
		$productdata=$ProductTable->find()
					  ->where(['status'=>'y','parent_user_id'=>$parent_user_id])
					  ->toArray();
		$i=0;
		foreach($productdata as $product)
		{
			$p[$i]['id']=$product['id'];
			$p[$i]['product_name']=$product['product_name'];
			$p[$i]['product_code']=$product['product_code'];
			$p[$i]['product_copies']=$this->productcopies($product['id']);
			
			$i++;
			}
			$productdata=$p;
			
		$this->set(compact('productdata'));
    }
	public function productcopies($product_id)
	{
		$connection = ConnectionManager::get('default');
		$results=$connection->execute("select sum(copies) as totalcopy from user_product where product_id='$product_id'")->fetch('assoc');
		if($results>0)
		{
			return $results['copies'];
		}
		else
		{
		return 0;
		}
	}
	
	public function editproduct($product_id)
	{
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$ProductTable = TableRegistry::get('Product');
		$productdata=$ProductTable->find()
					  ->where(['id'=>$product_id])
					  ->first();
		if(count($productdata)>0)
		{
			
			$price_type=$productdata->price_type;
			if($price_type=="daily")
			{
				$PricesdailyTable = TableRegistry::get('Pricesdaily');
				$d=$PricesdailyTable->find()
					  ->where(['product_id'=>$product_id])
					  ->first();
				$this->set(compact('d'));	
			}
			if($price_type=="monthly")
			{
				$PricesmonthlyTable = TableRegistry::get('Pricesmonthly');
				$m=$PricesmonthlyTable->find()
					  ->where(['product_id'=>$product_id])
					  ->first();
			   $this->set(compact('m'));	
			}
			$this->set(compact('productdata'));
			if($this->request->is('post'))
			{
				//pr($this->request->data);
				extract($this->request->data);
				$productdata->product_name=$product_name;
				//$productdata->product_code=$product_code;
				$productdata->price_type=$price_type;
				$connection = ConnectionManager::get('default');
					if($price_type=="daily")
					{
					  $q="UPDATE prices_daily SET sun='$sun',mon='$mon',tue='$tue',wed='$wed',thu='$thu',fri='$fri',sat='$sat' WHERE product_id='$product_id'";
					 
					
					}
					else
					{
						$productdata->fix_price=$fix_price; 
					}
					
					if($result=$ProductTable->save($productdata))
					{
						$pd=$connection->execute($q);
							$this->Flash->set('Product Detail Updated  Successfully', [
										'element' => 'success'
									]);
								return $this->redirect(['action' => 'productlist']);
					}   
					else
					{
						
					}
				
			}
		}
		else
		{
			return $this->redirect(['action' => 'productlist']);  
		}
	}
	public function deleteproduct($product_id)
	{
		if($product_id)
		{
			$ProductTable = TableRegistry::get('Product');
			$productdata=$ProductTable->find()
					  ->where(['id'=>$product_id])
					  ->first();
			if(count($productdata)>0)
			{
				$productdata->status="n";
				if($ProductTable->save($productdata))
				{
					$this->Flash->set('Product Deleted Successfully', [
						'element' => 'success'
					]);
				}
				else
				{
					$this->Flash->set('Something Went Wrong', [
						'element' => 'error'
					]);
				}
			}
			else
			{
				$this->Flash->set('No Product Found', [
						'element' => 'error'
					]);
			}
		}
		else
		{
		   $this->Flash->set('No Product Found', [
						'element' => 'error'
					]);	
		}
		return $this->redirect(['action' => 'productlist']);  
		
	}
    
	public function addproduct()
	{
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		if($this->request->is('post'))
        {
			$ProductTable = TableRegistry::get('Product');
			$PricesdailyTable = TableRegistry::get('Pricesdaily');
			$PricesmonthlyTable = TableRegistry::get('Pricesmonthly');
			extract($this->request->data);
			// pr($this->request->data);
			// die;
			$this->request->data['parent_user_id']=$parent_user_id;
			if($product_name && $product_code)
			{
				$data=$ProductTable->find()
						  ->where(['product_code'=>$product_code,'parent_user_id'=>$parent_user_id,'status'=>'y'])
						  ->first();
				if(count($data)>0)
				{
					$this->Flash->set(' product code already taken ,Try Another', [
										'element' => 'error'
									]);
					// product code already taken 
					return $this->redirect(['action' => 'productlist']); 
				}
				else
				{
					// new product 
					$p['product_name']=$product_name;
					$p['product_code']=$product_code;
					$p['joining_date']=$joining_date;
					$p['price_type']=$price_type;
					$p['parent_user_id']=$parent_user_id;
					if($fix_price)
					$p['fix_price']=$fix_price;
					else 
					$p['fix_price']=0;	
					$entity=$ProductTable->newEntity($p);
					
					if($result=$ProductTable->save($entity))
					{
						$this->request->data['product_id']=$result['id'];
						if($price_type=="daily")
						{
							
							$dailyentity=$PricesdailyTable->newEntity($this->request->data);
							 $PricesdailyTable->save($dailyentity);
						}
						
						// save successfully 
								$this->Flash->set('Product Added Successfully', [
										'element' => 'success'
									]);
								return $this->redirect(['action' => 'productlist']);
						
					}   
					else
					{
						  
					}
				}
			}
			else
			{
				// parameter missing 
			}
			// return $this->redirect(['action' => 'productlist']);  
			// die;
		}
		else
		{
			
		}
	    // die;
	}
	
	
	
	
	
 }
?>
