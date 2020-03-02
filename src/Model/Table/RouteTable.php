<?php
namespace App\Model\Table;
use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;
use Cake\Event\Event;
/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 */
class RouteTable extends Table
{
	public function initialize(array $config)
    {
        parent::initialize($config);
		// $this->primaryKey('id');
		$this->hasMany('Area');
		$this->table('route');
		
    }
	
	
}
?>