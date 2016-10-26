<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ThemesCoursesJunction Model
 *
 * @method \App\Model\Entity\ThemesCoursesJunction get($primaryKey, $options = [])
 * @method \App\Model\Entity\ThemesCoursesJunction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ThemesCoursesJunction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ThemesCoursesJunction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ThemesCoursesJunction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ThemesCoursesJunction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ThemesCoursesJunction findOrCreate($search, callable $callback = null)
 */
class ThemesCoursesJunctionTable extends Table
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

        $this->table('themes_courses_junction');
        $this->displayField('Themes_Courses_Junction_ID');
        $this->primaryKey('Themes_Courses_Junction_ID');
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
            ->integer('Themes_Courses_Junction_ID')
            ->allowEmpty('Themes_Courses_Junction_ID', 'create');

        $validator
            ->integer('Themes_ID')
            ->allowEmpty('Themes_ID');

        $validator
            ->integer('Courses_ID')
            ->allowEmpty('Courses_ID');

        return $validator;
    }
}
