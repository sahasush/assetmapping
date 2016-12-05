<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Publications Model
 *
 * @method \App\Model\Entity\Publication get($primaryKey, $options = [])
 * @method \App\Model\Entity\Publication newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Publication[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Publication|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publication patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Publication[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Publication findOrCreate($search, callable $callback = null)
 */
class PublicationsTable extends Table
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

        $this->table('publications');
        $this->displayField('Publications_ID');
        $this->primaryKey('Publications_ID');
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
            ->integer('Publications_ID')
            ->allowEmpty('Publications_ID', 'create');

        $validator
            ->allowEmpty('Publication_Name');

        $validator
            ->allowEmpty('Faculty_LName');

        $validator
            ->allowEmpty('Faculty_FName');

        $validator
            ->allowEmpty('Faculty_MInitial');

        $validator
            ->allowEmpty('CSU');

        $validator
            ->allowEmpty('Author_1_LName');

        $validator
            ->allowEmpty('Author_1_FName');

        $validator
            ->allowEmpty('Author_1_MInitial');

        $validator
            ->allowEmpty('Author_Name_2');

        $validator
            ->allowEmpty('Author_Name_3');

        $validator
            ->allowEmpty('Journal');

        $validator
            ->allowEmpty('Published_Yr');

        $validator
            ->allowEmpty('Database_Accessed');

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
