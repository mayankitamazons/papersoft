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
		$this->Auth->allow();
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
		if($this->request->is('post'))
        {
				$BillmonthTable = TableRegistry::get('Billmonth');
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
									->where(['bill_end_date'=>$bill_date,'speific_user_id'=>'0'])
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
								$connection = ConnectionManager::get('default');
								$q="select users.id,users.name,users.user_code,route.route_name,route.route_code,route.delivery_charge,area.area_name from users
								inner join route on users.route_id=route.id inner join area on area.id=users.area_id  where users.id not
								in(select  speific_user_id from bill_month where bill_month='$month1' and bill_year='$year1') 
								order by users.route_id";
								$userdata=$connection->execute($q)->fetchAll('assoc');
								pr($userdata);
								die;
								if(count($userdata)>0)
								{
									foreach($userdata as $user)
									{
									  $user_id=$user['id'];
									  $delivery_charge=$user['delivery_charge'];
									  $productdata=$this->productwiseprice($user_id,$delivery_charge);
									}
								}
								die;
								
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
	public function billview()
    {

    }
	public function billgeneration()
    {
      // if($this->request->is('post'))
        // {
			$BillmonthTable = TableRegistry::get('Billmonth');
			extract($this->request->data);
			// $bill_date="31-04-2018";
			$bill_date="2018-04-30";
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
				// die;
				if($diff==0)
				{
					if($bill_type=="all")
					{
					   $oldbillcheck=$BillmonthTable->find()
								->where(['bill_end_date'=>$bill_date,'speific_user_id'=>'0'])
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
							$connection = ConnectionManager::get('default');
							$q="select users.id,users.name,users.user_code,route.route_name,route.route_code,route.delivery_charge,area.area_name from users
							inner join route on users.route_id=route.id inner join area on area.id=users.area_id  where users.id not
							in(select  speific_user_id from bill_month where bill_month='$month1' and bill_year='$year1') 
							order by users.route_id";
							$userdata=$connection->execute($q)->fetchAll('assoc');
							if(count($userdata)>0)
							{
								foreach($userdata as $user)
								{
								  $user_id=$user['id'];
								  $delivery_charge=$user['delivery_charge'];
								  $productdata=$this->productwiseprice($user_id,$delivery_charge);
								}
							}
							die;
							
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
				
				
			// }
			// else
			// {
				// $this->Flash->set('Required Parameter missing', [
						// 'element' => 'error'
					// ]);	
				// return $this->redirect(['action' => 'createbill']);
			// }
		}
    }
	public function productwiseprice($user_id,$delivery_charge)
	{
		echo "here";
		die;
		$this->productpricelist(15);
	}
	public function productpricelist($product_id)
	{
		$ProductDailyTable = TableRegistry::get('Pricesdaily');
		$productprice=$ProductDailyTable->find()
					->where(['product_id'=>$product_id])
					  ->first();
		if(count($productprice)>0)
		{
			$i=0;
		   foreach($productprice as $key=>$value)
		   {
			   $p[$key]=$value;
		   }
			pr($p);		
		}
		else
		{
			$pdata=[];
		}
	    return $pdata;
	}
	public function weekdays($start,$end)
	{
		$sun=$mon=$tue=$wed=$thu=$fri=$sat=0;
		$start = new \DateTime('2018-05-01');
		$end   = new \DateTime('2018-06-01');
		 $interval = \DateInterval::createFromDateString('1 day');
		// $interval =0;
		$period = new \DatePeriod($start, $interval, $end);
		foreach ($period as $dt)
		{
			echo $dt->format('D').$dt->format('d-m');
			echo "</br>";
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
