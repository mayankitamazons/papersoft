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

class BillController  extends AppController
 {
   
	 public function initialize()
    {
        parent::initialize();
		// $this->Auth->allow();
		$this->viewBuilder()->layout('admin/admin_home'); 
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
	public function createbill()
    {
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		if($this->request->is('post'))
        {
				date_default_timezone_set("UTC");
				$utcdate=date('Y-m-d');
				$current_utc=strtotime($utcdate);
				$BillmonthTable = TableRegistry::get('Billmonth');
				$UserbillTable = TableRegistry::get('Userbill');
				$UsertransationTable = TableRegistry::get('Usertransation');
				extract($this->request->data);
				// pr($this->request->data);
				// die;
				// $bill_date="31-04-2018";
				// $bill_date="2018-04-30";
				$bill_date=$bill_created_date;
				$bill_type="all";
				if($bill_date && $bill_type)
				{
					date_default_timezone_set("UTC");
					$utcdate=date('Y-m-d');
					$current_date=date('m');
					$current_utc=strtotime($utcdate);
					$ts2 = strtotime($bill_date);
					$ts1 = strtotime($utcdate);
					$month1 = date('m', $ts1);
					$year1 = date('Y', $ts1);
					$year2 = date('Y', $ts2);
					$month1 = date('m', $ts1);
					$month2 = date('m', $ts2);
					$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
					
					if($diff==0)
					{
						if($bill_type=="all")
						{
						   $oldbillcheck=$BillmonthTable->find()
									->where(['bill_end_date'=>$bill_date,'speific_user_id'=>'0','parent_user_id'=>$parent_user_id])
								  ->count();
							if($oldbillcheck>0)
							{
								$this->Flash->set("Bill was already created for this month, check old bill record", [
								'element' => 'error'
								]);	
								return $this->redirect(['action' => 'createbill']);
								
							}
							else
							{
								$lastbilldata=$UserbillTable->find()
									->select(['id'])
									->order(['id'=>'DESC'])
								  ->first();
								  if(count($lastbilldata)>0)
								  {
									  $last_bill_no=$lastbilldata['id'];
								  }
								  else
								  {
									 $last_bill_no=0;  
								  }
								$connection = ConnectionManager::get('default');
								$q="select users.id,date(users.join_date) as join_date,users.name,users.user_code,route.route_name,route.route_code,route.delivery_charge,area.area_name from users
								inner join route on users.route_id=route.id inner join area on area.id=users.area_id  where users.id not
								in(select  speific_user_id from bill_month where bill_month='$month1' and bill_year='$year1') and users.role_id='1' and users.parent_user_id='$parent_user_id'
								order by users.route_id";
								$userdata=$connection->execute($q)->fetchAll('assoc');
								// pr($userdata);
								// die;
								if(count($userdata)>0)
								{
									$total_user=$total_bill_amount=0;
									foreach($userdata as $user)
									{
										$user_id=$user['id'];
										$delivery_charge=$user['delivery_charge'];
										$join_date=$user['join_date'];
										$bill_amount=$this->productwiseprice($user_id,$delivery_charge,$bill_date,$join_date,$last_bill_no,$parent_user_id);
										// save all user bill step by step 
										$b['user_id']=$user_id;
										$b['bill_created']=$bill_date;
										$b['bill_amount']=$bill_amount;
										$b['comment']="monthly bill";
										$b['parent_user_id']=$parent_user_id;
										$entity=$UserbillTable->newEntity($b);
										if($result=$UserbillTable->save($entity))
										{
											$total_bill_amount=$total_bill_amount+$bill_amount;
											$total_user++;
											$last_bill_no++;
											// update user balance 
											$ut['user_id']=$user_id;
											$ut['dr']=$bill_amount;
											$ut['comment']="monthly bill";
											$ut['transation_utc']=$current_utc;
											$ut['parent_user_id']=$parent_user_id;
											$entity=$UsertransationTable->newEntity($ut);
											if($UsertransationTable->save($entity))
											{
											}
										}
										
									}
									// $bm['bill_start_date']="01-".$month1."-".$year1;
									$bm['bill_start_date']=$year1."-".$month1."-"."01";
									$bm['bill_end_date']=$bill_date;
									$bm['bill_month']=$month1;
									$bm['bill_year']=$year1;
									$bm['bill_amount']=$total_bill_amount;
									$bm['billing_user']=$total_user;
									$bm['parent_user_id']=$parent_user_id;
									$entity=$BillmonthTable->newEntity($bm);
									if($result=$BillmonthTable->save($entity))
									{
										$this->Flash->set("Bill Creation Successfully", [
											'element' => 'success'
										]);	
										return $this->redirect(['action' => 'printbill']);
									}
									else
									{
										$this->Flash->set("Bill Creation Failed", [
											'element' => 'error'
										]);	
										return $this->redirect(['action' => 'createbill']);
									}
								}
								else
								{
									$this->Flash->set("No user found for bill creation", [
											'element' => 'error'
										]);	
										return $this->redirect(['action' => 'createbill']);
								}
								// die;
								
							}
						}
						else
						{
							$this->Flash->set("Invalid Billing Type selected", [
								'element' => 'error'
							]);	
							return $this->redirect(['action' => 'createbill']);
						}
					}
					else
					{
						$this->Flash->set("You can't perform create bill for next  or pre month  in advance", [
							'element' => 'error'
						]);	
						return $this->redirect(['action' => 'createbill']);
					}
					
			}
		}
    }
	public function printbill()
	{
		$routeTable = TableRegistry::get('Route');
		$routedata=$routeTable->find()
						->where(['status'=>'y'])
						->toArray();
		$this->set(compact('routedata'));
	}
	public function showbill()
	{
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$this->viewBuilder()->layout(false); 
		$routeTable = TableRegistry::get('Route');
		$BillmonthTable = TableRegistry::get('Billmonth');
		$PrintplanTable = TableRegistry::get('Printplan');
		$routedata=$routeTable->find()
						->where(['status'=>'y','parent_user_id'=>$parent_user_id])
						->toArray();
		$this->set(compact('routedata'));
		$connection = ConnectionManager::get('default');
		if($this->request->is('post'))
        {
			// pr($this->request->data);
			// die;
			$con=[];
			extract($this->request->data);
			$BillmonthTable = TableRegistry::get('Billmonth');
			
			if($bill_type=="all")
			{
				$oldbillcheck=$BillmonthTable->find()
									->where(['bill_month'=>$selected_month,'speific_user_id'=>'0','parent_user_id'=>$parent_user_id])
								  ->count();
				if($oldbillcheck>0)
				{
					if($route_type=="all")
					{
					  $q="select print_plan.user_id,print_plan.seq_no,users.name,users.user_code,user_bill.id as bill_id,user_bill.bill_amount,
					  user_bill.bill_status,user_bill.created  from print_plan inner join users on users.id=print_plan.user_id inner join user_bill on user_bill.user_id=users.id where users.role_id='1' and user_bill.parent_user_id='$parent_user_id' and users.parent_user_id='$parent_user_id'
					  order by print_plan.route_id,print_plan.seq_no";
					}
					else
					{
						$q="select print_plan.user_id,print_plan.seq_no,users.name,users.user_code from print_plan 
						 inner join users on users.id=print_plan.user_id where print_plan.route_id='$route_type'
						 and users.role_id='1' and users.parent_user_id='$parent_user_id' order by print_plan.seq_no";
					}
					$userdata=$connection->execute($q)->fetchAll('assoc');
					// pr($userdata);
					// die;
					$UsertransationTable = TableRegistry::get('Usertransation');
					if(count($userdata)>0)
					{
						$i=0;
						foreach($userdata as $user)
						{
							$user_id=$re[$i]['user_id']=$user['user_id'];
							$afterbal=$UsertransationTable->find()
									// ->select(['id'])
									->where(['user_id'=>$user_id])
									->order(['id'=>'DESC'])
								  ->first();
							$re[$i]['before_balance']=$afterbal['before_balance'];
							$re[$i]['after_balance']=$afterbal['after_balance'];
							$re[$i]['user_name']=$user['name'];
							$re[$i]['user_code']=$user['user_code'];
							$re[$i]['bill_id']=$user['bill_id'];
							$re[$i]['bill_amount']=$user['bill_amount'];
							$re[$i]['created']=$user['created'];
							$re[$i]['bill_month']=$selected_month;
							$re[$i]['bill_product']=$this->billproduct($selected_month,$user_id);
							$i++;
						}
						// pr($re);
						// die;
						$this->set(compact('re'));
					}
					else
					{
					   $this->Flash->set("No User Found for printing bill", [
								'element' => 'error'
								]);	
						return $this->redirect(['action' => 'printbill']);	
					}
					
				}
				else
				{
					$this->Flash->set("Bill was Not Created, Create bill first for selected month", [
								'element' => 'error'
								]);	
					return $this->redirect(['action' => 'createbill']);
				}
				
				
			}
		}
	}
	public function billproduct($selected_month,$user_id)
	{
		$connection = ConnectionManager::get('default');
		$query="select * from bill_product where user_id='$user_id' and billmonth='$selected_month' and billyear='2018'";
		$billdata=$connection->execute($query)->fetchAll('assoc');
		if(count($billdata)>0)
		{
			
		}
		else
		{
			$billdata='';
		}
		return $billdata;
	}
	public function billview()
    {

    }
	
	public function productwiseprice($user_id,$delivery_charge,$bill_date,$join_date,$last_bill_no,$parent_user_id)
	{
		
		$ts2 = strtotime($bill_date);
	    $join_utc = strtotime($join_date);
		$year2 = date('Y', $ts2);
		$month2 = date('m', $ts2);
		 $match_date="01-".$month2."-".$year2;
		$new_bill_no=$last_bill_no+1;
		$match_utc = strtotime($match_date);
		if($match_utc<$join_utc)
		{
		   $bill_start_date=$join_date;
		}
		else
		{
			$bill_start_date=$match_date;
		}
	
		// echo $user_id;
		$UserproductTable = TableRegistry::get('Userproduct');
		$BillproductTable = TableRegistry::get('Billproduct');
		$UserworkdaysTable = TableRegistry::get('Userworkdays');
		$productdata=$UserproductTable->find()
					  ->contain(['Product'])
					  ->where(['user_id'=>$user_id,'Userproduct.parent_user_id'=>$parent_user_id])
					  ->toArray(); 
		// pr($productdata);
		// die;
		$holidaydata=$UserworkdaysTable->find()
					 ->where(['user_id'=>$user_id])
					  ->toArray(); 
		if(count($holidaydata)>0)
		{
			$holiday_exit="y";
		}
		$rate=0;
		if(count($productdata)>0)
		{
			$days=$this->weekdays($bill_start_date,$bill_date);
			// pr($productdata);
			// die;
			foreach($productdata as $product)
			{
			    $product_id=$product['product_id'];
			    $copies=$product['copies'];
			  
			   $productprice=$this->productpricelist($product_id);
			   if(count($productprice)>0)
			   {
				   if($holiday_exit=="y")
				   {
					   if (in_array(1,$holidaydata))
					   {
						   $sun_rate=0;
					   }
					   else
					   {
						 $sun_rate=($productprice['sun'])*($days['sun']);   
					   }
					   if (in_array(2,$holidaydata))
					   {
						   $mon_rate=0;
					   }
					   else
					   {
						 $mon_rate=($productprice['sun'])*($days['sun']);   
					   }
					   if (in_array(3,$holidaydata))
					   {
						   $tue_rate=0;
					   }
					   else
					   {
						 $tue_rate=($productprice['sun'])*($days['sun']);   
					   }
					   if (in_array(4,$holidaydata))
					   {
						   $wed_rate=0;
					   }
					   else
					   {
						 $wed_rate=($productprice['sun'])*($days['sun']);   
					   }
					   if (in_array(5,$holidaydata))
					   {
						   $thu_rate=0;
					   }
					   else
					   {
						 $thu_rate=($productprice['sun'])*($days['sun']);   
					   }
					   if (in_array(6,$holidaydata))
					   {
						   $fri_rate=0;
					   }
					   else
					   {
						 $fri_rate=($productprice['sun'])*($days['sun']);   
					   }
					   if (in_array(7,$holidaydata))
					   {
						   $sat_rate=0;
					   }
					   else
					   {
						 $sat_rate=($productprice['sun'])*($days['sun']);   
					   }
				   }
				   else
				   {
					   $sun_rate=($productprice['sun'])*($days['sun']);
					   $mon_rate=($productprice['mon'])*($days['mon']);
					   $tue_rate=($productprice['tue'])*($days['tue']);
					   $wed_rate=($productprice['wed'])*($days['wed']);
					   $thu_rate=($productprice['thu'])*($days['thu']);
					   $fri_rate=($productprice['fri'])*($days['fri']);
					   $sat_rate=($productprice['sat'])*($days['sat']);
					}
				   $total_rate=$sun_rate+$mon_rate+$tue_rate+$wed_rate+$thu_rate+$fri_rate+$sat_rate;
				   $price=($total_rate)*($copies);
			   }
			   else
			   {
				 // take action   
			   }
			   // save all single bill product entry 
			   $bp['bill_id']=$new_bill_no;
			   $bp['user_id']=$user_id;
			   $bp['product_id']=$product_id;
			   $bp['product_copies']=$copies;
			   $bp['product_price']=$price;
			   $bp['product_name']=$product['product']['product_name'];
			   $bp['product_code']=$product['product']['product_code'];
			   $bp['bill_month']=$bill_date;
			   $bp['billmonth']=$month2;
			   $bp['billyear']=$year2;
			   $bp['parent_user_id']=$parent_user_id;
			   // pr($bp);
			   // die;
			   $billentity=$BillproductTable->newEntity($bp);
			   $BillproductTable->save($billentity);
			}
		}
		else
		{
		   $price=0;	
		}
		
		return $price;
	}
	public function productpricelist($product_id)
	{
		$ProductDailyTable = TableRegistry::get('Pricesdaily');
		$productprice=$ProductDailyTable->find()
					->where(['product_id'=>$product_id])
					  ->first();
		// pr($productprice);
		// die;
		if(count($productprice)>0)
		{
		  
		}
		else
		{
			$productprice=[];
		}
	    return $productprice;
	}
	public function weekdays($start,$end)
	{
		$sun=$mon=$tue=$wed=$thu=$fri=$sat=0;
		$start = new \DateTime($start);
		$end   = new \DateTime($end);
		 $interval = \DateInterval::createFromDateString('1 day');
		// $interval =0;
		$period = new \DatePeriod($start, $interval, $end);
		foreach ($period as $dt)
		{
			 $dt->format('D').$dt->format('d-m');
			// echo "</br>";
			if ($dt->format('N') == 1)
			{
				$mon++;
			}
			if ($dt->format('N') == 2)
			{
				$tue++;
			}
			if ($dt->format('N') == 3)
			{
				$wed++;
			}
			if ($dt->format('N') == 4)
			{
				$thu++;
			}
			if ($dt->format('N') == 5)
			{
				$fri++;
			}
			if ($dt->format('N') == 6)
			{
				$sat++;
			}
			if ($dt->format('N') == 7)
			{
				$sun++;
			}
		}
		$d['sun']=$sun;
		$d['mon']=$mon;
		$d['tue']=$tue;
		$d['wed']=$wed;
		$d['fri']=$thu;
		$d['thu']=$fri;
		$d['sat']=$sat;
		return $d;
	}
 }
?>
