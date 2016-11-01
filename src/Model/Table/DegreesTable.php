<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Degrees Model
 *
 * @method \App\Model\Entity\Degree get($primaryKey, $options = [])
 * @method \App\Model\Entity\Degree newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Degree[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Degree|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Degree patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Degree[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Degree findOrCreate($search, callable $callback = null)
 */
class DegreesTable extends Table
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

        $this->table('degrees');
        $this->displayField('Degrees_ID');
        $this->primaryKey('Degrees_ID');
        
        $this->belongsToMany('Departments', [
        		'alias' => 'departments',
        		'foreignKey' => 'Degrees_ID',
        		'targetForeignKey' => 'Departments_ID',
        		'joinTable' => 'Dept_Degrees_Junction'
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
            ->integer('Degrees_ID')
            ->allowEmpty('Degrees_ID', 'create');

        $validator
            ->allowEmpty('Description');

        $validator
            ->allowEmpty('Degree_Level');

        $validator
            ->allowEmpty('Program_Name');

        $validator
            ->allowEmpty('Other');

        $validator
            ->allowEmpty('Sources');

        return $validator;
    }
}
