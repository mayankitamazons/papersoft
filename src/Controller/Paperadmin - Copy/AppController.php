<?php
namespace App\Controller\Paperadmin;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class AppController extends Controller
{

    // use \Crud\Controller\ControllerTrait;

    public function initialize()
    {
        parent::initialize();
	    $this->loadComponent('Flash');
		$this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler'); 
		$this->loadComponent('Auth', [
			'authorize'=>['Controller'],
			'loginAction'=>array('controller'=>'admin','action'=>'index'),
			'loginRedirect' => [
				'controller' => 'admin',
				'action' => 'dashboard'
			],
			'logoutRedirect' => [
				'controller' => 'admin',
				'action' => 'logout'
			],
			
			'authenticate'=>array('Form'=>array('userModel'=>'Users','fields'=>array('username'=>'mobile','password'=>'password','role_id'=>'1'))),
		]);
		
    }
	
	

	public function isAuthorized($user = null)
    {	
		
		// Only admins can access admin functions
        if ($this->request->params['prefix'] === 'paperadmin') {
			 
			return true;	
			
        }
		
        // Default deny
        return false;
    }
	
	
}
