<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipment Model
 *
 * @method \App\Model\Entity\Equipment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Equipment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Equipment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equipment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Equipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment findOrCreate($search, callable $callback = null)
 */
class EquipmentTable extends Table
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

        $this->table('equipment');
        $this->displayField('Equipment_ID');
        $this->primaryKey('Equipment_ID');
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
            ->integer('Equipment_ID')
            ->allowEmpty('Equipment_ID', 'create');

        $validator
            ->allowEmpty('Center_Name');

        $validator
            ->allowEmpty('CSU');

        $validator
            ->allowEmpty('Brand');

        $validator
            ->allowEmpty('Model');

        $validator
            ->allowEmpty('Type');

        $validator
            ->allowEmpty('Serial_Number');

        $validator
            ->allowEmpty('Description');

        $validator
            ->allowEmpty('Condition');

        $validator
            ->allowEmpty('Public_Access');

        $validator
            ->allowEmpty('Ownrshp_Status');

        $validator
            ->allowEmpty('Other');

        $validator
            ->allowEmpty('Sources');

        $validator
            ->allowEmpty('Validation');

        $validator
            ->allowEmpty('Validation_Source');

        $validator
            ->allowEmpty('Valid_Exist');

        $validator
            ->integer('Lab_Centers_ID')
            ->allowEmpty('Lab_Centers_ID');

        return $validator;
    }
}
