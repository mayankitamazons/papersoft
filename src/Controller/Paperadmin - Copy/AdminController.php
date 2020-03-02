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

class AdminController extends AppController
 {
   
	 public function initialize()
    {
        parent::initialize();
		$this->Auth->allow(['index','logout']);
		if(!$this->Auth->user())
		{
			$this->viewBuilder()->layout('admin/admin_login');
			
		}
		else
		{
			//$this->viewBuilder()->layout('admin/admin_login'); 
			$parent_user_id=$this->Auth->user('id');
			
		}
		$access_token="EAACEdEose0cBALE3GCBHIXuFnmRZCj0i1djWHg9LsrKaW3OInOGseTnRP7Jm8Vs1wPybi3BmQN9R1kPPW5jBz0jpTBwXCbpZAqFrtas5zqhJVZAvsz1IguemOyCgU2FA8Esl2kk8Hy0u3XiejdkYqngwcYXyN9zwoQWRXx6fxGjBB0w8YrOQAlgVSGkkwwZD";
	}
    public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		
		 error_reporting(0);
	}
	public function index()
    {
		extract($this->request->data);
		$UserTable = TableRegistry::get('Users');
		if ($this->request->is('post')) {
			// pr($this->request->data);die;
			 $validate_entity=$UserTable->newEntity($this->request->data,['validate'=>'login']);
			if(!$validate_entity->errors())
				{
					date_default_timezone_set("UTC");
					$utcdate=date('Y-m-d');
					$current_utc=strtotime($utcdate);
					$encry="Jy5d1F4JC0p11YA8W1adqZ0KjC3Q85AB".$password;
					$newpass=sha1($encry);
					$checkuserstatus=$UserTable->find()
						->where(['Users.email'=>$username,'Users.password'=>$newpass,'Users.role_id'=>'2'])
					  ->first();
					  // pr($checkuserstatus);
					  // die;
					if(count($checkuserstatus)>0)
					{
						$user_status=$checkuserstatus->status;
						if($user_status=="active")
						{
						    $expire_utc=$checkuserstatus->expire_date;
							if($current_utc>$expire_utc)
							{
								 $this->Flash->set('Your Software License Expire,Contact Support or call 9024282477', ['element' => 'error','class'=>'error']);
								return $this->redirect([ 'action' => 'index']);	
							}
							else
							{
								$user['name']=$checkuserstatus->name;
								$user['id']=$checkuserstatus->id;
								$user['role_id']=$checkuserstatus->role_id;
								$this->Auth->setUser($user);
								return $this->redirect($this->Auth->redirectUrl());
							}
						}
						else if($user_status=="block")
						{
							 $this->Flash->set('Your Account is Blocked,Contact Software Vendor', ['element' => 'error','class'=>'error']);
								return $this->redirect([ 'action' => 'index']);	
						}
					}
					else
					{
					   $this->Flash->set('Invalid Username or password', ['element' => 'error','class'=>'error']);
						return $this->redirect([ 'action' => 'index']);	
					}
					
				}
				else
				{	
					foreach($validate_entity->errors() as $key=>$err)
						{
							foreach($err as $e)
							{
								$errors[]=$key.":".$e;
								if(!$message)
								$message=$e;
							}
							foreach($errors as $e)
							{
								$this->Flash->set($e, ['element' => 'error','class'=>'error']);
							}
						}
						return $this->redirect(['action' => 'index']);
				}
           
        }
    }
	public function dashboard()
	{
		if($this->Auth->user())
		{
			$parent_user_id=$this->Auth->user('id');
		
		}
		$this->viewBuilder()->layout('admin/admin_home'); 
		$UserTable = TableRegistry::get('Users');
		$CashMemoTable = TableRegistry::get('Cashmemo');
		$routeTable = TableRegistry::get('Route');
		$UserbillTable = TableRegistry::get('Userbill');
		$active_user=$UserTable->find('all',['conditions'=>['role_id'=>'1','status'=>'active','parent_user_id'=>$parent_user_id]])->count();
		$totalroute=$routeTable->find('all',['conditions'=>['status'=>'y','parent_user_id'=>$parent_user_id]])->count();
		$totalbill=$UserbillTable->find('all',['conditions'=>['status'=>'y','parent_user_id'=>$parent_user_id]])->count();
		$totalcashentry=$CashMemoTable->find('all',['conditions'=>['parent_user_id'=>$parent_user_id]])->count();
        $recentmemo=$CashMemoTable->find('all',['conditions'=>['parent_user_id'=>$parent_user_id],'order'=>['id'=>'DESC']])->limit(10)->toArray();
		$recentuser=$UserTable->find('all',['conditions'=>['status'=>'active','parent_user_id'=>$parent_user_id],'order'=>['id'=>'DESC']])->limit(10)->toArray();
		// pr($recentmemo);
		// die;
		$this->set(compact('active_user','totalroute','totalcashentry','totalbill'));
		$this->set(compact('recentmemo','recentuser'));
	}
	public function route()
	{
		$this->viewBuilder()->layout('admin/admin_home'); 
	}
	public function logout()
	{
		$this->autoRender=false;
		  $this->request->session()->destroy();
		$this->Flash->set('Thank you for using Apnaepaper', ['element' => 'success','class'=>'success']);
		 return $this->redirect([ 'action' => 'index']);
		// return $this->redirect($this->Auth->logout());
		
	}
	
	
	
 }
?>
