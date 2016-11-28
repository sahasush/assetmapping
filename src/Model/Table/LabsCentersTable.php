<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LabsCenters Model
 *
 * @method \App\Model\Entity\LabsCenter get($primaryKey, $options = [])
 * @method \App\Model\Entity\LabsCenter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LabsCenter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LabsCenter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LabsCenter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LabsCenter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LabsCenter findOrCreate($search, callable $callback = null)
 */
class LabsCentersTable extends Table
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

        $this->table('labs_centers');
        $this->displayField('Labs_Centers_ID');
        $this->primaryKey('Labs_Centers_ID');
		
		
		$this->belongsToMany('faculty', [
		'alias' => 'Faculty',
        'foreignKey' => 'Labs_Centers_ID',
        'targetForeignKey' => 'Faculty_ID',
		 'joinTable' => 'Centers_Faculty_Junction'			
        ]);
		
		//Departments		
		$this->belongsTo('departments', [
				'foreignKey' => 'Departments_Id',
				'joinType' => 'INNER',
		]);
		
		//Colleges
		$this->belongsTo('colleges', [
				'foreignKey' => 'Colleges_Id',
				'joinType' => 'INNER',
		]);
		
		
		//University
		$this->belongsTo('universities', [
				'foreignKey' => 'University_ID',
				'joinType' => 'INNER',
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
            ->integer('Labs_Centers_ID')
            ->allowEmpty('Labs_Centers_ID', 'create');

        $validator
            ->allowEmpty('Center_Type');

        $validator
            ->allowEmpty('Center_Name');

        $validator
            ->allowEmpty('Research_Area');

        $validator
            ->allowEmpty('Estbl_Yr');

        $validator
            ->allowEmpty('Active_Status');

        $validator
            ->allowEmpty('Contact_1_Lname');

        $validator
            ->allowEmpty('Contact_1_Fname');

        $validator
            ->allowEmpty('Contact_1_Minitial');

        $validator
            ->allowEmpty('Contact_2_Lname');

        $validator
            ->allowEmpty('Contact_2_Fname');

        $validator
            ->allowEmpty('Contact_2_Minitial');

        $validator
            ->allowEmpty('No_of_Researchers');

        $validator
            ->allowEmpty('No_of_Technicians');

        $validator
            ->allowEmpty('Lab_Accreditation');

        $validator
            ->allowEmpty('Time_of_Operation');

        $validator
            ->allowEmpty('Email');

        $validator
            ->allowEmpty('Address_1');

        $validator
            ->allowEmpty('Building_Room');

        $validator
            ->allowEmpty('Address_2');

        $validator
            ->allowEmpty('Phone_1');

        $validator
            ->allowEmpty('Phone_1_Ext');

        $validator
            ->allowEmpty('Phone_2');

        $validator
            ->allowEmpty('Phone_2_Desc');

        $validator
            ->allowEmpty('Web_URL');

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
            ->integer('University_ID')
            ->allowEmpty('University_ID');

        $validator
            ->integer('Colleges_ID')
            ->allowEmpty('Colleges_ID');

        $validator
            ->integer('Departments_ID')
            ->allowEmpty('Departments_ID');

        return $validator;
    }
}
