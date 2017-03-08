<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Text;
use Cake\Database\Statement\PDOStatement;
use Cake\Database\Connection;
use Cake\Core\Configure;

/**
 * Themes Controller
 *
 * @property \App\Model\Table\ThemesTable $Themes
 */
class ThemesController extends AppController {
	
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function initialize() {
		parent::initialize ();
		$this->loadComponent ( 'Paginator' );
		$this->loadComponent ( 'Global' );
	}
	public function index() {
		$themes = $this->paginate ( $this->Themes );
		
		$this->set ( compact ( 'themes' ) );
		
		$colnames = $this->loadTablePermission ( $this->request->session () );
		
		$this->set ( '_serialize', [ 
				'themes' 
		] );
		
		$this->set ( 'colnames', $colnames );
	}
	public function search() {
		
		// $themes =$this->paginate($this->Themes);
		$themes = $this->Themes->find ( 'list', [ 
				'keyField' => 'Themes_ID',
				'valueField' => 'Theme' 
		] );
		
		$this->set ( compact ( 'themes' ) );
		$this->set ( '_serialize', [ 
				'themes' 
		] );
	}
	public function findByTheme($theme) {
		return $this->Cities->get ( $theme, [ 
				'contain' => [ 
						'degrees' 
				] 
		] );
	}
	public function searchResults() {
		if ($this->request->is ( 'get' )) {
			$theme_id = $this->request->query ['Themes'];
			$data_component = $this->request->query ['Datacomponent'];
			$colnames = $this->loadTablePermission ();
			
			$resultsDegree = null;
			$resultsCourses = null;
			$resultsCenters = null;
			
			// Find relative themes
			
			// Get Role
			$session = $this->request->session ();
			$username = $session->read ( 'User.name' );
			// GET ROLE
			
			$role = $session->read ( 'User.role' );
			$admin = Configure::read ( 'Role.Admin' );
			
			$this->set ( 'role', $role );
			$this->set ( 'Admin', $admin );
			
			$conn = ConnectionManager::get ( 'default' );
			
			// get the theme
			
			$theme = $this->Themes->find ()->where ( [ 
					'Themes_ID' => $theme_id 
			] );
			
			$theme = $theme->first ();
			$this->log ( "theme::" . $theme, 'debug' );
			$this->set ( 'theme', $theme );
			
			if ($data_component == 'degree') {
				
				$degrees = $conn->execute ( 'select thm.theme as theme,u.University_ID,u.University,c.Colleges_ID,dept.Departments_ID,c.College ,dept.Department,d.Degree_Level,d.Degrees_ID,d.Description,d.Sources,d.Program_Name from themes thm,themes_degrees_junction dj ,dept_degrees_junction ddj,degrees d,departments dept,universities u,colleges c where thm.themes_ID=dj.themes_id and dj.degrees_id=ddj.degrees_id and d.degrees_id=ddj.degrees_id  and dept.Departments_ID=ddj.deptartments_id and u.University_ID=c.University_ID and c.Colleges_ID=dept.Colleges_ID and thm.themes_id=:theme', [ 
						'theme' => $theme_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'degrees', $degrees );
				$this->set ( '_serialize', [ 
						'degrees' 
				] );
				
				$colnames = $this->Global->loadTablePermission ( $session, 'degrees' );
				$this->set ( 'colnames', $colnames );
			} else if ($data_component == 'courses') {
				
				// Get dept Data
				$courses = $conn->execute ( 'SELECT DISTINCT' . '(co.Course_Title), co.Courses_ID,co.Course_Abbr,co.Course_Number,co.Units,co.Catalog_Link,co.Sources,co.Course_Number,  thm.theme,  dept.Department,' . ' u.University,  c.College FROM themes thm, themes_courses_junction dc,' . ' courses co, departments dept, universities u,colleges c WHERE thm.Themes_ID = dc.Themes_ID' . ' AND co.Departments_ID = dept.Departments_ID AND thm.Themes_ID=:th' . ' AND u.University_ID = c.University_ID AND c.Colleges_ID = dept.Colleges_ID ORDER BY thm.Theme,u.University', [ 
						'th' => $theme_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'courses', $courses );
				$this->set ( '_serialize', [ 
						'courses' 
				] );
				
				$colnames = $this->Global->loadTablePermission ( $session, 'courses' );
				$this->set ( 'colnames', $colnames );
			} else if ($data_component == 'centers') {
				
				// Get dept Data
				$centers = $conn->execute ( 'select  lc.center_name,lc.labs_centers_id,lc.center_type,lc.research_area, thm.theme as theme,' . '  dept.Department,u.University,c.College  from themes thm  left join themes_centers_junction tcj on  thm.themes_ID=tcj.themes_id ' . 'left join labs_centers lc on tcj.labs_centers_id=lc.labs_centers_id  left join departments dept on lc.departments_id=dept.departments_id' . '  left join universities u on lc.university_id=u.university_id  left join colleges c on c.Colleges_ID= lc.Colleges_ID    where thm.themes_ID=:thm' . ' order by thm.theme,u.University,c.College,dept.Department', [ 
						'thm' => $theme_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'centers', $centers );
				$this->set ( '_serialize', [ 
						'centers' 
				] );
				
				$colnames = $this->Global->loadTablePermission ( $session, 'labs_centers' );
				$this->set ( 'colnames', $colnames );
			} else if ($data_component == 'faculty') {
				
				// Get dept Data
				$faculties = $conn->execute ( 'SELECT f.Faculty_Fname,  f.Faculty_ID,f.Faculty_Lname ,  f.Faculty_MInitial,  f.Position,  lc.Center_Name,
										  thm.theme AS theme,
										  dept.Department,
										  u.University,
										  c.College
										FROM themes thm,
										     departments dept,
										     universities u,
										     colleges c,
										     labs_centers lc,
										     themes_centers_junction tcj,
										     centers_faculty_junction cfj,
										     faculty f
										WHERE thm.Themes_ID = :thm
										AND tcj.Labs_Centers_ID = lc.Labs_Centers_ID
										AND thm.Themes_ID = tcj.Themes_ID
										AND u.University_ID = c.University_ID
										AND c.Colleges_ID = dept.Colleges_ID
										AND lc.Departments_ID = dept.Departments_ID
										AND lc.University_ID = u.University_ID
										AND lc.Colleges_ID = c.Colleges_ID
										  AND f.Faculty_ID=cfj.Faculty_ID
										  AND cfj.Labs_Centers_ID=lc.Labs_Centers_ID
										  AND tcj.Labs_Centers_ID=lc.Labs_Centers_ID
										ORDER BY thm.theme, u.University, c.College, dept.Department', [ 
						'thm' => $theme_id 
				] )->fetchAll ( 'assoc' );
				
				$this->set ( 'faculties', $faculties );
				$this->set ( '_serialize', [ 
						'faculties' 
				] );
				
				$colnames = $this->Global->loadTablePermission ( $session, 'faculty' );
				$this->set ( 'colnames', $colnames );
			}
			
			$this->set ( 'component', $data_component );
			$this->set ( '_serialize', [ 
					'theme' 
			] );
		}
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	Theme id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		
		// Custom start
		/**
		 * $theme = $this->Themes->find ()->where ( [
		 * 'Themes_ID' => $id
		 * ] )->contain ( 'degrees' )->first ();
		 */
		$theme = $this->Themes->find ()->where ( [ 
				'Themes_ID' => $id 
		] );
		$theme = $theme->contain ( [ 
				'degrees' => [ 
						'sort' => [ 
								'degrees.Degree_Level' => 'ASC' 
						] 
				] 
		] );
		$theme = $theme->first ();
		$this->set ( 'theme', $theme );
		$this->set ( '_serialize', [ 
				'theme' 
		] );
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$theme = $this->Themes->newEntity ();
		if ($this->request->is ( 'post' )) {
			$theme = $this->Themes->patchEntity ( $theme, $this->request->data );
			if ($this->Themes->save ( $theme )) {
				$this->Flash->success ( __ ( 'The theme has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The theme could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'theme' ) );
		$this->set ( '_serialize', [ 
				'theme' 
		] );
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id
	 *        	Theme id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$theme = $this->Themes->get ( $id, [ 
				'contain' => [ ] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$theme = $this->Themes->patchEntity ( $theme, $this->request->data );
			if ($this->Themes->save ( $theme )) {
				$this->Flash->success ( __ ( 'The theme has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The theme could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'theme' ) );
		$this->set ( '_serialize', [ 
				'theme' 
		] );
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	Theme id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$theme = $this->Themes->get ( $id );
		if ($this->Themes->delete ( $theme )) {
			$this->Flash->success ( __ ( 'The theme has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The theme could not be deleted. Please, try again.' ) );
		}
		
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
	public function beforeFilter(Event $event) {
		$session = $this->request->session ();
		$role = $session->read ( 'User.role' );
		
		$this->set ( "role", $role );
	}
	private function loadTablePermission() {
		$tblcolPer = TableRegistry::get ( 'TblColPermission' );
		$colnames = array ();
		
		$session = $this->request->session ();
		$role = $session->read ( 'User.role' );
		// Start a new query.
		$results = $tblcolPer->find ()->select ( [ 
				'col_name' 
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
	 * Authorize users
	 */
	public function isAuthorized($user) {
		$session = $this->request->session ();
		$role = $session->read ( 'User.role' );
		
		$admin = Configure::read ( 'Role.Admin' );
		if ($role != $admin) {
			$this->log ( "Test:Not admin::" . $role . "--action" . $this->request->action, 'debug' );
			if ($this->request->action == 'view' || $this->request->action == 'search' || $this->request->action == 'searchResults') {
				$this->log ( "Test:Not admin--1::" . $role, 'debug' );
				return true;
			} else {
				$this->Flash->error ( __ ( 'Page not authorized' ) );
				return false;
			}
		} else {
			
			$this->log ( "Test: admin::" . $role, 'debug' );
			return true;
		}
		
		return parent::isAuthorized ( $user );
	}
}
