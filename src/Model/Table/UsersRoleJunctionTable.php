<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersRoleJunction Model
 *
 *  @property \Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\UsersRoleJunction get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersRoleJunction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersRoleJunction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersRoleJunction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersRoleJunction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersRoleJunction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersRoleJunction findOrCreate($search, callable $callback = null)
 */
class UsersRoleJunctionTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users_role_junction');
        $this->displayField('role_junction_id');
        $this->primaryKey('role_junction_id');

        
        $this->belongsTo('Roles', [
            'foreignKey' => 'roles_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
       // $rules->add($rules->existsIn(['role_junction_id'], 'RoleJunctions'));
        $rules->add($rules->existsIn(['roles_id'], 'Roles'));

        return $rules;
    }
}
