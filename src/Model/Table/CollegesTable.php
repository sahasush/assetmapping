<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Colleges Model
 *
 * @method \App\Model\Entity\College get($primaryKey, $options = [])
 * @method \App\Model\Entity\College newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\College[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\College|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\College patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\College[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\College findOrCreate($search, callable $callback = null)
 */
class CollegesTable extends Table
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

        $this->table('colleges');
        $this->displayField('Colleges_ID');
        $this->primaryKey('Colleges_ID');
        
        
        $this->hasMany('departments', [
        		'alias' => 'Departments',
        		'foreignKey' => 'College_ID',
        
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
            ->integer('Colleges_ID')
            ->allowEmpty('Colleges_ID', 'create');

        $validator
            ->allowEmpty('College');

        $validator
            ->integer('University_ID')
            ->allowEmpty('University_ID');

        return $validator;
    }
}
