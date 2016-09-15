<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ThemesDegreesJunction Model
 *
 * @method \App\Model\Entity\ThemesDegreesJunction get($primaryKey, $options = [])
 * @method \App\Model\Entity\ThemesDegreesJunction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ThemesDegreesJunction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ThemesDegreesJunction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ThemesDegreesJunction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ThemesDegreesJunction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ThemesDegreesJunction findOrCreate($search, callable $callback = null)
 */
class ThemesDegreesJunctionTable extends Table
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

        $this->table('themes_degrees_junction');
        $this->displayField('Themes_Degrees_Junction_ID');
        $this->primaryKey('Themes_Degrees_Junction_ID');
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
            ->integer('Themes_Degrees_Junction_ID')
            ->allowEmpty('Themes_Degrees_Junction_ID', 'create');

        $validator
            ->integer('Themes_ID')
            ->allowEmpty('Themes_ID');

        $validator
            ->integer('Degrees_ID')
            ->allowEmpty('Degrees_ID');

        return $validator;
    }
}
