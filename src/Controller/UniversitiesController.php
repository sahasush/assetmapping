<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Text;
use Cake\Database\Statement\PDOStatement;
use Cake\Database\Connection;

/**
 * Universities Controller
 *
 * @property \App\Model\Table\UniversitiesTable $Universities
 */
class UniversitiesController extends AppController {
	
	/**
	 *
	 * @return void
	 */
	public function initialize() {
		if (in_array ( $this->request->action, [ 
				'redirectingPrevented',
				'form',
				'toggle' 
		] )) {
			$this->components ['Ajax.Ajax'] = [ 
					'flashKey' => 'FlashMessage' 
			];
		}
		parent::initialize ();
		$this->loadComponent ( 'Global' );
	}
	
	/**
	 * Show how redirecting works when AJAX is involved:
	 * It will requestAction() the redirect instead of actually redirecting.
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function redirecting() {
		if ($this->request->is ( 'post' )) {
			// Do sth like saving data
			if (! $this->request->is ( 'ajax' )) {
				$this->Flash->success ( 'Yeah, that was a normal POST and redirect (PRG).' );
			}
			return $this->redirect ( [ 
					'action' => 'index' 
			] );
		}
	}
	/**
	 * Show how redirecting works when AJAX is involved using Ajax component and view class.
	 * It will not follow the redirect, but instead return it along with messages sent.
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function redirectingPrevented() {
		if ($this->request->is ( 'post' )) {
			// Do sth like saving data
			$this->Flash->success ( 'Yeah, that was a normal POST and redirect (PRG).' );
			return $this->redirect ( [ 
					'action' => 'index' 
			] );
		}
	}
	
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() {
		$universities = $this->paginate ( $this->Universities );
		
		$this->set ( compact ( 'universities' ) );
		$this->set ( '_serialize', [ 
				'universities' 
		] );
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	University id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$university = $this->Universities->get ( $id, [ 
				'contain' => [ 
						'labscenters' 
				] 
		] );
		
		// $this->log("Test1111",implode("--",$university->labscenters));
		$this->set ( 'university', $university );
		$this->set ( '_serialize', [ 
				'university' 
		] );
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$university = $this->Universities->newEntity ();
		if ($this->request->is ( 'post' )) {
			$university = $this->Universities->patchEntity ( $university, $this->request->data );
			if ($this->Universities->save ( $university )) {
				$this->Flash->success ( __ ( 'The university has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The university could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'university' ) );
		$this->set ( '_serialize', [ 
				'university' 
		] );
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id
	 *        	University id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$university = $this->Universities->get ( $id, [ 
				'contain' => [ ] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$university = $this->Universities->patchEntity ( $university, $this->request->data );
			if ($this->Universities->save ( $university )) {
				$this->Flash->success ( __ ( 'The university has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The university could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'university' ) );
		$this->set ( '_serialize', [ 
				'university' 
		] );
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	University id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$university = $this->Universities->get ( $id );
		if ($this->Universities->delete ( $university )) {
			$this->Flash->success ( __ ( 'The university has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The university could not be deleted. Please, try again.' ) );
		}
		
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
	
	/**
	 * Search through lists
	 */
	public function search() {
		$universities = $this->Universities->find ( 'list', [ 
				'keyField' => 'University_ID',
				'valueField' => 'University' 
		] );
		
		// Find Colleges
		$values = TableRegistry::get ( 'Colleges' );
		
		$colleges = $values->find ( 'list', [ 
				'keyField' => 'College_ID',
				'valueField' => 'College' 
		] )->where ( [ 
				'Colleges.Colleges_ID = ' => '0' 
		] )->order ( [ 
				'College' => 'ASC' 
		] );
		
		$colleges->distinct ( [ 
				'College' 
		] );
		
		$colleges = $colleges->cleanCopy ();
		
		// Find Colleges
		$values = TableRegistry::get ( 'Departments' );
		
		$departments = $values->find ( 'list', [ 
				'keyField' => 'Departments_ID',
				'valueField' => 'Department' 
		] )->where ( [ 
				'Departments.Departments_ID = ' => '0' 
		] )->order ( [ 
				'Department' => 'ASC' 
		] );
		$departments->distinct ( [ 
				'Department' 
		] );
		
		$this->set ( compact ( 'universities' ) );
		$this->set ( '_serialize', [ 
				'universities' 
		] );
		
		$this->set ( compact ( 'colleges' ) );
		$this->set ( '_serialize', [ 
				'colleges' 
		] );
		
		$this->set ( compact ( 'departments' ) );
		$this->set ( '_serialize', [ 
				'departments' 
		] );
	}
	public function get_by_colleges($id = null) {
		$univ_id = $this->request->data ['Universities'] ['University_ID'];
		
		$this->loadModel ( "Colleges" );
		
		$subcategories = $this->Colleges->find ( 'list', array (
				
				'conditions' => array (
						'Colleges.university_id' => $univ_id 
				),
				
				'fields' => 'college',
				
				'recursive' => - 1 
		) );
		
		$this->set ( 'colleges', $subcategories );
		
		$this->layout = 'ajax';
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
	public function univCollegesAjax() {
		$this->request->allowMethod ( 'ajax' );
		$id = $this->request->query ( 'university_id' );
		if (! $id) {
			throw new NotFoundException ();
		}
		
		$this->viewBuilder ()->className ( 'Ajax.Ajax' );
		$this->loadModel ( 'Colleges' );
		
		$colleges = $this->Colleges->find ( 'list', [ 
				'keyField' => 'Colleges_ID',
				'valueField' => 'College' 
		] )->where ( [ 
				'University_ID =' => $id 
		] )->order ( [ 
				'College' => 'ASC' 
		] );
		
		$colleges->distinct ( [ 
				'College' 
		] );
		
		$num = $colleges->count ();
		$this->set ( compact ( 'colleges' ) );
		$this->set ( '_serialize', 'colleges' );
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
	public function collegeDeptAjax() {
		$this->request->allowMethod ( 'ajax' );
		$id = $this->request->query ( 'college_id' );
		if (! $id) {
			throw new NotFoundException ();
		}
		
		$this->viewBuilder ()->className ( 'Ajax.Ajax' );
		// $this->loadModel ( 'Departments' );
		
		$depts = TableRegistry::get ( 'Departments' );
		
		$departments = $depts->find ( 'list', [ 
				'keyField' => 'Departments_ID',
				'valueField' => 'Department' 
		] )->where ( [ 
				'Departments.Colleges_ID = ' => $id 
		] )->order ( [ 
				'Department' => 'ASC' 
		] );
		
		$num = $departments->count ();
		$departments->distinct ( [ 
				'Department' 
		] );
		
		$this->set ( compact ( 'departments' ) );
		$this->set ( '_serialize', 'departments' );
	}
	
	/**
	 * Returns the results of the selections
	 */
	public function searchResults() {
		if ($this->request->is ( 'get' )) {
			// Get the request ids
			$university_id = $this->request->query ['university_id'];
			$college_id = $this->request->query ['college_id'];
			$department_id = $this->request->query ['department_id'];
			
			$data_component = $this->request->query ['Datacomponent'];
			$this->log ( "MMM::" . $data_component, 'debug' );
			
			$resultsDegree = null;
			$resultsCourses = null;
			$resultsCenters = null;
			
			// Find relative themes
			$conn = ConnectionManager::get ( 'default' );
			$session = $this->request->session ();
			if ($data_component == 'degrees') {
				
				$tbl = TableRegistry::get ( 'Degrees' );
				
				$data = $tbl->find ( 'all' )->leftJoin ( 'dept_degrees_junction', 'dept_degrees_junction.degrees_id=Degrees.Degrees_ID' )->where ( [ 
						'dept_degrees_junction.deptartments_ID IN(' . $department_id . ')' 
				] );
				
				$total = $data->count ();
				
				$deptdata = $conn->execute ( 'select thm.theme as theme,d.Program_Name,dept.Department,u.University,c.College from themes thm,themes_degrees_junction dj ,dept_degrees_junction ddj,degrees d,departments dept,universities u,colleges c where thm.themes_ID=dj.themes_id and dj.degrees_id=ddj.degrees_id and d.degrees_id=ddj.degrees_id  and ddj.deptartments_id IN (:dept) and dept.Departments_ID=ddj.deptartments_id and u.University_ID=c.University_ID and c.Colleges_ID=dept.Colleges_ID', [ 
						'dept' => $department_id 
				] )->fetchAll ( 'assoc' );
				
				$this->log ( "query::" . $data, 'debug' );
				// $this->log("raw sql::".(Text::toList($sql)),'debug');
				
				$this->set ( 'deptdata', $deptdata );
				$this->set ( '_serialize', [ 
						'deptdata' 
				] );
				
				$this->set ( 'degrees', $data );
				$this->set ( '_serialize', [ 
						'degrees' 
				] );
				
				$this->set ( 'component', $data_component );
				
				$colnames = $this->Global->loadTablePermission ( $session, 'degrees' );
				$this->set ( 'colnames', $colnames );
			} else if ($data_component == 'courses') {
				
				$values = TableRegistry::get ( 'Courses' );
				$results1 = $values->find ( 'all' )->where ( [ 
						'Courses.Departments_ID =' => $department_id 
				] );
				
				$results = $this->paginate ( $results1 );
				
				$this->set ( 'courses', $results );
				$this->set ( '_serialize', [ 
						'courses' 
				] );
				
				// Get dept Data
				$deptdata = $conn->execute ( 'select  distinct (co.course_title),co.Courses_ID,thm.theme as theme,dept.Department,u.University,c.College from themes thm,themes_courses_junction dc ,courses co,departments dept,universities u,colleges c where  thm.themes_ID=dc.themes_id and co.departments_id=dept.Departments_ID  and dept.departments_id=:dept and  u.University_ID=c.University_ID and c.Colleges_ID=dept.Colleges_ID', [ 
						'dept' => $department_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'deptdata', $deptdata );
				$this->set ( '_serialize', [ 
						'deptdata' 
				] );
				
				$colnames = $this->Global->loadTablePermission ( $session, 'courses' );
				$this->set ( 'colnames', $colnames );
				// Equpment
			} else if ($data_component == 'equipment') {
				// $tbl = TableRegistry::get ( 'LabsCenters' );
				
				// $data = $tbl->find ( 'all' )->leftJoin ( 'labs_centers', 'labs_centers.labs_centers_id=LabsCenters.labs_centers_id' )->where ( [
				// 'LabsCenters.departments_ID' => $department_id
				// ] );
				$tbl = TableRegistry::get ( 'Equipment' );
				$data = $tbl->find ( 'all' )->leftJoin ( 'labs_centers', 'labs_centers.labs_centers_id=equipment.lab_centers_id' )->where ( [ 
						'labs_centers.departments_ID' => $department_id 
				] );
				
				$this->log ( "query::" . $data, 'debug' );
				;
				$this->set ( 'equipments', $data );
				$this->set ( '_serialize', [ 
						'equipments' 
				] );
				
				// Get dept Data
				$deptdata = $conn->execute ( ' select distinct e.center_name,thm.theme as theme,dept.Department,u.University,c.College from themes thm,departments dept,universities u,colleges c,equipment e,labs_centers lc,themes_centers_junction tcj  where  thm.themes_id=tcj.themes_id  and e.lab_centers_id=lc.labs_centers_id  and tcj.labs_centers_id=lc.labs_centers_id  and lc.departments_id=dept.Departments_ID  and dept.departments_id=:dept and  u.University_ID=lc.University_ID and c.Colleges_ID=dept.Colleges_ID', [ 
						'dept' => $department_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'deptdata', $deptdata );
				$this->set ( '_serialize', [ 
						'deptdata' 
				] );
				
				$colnames = $this->Global->loadTablePermission ( $session, 'equipment' );
				$this->set ( 'colnames', $colnames );
				// Labs centers
			} else if ($data_component == 'centers') {
				$values = TableRegistry::get ( 'LabsCenters' );
				$results1 = $values->find ( 'all' )->where ( [ 
						'LabsCenters.Departments_ID =' => $department_id 
				] );
				
				$results = $this->paginate ( $results1 );
				
				$this->set ( 'centers', $results );
				$this->set ( '_serialize', [ 
						'centers' 
				] );
				$this->log ( "query::" . $results1, 'debug' );
				
				// Get dept Data
				$deptdata = $conn->execute ( 'select lc. center_name,lc.Labs_Centers_ID,lc.center_type,lc.Research_Area,thm.theme as theme,dept.Department,u.University,c.College from 
				  themes thm,departments dept,universities u,colleges c,labs_centers lc,themes_centers_junction tcj where 
				  thm.themes_ID=tcj.themes_id  and dept.departments_id=:dept 
				  and  u.University_ID=c.University_ID and c.Colleges_ID=dept.Colleges_ID
				  AND lc.departments_ID=dept.departments_id AND lc.colleges_id=c.Colleges_ID and lc.university_id=u.University_ID
				  AND lc.Labs_Centers_ID=tcj.Labs_Centers_ID
				  ORDER BY lc.center_name', [ 
						'dept' => $department_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'deptdata', $deptdata );
				$this->set ( '_serialize', [ 
						'deptdata' 
				] );
				
				$colnames = $this->Global->loadTablePermission ( $session, 'labs_centers' );
				$this->set ( 'colnames', $colnames );
			} else if ($data_component == 'faculty') {
				
				// Get faculty Data
				$deptdata = $conn->execute ( 'SELECT 
					  lc.Center_Name, 
					  lc.Labs_Centers_ID, 
					  lc.Center_Type, 
					 GROUP_CONCAT(DISTINCT  thm.Theme SEPARATOR ",") theme, 
					  dept.Department, 
					  u.University, 
					  c.College, 
					  f.Faculty_ID,
					 f.Faculty_Lname ,
					  f.Faculty_Fname,
					  f.Faculty_MInitial
					from colleges c 
        left join universities u on c.university_id = u.University_ID
         left join departments dept on c.Colleges_ID = dept.Colleges_ID 
         left join labs_centers lc on  lc.colleges_id = c.colleges_id           
           left join themes_centers_junction tcj on lc.Labs_Centers_ID = tcj.Labs_Centers_ID 
            left join themes thm on thm.themes_ID = tcj.Themes_ID 
            LEFT JOIN centers_faculty_junction cfj on  cfj.Labs_Centers_ID=lc.Labs_Centers_ID
					  left join faculty f on  cfj.Faculty_ID=f.Faculty_ID           
					where 
					  dept.Departments_ID=:dept  GROUP BY f.Faculty_Lname ,lc.Center_Name', [ 
						'dept' => $department_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'faculties', $deptdata );
				$this->set ( '_serialize', [ 
						'faculties' 
				] );
				
				$this->log ( 'Empty::' . empty ( $deptdata ) . '<>' . count ( $deptdata ), 'debug' );
				
				$this->set ( 'deptdata', $deptdata );
				$this->set ( '_serialize', [ 
						'deptdata' 
				] );
				
				$colnames = $this->Global->loadTablePermission ( $session, 'faculty' );
				$this->set ( 'colnames', $colnames );
			} else if ($data_component == 'universities') {
				
				// Get faculty Data
				$deptdata = $conn->execute ( '  SELECT
						    distinct ( dept.Department),
						  thm.Theme AS theme, 
						  u.University,
						  c.College,
						  u.Addrss_Line_1,u.Addrss_Line_2
						FROM  universities u  
						     left join labs_centers lc  on lc.University_ID = u.University_ID
						      left join departments dept on lc.Departments_ID = dept.Departments_ID
						     left join colleges c on c.colleges_id = u.University_ID
						    left join themes_centers_junction tcj on lc.Labs_Centers_ID = tcj.Labs_Centers_ID
						    left join themes thm on  thm.Themes_ID = tcj.Themes_ID      
						 where   dept.Departments_ID = :dept', [ 
						'dept' => $department_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'deptdata', $deptdata );
				$this->set ( '_serialize', [ 
						'deptdata' 
				] );
				
				$this->set ( 'universities', $deptdata );
				$this->set ( '_serialize', [ 
						'universities' 
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
		if ($role != $admin) {
			
			if ($this->request->action == 'view' || $this->request->action == 'search' || $this->request->action == 'searchResults' || $this->request->action == 'univCollegesAjax' || $this->request->action == 'collegeDeptAjax') {
				
				return true;
			} else {
				$this->Flash->error ( __ ( 'Page not authorized' ) );
				return false;
			}
		} else {
			
			return true;
		}
		
		return parent::isAuthorized ( $user );
	}
}
