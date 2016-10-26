<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TblColPermission Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TblColPerms
 * @property \Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\TblColPermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\TblColPermission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TblColPermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TblColPermission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblColPermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TblColPermission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TblColPermission findOrCreate($search, callable $callback = null)
 */
class TblColPermissionTable extends Table
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

        $this->table('tbl_col_permission');
        $this->displayField('tbl_col_perm_id');
        $this->primaryKey('tbl_col_perm_id');

        
        /**$this->belongsToMany('roles', [
        		'alias' => 'Roles',
        		'foreignKey' => 'role_id',
        		'targetForeignKey' => 'role_id'       		
        ]);*/
       
        
        $this->belongsTo('Roles', [
        		'foreignKey' => 'role_id',
        		'joinType' => 'INNER',
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
            ->requirePresence('table_name', 'create')
            ->notEmpty('table_name');

        $validator
            ->requirePresence('col_name', 'create')
            ->notEmpty('col_name');

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
        $rules->add($rules->existsIn(['tbl_col_perm_id'], 'TblColPerms'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
