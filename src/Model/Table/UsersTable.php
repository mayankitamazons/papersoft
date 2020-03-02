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
class UsersTable extends Table
{
	public function initialize(array $config)
    {
        parent::initialize($config);
		$this->belongsTo('Route');
		$this->hasMany('Usertransation');
		$this->hasMany('Userproduct');
		$this->hasMany('Userbill');
		$this->belongsTo('Area');
		$this->table('users');
		
    }
	public function validationLogin(Validator $validator)
    {
		 $validator
		 ->requirePresence('username', 'create',' Email id is required')
            ->notEmpty('username', ' Email id is required')
			->requirePresence('password', 'create','password is required')
            ->notEmpty('password', 'password  is required');
			return $validator;	
	}
	
	
}
?>