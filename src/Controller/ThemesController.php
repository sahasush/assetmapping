<?php

namespace App\Controller;

use App\Controller\AppController;

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
		$this->set ( '_serialize', [ 
				'themes' 
		] );
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
	
	public function findByTheme($theme){
	
		return $this->Cities->get($theme , ['contain' => ['degrees']]);
	}
	
	
public function searchResults()
	{
	if ($this->request->is('post'))
		{
		$theme_id = $this->request->data['Themes'];
		$data_component = $this->request->data['Datacomponent'];
		echo "Debug--> " . $theme_id . "  <>" . $data_component;
		$resultsDegree = null;
		$resultsCourses = null;
		$resultsCenters = null;
		if ($data_component == 'degree')
			{
			echo "/nMatch found/n";
			$resultsDegree = $this->Themes->find()->where(['Themes_ID' => $theme_id])->contain('degrees')->first();
			$this->set('theme', $resultsDegree);
			}
		  else if ($data_component == 'courses')
			{
			echo "<br />Match found for courses";
			$resultsCourses = $this->Themes->find()->where(['Themes_ID' => $theme_id])->contain('courses')->first();
			$this->set('theme', $resultsCourses);
			}
		  else if ($data_component == 'centers')
			{
			echo "<br />Match found for labs";
			$resultsCenters = $this->Themes->find()->where(['Themes_ID' => $theme_id])->contain('labs_centers')->first();
			
			$this->set('theme', $resultsCenters);
			}

		$this->set('component', $data_component);
		$this->set('_serialize', ['theme']);
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
}
