<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Faculty Model
 *
 * @method \App\Model\Entity\Faculty get($primaryKey, $options = [])
 * @method \App\Model\Entity\Faculty newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Faculty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Faculty|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Faculty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Faculty[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Faculty findOrCreate($search, callable $callback = null)
 */
class FacultyTable extends Table
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

        $this->table('faculty');
        $this->displayField('Faculty_ID');
        $this->primaryKey('Faculty_ID');
		
		$this->belongsToMany('LabsCenters', [
		'alias' => 'Labscenters',
        'foreignKey' => 'Faculty_ID',
        'targetForeignKey' => 'Labs_Centers_ID',
		 'joinTable' => 'centers_faculty_junction'			
        ]);
		
		//Custom --start
		
		 // Add the behaviour to your table
        $this->addBehavior('Search.Search');
		
		
		
		//custom --end
				
		
		
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
            ->integer('Faculty_ID')
            ->allowEmpty('Faculty_ID', 'create');

        $validator
            ->allowEmpty('Faculty_Fname');

        $validator
            ->allowEmpty('Faculty_Lname');

        $validator
            ->allowEmpty('Faculty_MInitial');

        $validator
            ->allowEmpty('Email');

        $validator
            ->allowEmpty('CSU');

        $validator
            ->allowEmpty('Position');

        $validator
            ->allowEmpty('Dept_Affiliation');

        $validator
            ->allowEmpty('Address_Line_1');

        $validator
            ->allowEmpty('Building_Room');

        $validator
            ->allowEmpty('Address_Line_2');

        $validator
            ->allowEmpty('Phone_1');

        $validator
            ->allowEmpty('Phone_1_Ext');

        $validator
            ->allowEmpty('Phone_2');

        $validator
            ->allowEmpty('Phone_2_Desc');

        $validator
            ->allowEmpty('Expertise');

        $validator
            ->allowEmpty('Degree');

        $validator
            ->allowEmpty('Degree_Discip');

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
	//Custom --sush
	     public function searchConfiguration()
    {
          $search = new Manager($this);

            $search
            ->value('Faculty_ID', [
                'field' => $this->aliasField('Faculty_ID'),
            ])
            // Here we will alias the 'q' query param to search the `Users.email`
            // field and the `Users.rg` field, using a LIKE match, with `%`
            // both before and after.
            ->like('name', [
                'before' => true,
                'after' => true,
                'field' => [$this->aliasField('Faculty_Fname'), $this->aliasField('Faculty_Lname')]
            ])
            ->callback('foo', [
                'callback' => function ($query, $args, $manager) {
                    // Modify $query as required
                }
            ]);

        return $search;
   

    }
	
	
	//end
	
}
