<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grants Model
 *
 * @method \App\Model\Entity\Grant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Grant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Grant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Grant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Grant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Grant findOrCreate($search, callable $callback = null)
 */
class GrantsTable extends Table
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

        $this->table('grants');
        $this->displayField('Grants_ID');
        $this->primaryKey('Grants_ID');
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
            ->integer('Grants_ID')
            ->allowEmpty('Grants_ID', 'create');

        $validator
            ->allowEmpty('Center_Name');

        $validator
            ->allowEmpty('CSU');

        $validator
            ->allowEmpty('Grant_Project_Title');

        $validator
            ->allowEmpty('Research_Obj');

        $validator
            ->allowEmpty('Grantor');

        $validator
            ->decimal('Grant_Amount')
            ->allowEmpty('Grant_Amount');

        $validator
            ->allowEmpty('Effective_Yr');

        $validator
            ->allowEmpty('Effective_Mo');

        $validator
            ->allowEmpty('Expiration_Yr');

        $validator
            ->allowEmpty('Expiration_Mo');

        $validator
            ->allowEmpty('PI_Fname');

        $validator
            ->allowEmpty('PI_Lname');

        $validator
            ->allowEmpty('PI_MInitial');

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

        return $validator;
    }
}
