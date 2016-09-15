<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CentersFacultyJunction Model
 *
 * @method \App\Model\Entity\CentersFacultyJunction get($primaryKey, $options = [])
 * @method \App\Model\Entity\CentersFacultyJunction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CentersFacultyJunction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CentersFacultyJunction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CentersFacultyJunction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CentersFacultyJunction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CentersFacultyJunction findOrCreate($search, callable $callback = null)
 */
class CentersFacultyJunctionTable extends Table
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

        $this->table('centers_faculty_junction');
        $this->displayField('Centers_Faculty_Junction_ID');
        $this->primaryKey('Centers_Faculty_Junction_ID');
		
		$this->belongsTo('Faculty');
        $this->belongsTo('LabCenters');
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
            ->integer('Centers_Faculty_Junction_ID')
            ->allowEmpty('Centers_Faculty_Junction_ID', 'create');

        $validator
            ->integer('Labs_Centers_ID')
            ->allowEmpty('Labs_Centers_ID');

        $validator
            ->integer('Faculty_ID')
            ->allowEmpty('Faculty_ID');

        return $validator;
    }
}
