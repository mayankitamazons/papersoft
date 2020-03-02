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
	public function routelist()
    {
		$RouteTable = TableRegistry::get('Route');
		$routedata=$RouteTable->find()
					  ->where(['status'=>'y'])
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
					  ->where(['route_code'=>$route_code])
					  ->first();
			
			if(count($data)>0)
			{
				return $this->redirect(['action' => 'routelist']);
			}
			else
			{
				// new entity
				$entity=$RouteTable->newEntity($this->request->data);
				if($RouteTable->save($entity))
				{
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
	public function arealist()
    {
		$areaTable = TableRegistry::get('Area');
		$routeTable = TableRegistry::get('Route');
		$areadata=$areaTable->find()
						->contain(['Route'])
					  ->where(['Area.status'=>'y'])
					  ->toArray();
        $routedata=$routeTable->find()
						->where(['status'=>'y'])
						->toArray();
		 // pr($areadata);
		 // die;
		if($this->request->is('post'))
        {
			// pr($this->request->data);
			// die;
		  extract($this->request->data);
		  if($area_name && $area_code && $route_id)
		  {
			$data=$areaTable->find()
						
					  ->where(['area_code'=>$area_code])
					  ->first();
			
			if(count($data)>0)
			{
				return $this->redirect(['action' => 'arealist']);
			}
			else
			{
				// new entity
				$entity=$areaTable->newEntity($this->request->data);
				if($areaTable->save($entity))
				{
					return $this->redirect(['action' => 'arealist']);
				}
				else
				{
					
				}
			}
		  }
		  else
		  {
			return $this->redirect(['action' => 'arealist']);  
		  }
		}
		$this->set(compact('areadata','routedata'));
    }
	public function productlist()
    {

		$ProductTable = TableRegistry::get('Product');
		$productdata=$ProductTable->find()
					  ->where(['status'=>'y'])
					  ->toArray();
		// pr($productdata);
		// die;
		if($this->request->is('post'))
        {
			// pr($this->request->data);
			// die;
		  extract($this->request->data);
		  if($product_name && $product_code )
		  {
			$data=$ProductTable->find()
					  ->where(['product_code'=>$product_code])
					  ->first();
			
			if(count($data)>0)
			{
				return $this->redirect(['action' => 'productlist']);
			}
			else
			{
				// new entity
				$entity=$ProductTable->newEntity($this->request->data);
				if($ProductTable->save($entity))
				{
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
		$this->set(compact('productdata'));
    }
    
	public function addproduct()
	{
	}
	
	
	
	
 }
?>
