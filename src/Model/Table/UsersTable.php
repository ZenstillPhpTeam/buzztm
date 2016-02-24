<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Auth\DigestAuthenticate;
use Cake\Auth\DefaultPasswordHasher;

class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author', 'company']],
                'message' => 'Please enter a valid role'
            ]);
    }

    public function initialize(array $config)
    {
        $this->hasOne('UserProfiles', ['foreignKey' => 'user_id', 'dependent' => true]);
    }

}