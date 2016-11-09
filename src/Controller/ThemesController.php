<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry ;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Text;
use Cake\Database\Statement\PDOStatement;
use Cake\Database\Connection;
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
	public function index() {
		$themes = $this->paginate ( $this->Themes );
		
		$this->set ( compact ( 'themes' ) );
		
		$colnames=$this->loadTablePermission();
		
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
		if ($this->request->is ( 'post' )) {
			$theme_id = $this->request->data ['Themes'];
			$data_component = $this->request->data ['Datacomponent'];
			
			$resultsDegree = null;
			$resultsCourses = null;
			$resultsCenters = null;
			
			// Find relative themes
			$conn = ConnectionManager::get ( 'default' );
			if ($data_component == 'degree') {
				echo "/nMatch found/n";
				$resultsDegree = $this->Themes->find ()->where ( [ 
						'Themes_ID' => $theme_id 
				] )->contain ( 'degrees' )->first ();
				
				//Search the rest of the data
				
				
				$deptdata = $conn->execute ( 'select thm.theme as theme,u.University,c.College ,dept.Department,d.Degree_Level,d.Program_Name from themes thm,themes_degrees_junction dj ,dept_degrees_junction ddj,degrees d,departments dept,universities u,colleges c where thm.themes_ID=dj.themes_id and dj.degrees_id=ddj.degrees_id and d.degrees_id=ddj.degrees_id  and dept.Departments_ID=ddj.deptartments_id and u.University_ID=c.University_ID and c.Colleges_ID=dept.Colleges_ID and thm.themes_id=:theme', [
						'theme' => $theme_id
				] )->fetchAll ( 'assoc' );
				
				
				// $this->log("raw sql::".(Text::toList($sql)),'debug');
				
				$this->set ( 'deptdata', $deptdata );
				$this->set ( '_serialize', [
						'deptdata'
				] );
				
				
				
				$this->set ( 'theme', $resultsDegree );
			} else if ($data_component == 'courses') {
				echo "<br />Match found for courses";
				$resultsCourses = $this->Themes->find ()->where ( [ 
						'Themes_ID' => $theme_id 
				] )->contain ( 'courses' )->first ();
				$this->set ( 'theme', $resultsCourses );
			} else if ($data_component == 'centers') {
				echo "<br />Match found for labs";
				$resultsCenters = $this->Themes->find ()->where ( [ 
						'Themes_ID' => $theme_id 
				] )->contain ( 'labs_centers' )->first ();
				
				$this->set ( 'theme', $resultsCenters );
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
		$theme = $this->Themes->find ()->where ( [ 
				'Themes_ID' => $id 
		] )->contain ( 'degrees' )->first ();
		
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
	public function isAuthorized($user) {
		return parent::isAuthorized ( $user );
	}
	public function beforeFilter(Event $event) {
		$session = $this->request->session ();
		$role = $session->read ( 'User.role' );
		
		$this->set ( "role", $role );
	}
	private function loadTablePermission() {
		$tblcolPer = TableRegistry::get('TblColPermission');
		$colnames = array();
		
		$session = $this->request->session ();
		$role = $session->read ( 'User.role' );
		// Start a new query.
		$results = $tblcolPer->find()->select(['col_name'])->where(['table_name '  =>  'themes'])->where(['role_id' => $role]);
	    
		foreach ($results as $result) {
			
			$this->log("colname::".$result->col_name,'debug');
			$colnames[] = $result->col_name;
			
		}
		
		return $colnames;
	
	}
}
