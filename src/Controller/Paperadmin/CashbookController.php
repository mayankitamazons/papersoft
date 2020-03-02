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

class CashbookController  extends AppController
 {
   
	 public function initialize()
    {
        parent::initialize();
		$this->Auth->allow();
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
	public function index()
    {
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$UserTable = TableRegistry::get('Users');
		$hokerdata=$UserTable->find()
						->contain(['Route'])
					  ->where(['Users.status'=>'active','Users.role_id'=>'3','Users.parent_user_id'=>$parent_user_id])
					  ->toArray();
		$this->set(compact('hokerdata'));
      if($this->request->is('post'))
      {
		  // pr($this->request->data);
		  // die;
		  $CashMemoTable = TableRegistry::get('Cashmemo');
		  $UserTable = TableRegistry::get('Users');
		  $UsertransationTable = TableRegistry::get('Usertransation');
		  extract($this->request->data);
		  if(($entry_date) && (count($search_user)>0) && (count($amount)>0))
		  {
			  date_default_timezone_set("UTC");
			$utcdate=date('Y-m-d');
			$current_utc=strtotime($utcdate);
			  $i=0;
			 foreach($search_user as $user)
			 {
				 if(($amount[$i])>0)
				 {
					$user_str=explode("-",$user);
					$ca[$i]['user_name']=$user_str[0];
					$user_code=$ca[$i]['user_code']=trim($user_str[1]);
					$userdata=$UserTable->find()
					       ->select(['id','user_code'])
						  ->where(['user_code'=>$user_code])
						  ->first();
					// pr($userdata);
					// die;
					$user_id=$ca[$i]['user_id']=$userdata->id;
					$trasdata=$UsertransationTable->find()
										//->contain(['Area'])
										->where(['user_id'=>$user_id,'parent_user_id'=>$parent_user_id])
										->select(['after_balance'])
										->order(['id'=>'DESC'])
										->first();
					$user_last_balance=$trasdata->after_balance;
					$ca[$i]['entry_utc']=strtotime($entry_date);
					$ca[$i]['entry_date']=$entry_date;
					$ca[$i]['cash_amount']=$amount[$i];
					$ca[$i]['hoker_id']=$hoker_ids[$i];
					$ca[$i]['parent_user_id']=$parent_user_id;
					$ut[$i]['user_id']=$userdata->id;
					$ut[$i]['cr']=$amount[$i];
					$ut[$i]['comment']="Cash Recive";
					$ut[$i]['transation_utc']=$current_utc;
					$ut[$i]['parent_user_id']=$parent_user_id;
					$ut[$i]['before_balance']=$user_last_balance;
					$ut[$i]['after_balance']=$user_last_balance+$amount[$i];
					 $i++;
				 }
			 }
				$cashenties = $CashMemoTable->newEntities($ca);
				if($CashMemoTable->saveMany($cashenties))
				{
					$trasenties = $CashMemoTable->newEntities($ut);
					if($UsertransationTable->saveMany($trasenties))
					{
						$this->Flash->set('Cash Entry Added Successfully', [
							'element' => 'success'
						]);
						return $this->redirect(['action' => 'index']);
					}
				}
				else
					{
						$this->Flash->set('Something Went Wrong', [
							'element' => 'error'
						]);
						return $this->redirect(['action' => 'index']);
					}
				
			  
		  }
		  else
		  {
			$this->Flash->set('Required Parameter missing', [
						'element' => 'error'
					]);
			return $this->redirect(['action' => 'index']);
		  }
	  }
    }
	public function cashrecord()
    {
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$UserTable = TableRegistry::get('Users');
		$hokerdata=$UserTable->find()
						->contain(['Route'])
					  ->where(['Users.status'=>'active','Users.role_id'=>'3','Users.parent_user_id'=>$parent_user_id])
					  ->toArray();
		$this->set(compact('hokerdata'));
		if($this->request->is('post'))
		{
			extract($this->request->data);
			$con=[];
			$con[]=['Cashmemo.parent_user_id'=>$parent_user_id];
			if($hoker_ids)
			{
				if($hoker_ids!="all")
				{
					$con[]=['Cashmemo.hoker_id'=>$hoker_ids];
				}
			}
			if($select_date)
			{
				$con[]=['date(Cashmemo.entry_date)'=>$select_date];
			}
			
			$CashMemoTable = TableRegistry::get('Cashmemo');
			$searchdata=$CashMemoTable->find()
			 ->select(['Cashmemo.id','Cashmemo.user_name','Cashmemo.user_code','Cashmemo.cash_amount','Cashmemo.created','Cashmemo.entry_utc','users.name'])
							->join([
            [
                'table' => 'users',
                'type' => 'inner',
                'conditions' => 'users.id = Cashmemo.hoker_id'
            ]
           
        ])
		->order(['Cashmemo.id'=>'ASC'])
					       ->where($con)
						  ->toArray();
		// pr($searchdata);die;
	
		$select_hoker_id=$hoker_ids;
			$this->set(compact('searchdata','select_date','select_hoker_id'));
		}
    }
	public function createuser()
    {

    }
	
	
	
	
 }
?>
