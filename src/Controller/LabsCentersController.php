<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Text;
use Cake\Database\Statement\PDOStatement;
use Cake\Database\Connection;
use Cake\Core\Configure;

/**
 * LabsCenters Controller
 *
 * @property \App\Model\Table\LabsCentersTable $LabsCenters
 */
class LabsCentersController extends AppController {
	
	// Custom start
	
	// end
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() 

	{
		// $labsCenters = $this->paginate($this->LabsCenters);
		$this->loadModel ( "LabsCenters" );
		
		$query = $this->LabsCenters->find ( 'all' );
		
		// GET ROLE
		$session = $this->request->session ();
		$role = $session->read ( 'User.role' );
		$this->log ( "Userrole::" . $role, 'debug' );
		$admin = Configure::read ( 'Role.Admin' );
		
		if ($role != $admin) {
			
			$this->Flash->error ( __ ( 'You are not authorized to view this page.' ) );
		} else {
			
			$this->set ( 'labsCenters', $this->paginate ( $query ) );
		}
		
		// $this->set(compact('labsCenters'));
		// $this->set('_serialize', ['labsCenters']);
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	Labs Center id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$colnames = $this->loadTablePermission ( $this->request->session () );
		$this->loadModel ( "LabsCenters" );
		// $labsCenter = $this->LabsCenters->get($id, [
		// 'contain' => []
		// ]);
		
		// Custom start
		
		// get user name
		$session = $this->request->session ();
		$username = $session->read ( 'User.name' );
		$colnames = $this->loadTablePermission ( $session );
		$labsCenter1 = $this->LabsCenters->find ( 'all' )->where ( [ 
				'Labs_Centers_ID' => $id 
		] )->contain ( [ 
				'faculty',
				'departments',
				'universities',
				'colleges' 
		] );
		$labsCenter = $labsCenter1->first ();
		// end
		
		$this->set ( 'colnames', $colnames );
		$this->set ( 'labsCenter', $labsCenter );
		$this->set ( '_serialize', [ 
				'labsCenter' 
		] );
		
		$this->set ( 'username', $username );
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$this->loadModel ( "LabsCenters" );
		$labsCenter = $this->LabsCenters->newEntity ();
		if ($this->request->is ( 'post' )) {
			$labsCenter = $this->LabsCenters->patchEntity ( $labsCenter, $this->request->data );
			if ($this->LabsCenters->save ( $labsCenter )) {
				$this->Flash->success ( __ ( 'The labs center has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The labs center could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'labsCenter' ) );
		$this->set ( '_serialize', [ 
				'labsCenter' 
		] );
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id
	 *        	Labs Center id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$labsCenter = $this->LabsCenters->get ( $id, [ 
				'contain' => [ ] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$labsCenter = $this->LabsCenters->patchEntity ( $labsCenter, $this->request->data );
			if ($this->LabsCenters->save ( $labsCenter )) {
				$this->Flash->success ( __ ( 'The labs center has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The labs center could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'labsCenter' ) );
		$this->set ( '_serialize', [ 
				'labsCenter' 
		] );
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	Labs Center id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$labsCenter = $this->LabsCenters->get ( $id );
		if ($this->LabsCenters->delete ( $labsCenter )) {
			$this->Flash->success ( __ ( 'The labs center has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The labs center could not be deleted. Please, try again.' ) );
		}
		
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
	public function loadTablePermission($session) {
		$tblcolPer = TableRegistry::get ( 'TblColPermission' );
		$colnames = array ();
		
		$session = $this->request->session ();
		$role = $session->read ( 'User.roleID' );
		// Start a new query.
		$results = $tblcolPer->find ()->select ( [ 
				'col_name' 
		] )->where ( [ 
				'table_name ' => 'labs_centers' 
		] )->where ( [ 
				'role_id' => $role 
		] );
		
		foreach ( $results as $result ) {
			
			$this->log ( "colname::" . $result->col_name, 'debug' );
			$colnames [] = $result->col_name;
		}
		
		return $colnames;
	}
	/**
	 * Search by University,labs center
	 */
	public function search() {
		$univs = TableRegistry::get ( 'Universities' );
		$universities = $univs->find ( 'list', [ 
				'keyField' => 'University_ID',
				'valueField' => 'University' 
		] );
		
		// Find Labs/Centers
		$values = TableRegistry::get ( 'LabsCenters' );
		
		$centers = $values->find ( 'list', [ 
				'keyField' => 'Labs_Centers_ID',
				'valueField' => 'Center_Name' 
		] )->order ( [ 
				'Center_Name' => 'ASC' 
		] );
		
		$this->set ( compact ( 'universities' ) );
		$this->set ( '_serialize', [ 
				'universities' 
		] );
		
		$this->set ( compact ( 'centers' ) );
		$this->set ( '_serialize', [ 
				'centers' 
		] );
		
		$this->set ( compact ( 'departments' ) );
		$this->set ( '_serialize', [ 
				'departments' 
		] );
	}
	
	/**
	 * My own convention was to suffix AJAX only actions with "_ajax".
	 * Not really necessary, but can maybe distinguish such actions from
	 * the normal ones.
	 *
	 * This method provides the AJAX data chained_dropdowns() needs.
	 *
	 * @return void
	 */
	public function univCentersAjax() {
		$this->request->allowMethod ( 'ajax' );
		$id = $this->request->query ( 'university_id' );
		if (! $id) {
			throw new NotFoundException ();
		}
		
		$this->log ( "Univesity ID::" . $id, 'debug' );
		$this->viewBuilder ()->className ( 'Ajax.Ajax' );
		
		$this->loadModel ( 'LabsCenters' );
		
		$centers = $this->LabsCenters->find ( 'list', [ 
				'keyField' => 'Labs_Centers_ID',
				'valueField' => 'Center_Name' 
		] )->where ( [ 
				'University_ID =' => $id 
		] )->order ( [ 
				'Center_Name' => 'ASC' 
		] );
		
		$this->log ( "centers::" . $centers, 'debug' );
		$centers->distinct ( [ 
				'Center_Name' 
		] );
		
		$num = $centers->count ();
		$this->log ( "Count::" . $num, 'debug' );
		$this->set ( compact ( 'centers' ) );
		$this->set ( '_serialize', 'centers' );
	}
	/**
	 * Search
	 */
	public function searchResults() {
		if ($this->request->is ( 'get' )) {
			$this->log ( "entered get::", 'debug' );
			// Get the request ids
			$university_id = $this->request->query ['university_id'];
			$center_id = $this->request->query['labs_center_id'];
			$data_component = $this->request->query ['Datacomponent'];
			$this->log ( "Debug university_id --center_id--datacomponent::" . $university_id . '<>' . $center_id . '<>' . $data_component, 'debug' );
			
			$resultsEquipment = null;
			$resultsGrants = null;
			$resultsCenters = null;
			$resultsFaculty = null;
			
			// Find relative themes
			$conn = ConnectionManager::get ( 'default' );
			
			// Labs centers
			if ($data_component == 'centers') {
				// Get dept Data
				$results = $conn->execute ( 'select lc.Center_Name,lc.Labs_Centers_ID,lc.Center_Type,lc.Research_Area,thm.Theme,dept.Department,u.University,c.College from 
						 labs_centers lc 
						  left join themes_centers_junction tcj  on lc.Labs_Centers_ID=tcj.Labs_Centers_ID 
						  left join themes thm on thm.themes_ID=tcj.Themes_ID
						  left join departments dept on lc.departments_ID=dept.departments_id
						  left join  universities u on lc.university_id=u.university_id
						  left join colleges c on lc.colleges_id=c.colleges_id
						  where  lc.university_id=:univ and lc.Labs_Centers_ID =:labs
						  ORDER BY lc.center_name', [ 
						'univ' => $university_id,
						'labs' => $center_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'centers', $results );
				$this->set ( '_serialize', [ 
						'centers' 
				] );
				//Grants
			}else if ($data_component == 'grants') {
				// Get dept Data
				$results = $conn->execute ( 'SELECT
  lc.Center_Name,
  lc.Labs_Centers_ID,
  lc.Center_Type,
  lc.Research_Area,
  GROUP_CONCAT(DISTINCT thm.Theme SEPARATOR ",") Theme,
  dept.Department,
  u.University,
  c.College,
  g.Grant_Project_Title,
  g.Grants_ID
FROM labs_centers lc,themes_centers_junction tcj,themes thm,departments dept,universities u,colleges c, grants g,centers_grants_junction cgj
WHERE  lc.University_ID = :univ
    AND lc.Labs_Centers_ID = tcj.Labs_Centers_ID
  and   thm.Themes_ID = tcj.Themes_ID
  and    lc.Departments_ID = dept.Departments_ID
  and     lc.University_ID = u.University_ID
  and    lc.Colleges_ID = c.Colleges_ID
  and   cgj.Labs_Centers_ID = lc.Labs_Centers_ID
 and     g.Grants_ID = cgj.Grants_ID
AND lc.Labs_Centers_ID = :labs
GROUP BY lc.Center_Name', [ 
						'univ' => $university_id,
						'labs' => $center_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'grants', $results );
				$this->set ( '_serialize', [ 
						'grants'
				] );
			} else if ($data_component == 'equipment') {
				
				$results = $conn->execute ( 'select lc.Center_Name,lc.Labs_Centers_ID,lc.Center_Type,lc.Research_Area,e.Equipment_ID,GROUP_CONCAT(DISTINCT thm.Theme SEPARATOR ",") Theme,dept.Department,u.University,c.College,e.Brand,e.Model,e.Type from 
				 labs_centers lc , themes_centers_junction tcj,themes thm ,departments dept,universities u,colleges c, equipment e
				  where lc.Labs_Centers_ID=tcj.Labs_Centers_ID 
				  and thm.themes_ID=tcj.Themes_ID
				 and lc.departments_ID=dept.departments_id
				 and lc.university_id=u.university_id
				 and lc.colleges_id=c.colleges_id
				 and lc.labs_centers_id=e.lab_centers_id
				  and  lc.university_id=:univ and lc.labs_centers_id=:lab   GROUP BY lc.Center_Name
				  ', [ 
						'univ' => $university_id,
						'lab' => $center_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'equipments', $results );
				$this->set ( '_serialize', [ 
						'equipments' 
				] );
			} else if ($data_component == 'faculty') {
				// Faculty
				
									$results = $conn->execute ( 'SELECT
  lc.Center_Name,
  lc.Labs_Centers_ID,
  lc.Center_Type,
  GROUP_CONCAT(DISTINCT thm.Theme SEPARATOR ",") Theme,
  dept.Department,
  u.University,
  c.College,
  f.Faculty_ID,
  f.Faculty_Lname,
  f.Faculty_Fname,
  f.Faculty_MInitial
FROM labs_centers lc,
     themes_centers_junction tcj,
     themes thm,
     departments dept,
     universities u,
     colleges c,
     centers_faculty_junction cfj,
     faculty f
WHERE lc.University_ID = :univ
AND lc.Labs_Centers_ID = :lab
AND lc.Labs_Centers_ID = tcj.Labs_Centers_ID
AND thm.Themes_ID = tcj.Themes_ID
AND lc.Departments_ID = dept.Departments_ID
AND lc.University_ID = u.University_ID
AND lc.Colleges_ID = c.Colleges_ID
AND cfj.Labs_Centers_ID = lc.Labs_Centers_ID
AND cfj.Faculty_ID = f.Faculty_ID
GROUP BY lc.Center_Name,
         f.Faculty_Lname,
         f.Faculty_Fname', [ 
						'univ' => $university_id,
						'lab' => $center_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'faculties', $results );
				$this->set ( '_serialize', [ 
						'faculties' 
				] );
			}
			$this->set ( 'component', $data_component );
		}
	}
	
	/**
	 * Authorize users
	 */
	public function isAuthorized($user) {
		$session = $this->request->session ();
		$role = $session->read ( 'User.role' );
	
		$admin = Configure::read ( 'Role.Admin' );
		if ($role != $admin) {$this->log ( "Test:Not admin::" . $role."--action".$this->request->action , 'debug' );
		if ($this->request->action == 'view' || $this->request->action == 'search' || $this->request->action == 'searchResults' || $this->request->action == 'univCentersAjax') {
			$this->log ( "Test:Not admin--1::" . $role, 'debug' );
			return true;
		}else{
			$this->Flash->error(__('Page not authorized'));
			return false;
		}
	
	
		}else{
	
			$this->log ( "Test: admin::" . $role, 'debug' );
			return true;
		}
	
		return parent::isAuthorized($user);
	}
}
