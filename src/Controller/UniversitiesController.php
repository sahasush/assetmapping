<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Core\Configure;

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
		] )->order(['College' => 'ASC']);;;
		$colleges->distinct(['College']);
		// Find departments
		
		// Find Colleges
		$values = TableRegistry::get ( 'Departments' );
		
		$departments = $values->find ( 'list', [
				'keyField' => 'Departments_ID',
				'valueField' => 'Department'
		] )->order(['Department' => 'ASC']);
		$departments->distinct(['Department']);
		
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
		)
		 );
		
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
				'keyField' => 'College_ID',
				'valueField' => 'College' 
		] )->where ( [ 
				'Colleges.University_ID >' => $id
		] )
			->order(['College' => 'ASC']);
		
		$colleges->distinct(['College']);
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
		//$this->loadModel ( 'Departments' );
		
		
		
		
		$depts = TableRegistry::get('Departments');
		
	
	
		$departments = $depts->find ( 'list', [
				'keyField' => 'Departments_ID',
				'valueField' => 'Department'
		] )->where ( ['Departments.Colleges_ID' => $id] )
		->order(['Department' => 'ASC']);
		
		
		$num =$departments->count();
		$departments->distinct(['Department']);
	
		$this->set ( compact ( 'departments' ) );
		$this->set ( '_serialize', 'departments' );
	}
}
