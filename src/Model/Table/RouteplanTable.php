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
class RoutePlanTable extends Table
{
	public function initialize(array $config)
    {
        parent::initialize($config);
		// $this->primaryKey('user_id');
		// $this->foreignKey('id');
		// $this->hasOne('Users');
		$this->hasOne('Users', [
    'className' => 'Users',
    'bindingKey' => 'user_id',
    'foreignKey' => 'id'
]);
		$this->table('routeplan');
		
    }
	
	
}
?>