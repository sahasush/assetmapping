<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ThemesCentersJunction Model
 *
 * @method \App\Model\Entity\ThemesCentersJunction get($primaryKey, $options = [])
 * @method \App\Model\Entity\ThemesCentersJunction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ThemesCentersJunction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ThemesCentersJunction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ThemesCentersJunction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ThemesCentersJunction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ThemesCentersJunction findOrCreate($search, callable $callback = null)
 */
class ThemesCentersJunctionTable extends Table
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

        $this->table('themes_centers_junction');
        $this->displayField('Themes_Centers_Junction_ID');
        $this->primaryKey('Themes_Centers_Junction_ID');
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
            ->integer('Themes_Centers_Junction_ID')
            ->allowEmpty('Themes_Centers_Junction_ID', 'create');

        $validator
            ->integer('Labs_Centers_ID')
            ->allowEmpty('Labs_Centers_ID');

        $validator
            ->integer('Themes_ID')
            ->allowEmpty('Themes_ID');

        return $validator;
    }
}
