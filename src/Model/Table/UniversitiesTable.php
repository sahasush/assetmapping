<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Universities Model
 *
 * @method \App\Model\Entity\University get($primaryKey, $options = [])
 * @method \App\Model\Entity\University newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\University[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\University|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\University patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\University[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\University findOrCreate($search, callable $callback = null)
 */
class UniversitiesTable extends Table
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

        $this->table('universities');
        $this->displayField('University_ID');
        $this->primaryKey('University_ID');
        
        $this->hasMany('labscenters', [
        		'alias' => 'LabsCenters',
        		'foreignKey' => 'University_ID',
        		
        ]);
        
        $this->hasMany('colleges', [
        		'alias' => 'Colleges',
        		'foreignKey' => 'University_ID',
        
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
            ->integer('University_ID')
            ->allowEmpty('University_ID', 'create');

        $validator
            ->allowEmpty('University');

        $validator
            ->allowEmpty('Addrss_Line_1');

        $validator
            ->allowEmpty('Addrss_Line_2');

        return $validator;
    }
}
