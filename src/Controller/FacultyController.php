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
 * Faculty Controller
 *
 * @property \App\Model\Table\FacultyTable $Faculty
 */
class FacultyController extends AppController

{
	
	
	
	/**
	 * Show how redirecting works when AJAX is involved:
	 * It will requestAction() the redirect instead of actually redirecting.
	 *
	 * @return \Cake\Network\Response|null
	 */
	public

	function redirecting()
	{
		if ($this->request->is('post'))
		{

			// Do sth like saving data

			if (!$this->request->is('ajax'))
			{
				$this->Flash->success('Yeah, that was a normal POST and redirect (PRG).');
			}

			return $this->redirect(['action' => 'index']);
		}
	}

	/**
	 * Show how redirecting works when AJAX is involved using Ajax component and view class.
	 * It will not follow the redirect, but instead return it along with messages sent.
	 *
	 * @return \Cake\Network\Response|null
	 */
	public

	function redirectingPrevented()
	{
		if ($this->request->is('post'))
		{

			// Do sth like saving data

			$this->Flash->success('Yeah, that was a normal POST and redirect (PRG).');
			return $this->redirect(['action' => 'index']);
		}
	}

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public 	function index()
	{

		// $faculty = $this->paginate($this->Faculty);
		// Custom --sush

		$query = $this->Faculty->find('search', $this->Faculty->filterParams($this->request->query));

		// Use the plugins 'search' custom finder and pass in the
		// processed query params

		

		// GET ROLE

		$session = $this->request->session();
		$role = $session->read('User.role');
		$this->log("Userrole::" . $role, 'debug');
		$admin = Configure::read('Role.Admin');
		if ($role != $admin)
		{
			$this->Flash->error(__('You are not authorized to view this page.'));
		}
		else
		{
			$this->set('faculties', $this->paginate($query));
		}

		// end --sush
		// $this->set(compact('faculty'));
		// $this->set('_serialize', ['faculty']);

	}

	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	Faculty id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public

	function view($id = null)
	{
		$faculty = $this->Faculty->get($id, ['contain' => ['Publications']]);

		// Get the permission

		$session = $this->request->session();
		$username = $session->read('User.name');

		// GET ROLE

		$role = $session->read('User.role');
		$admin = Configure::read('Role.Admin');
		$colnames = $this->Global->loadTablePermission ( $session,'faculty' );
		$this->set('colnames', $colnames);

		// End permission
		
		$this->log('username --'.$username.'--'.$role, 'debug');

		$this->set('faculty', $faculty);
		$this->set('role', $role);
		$this->set('Admin', $admin);
		$this->set('_serialize', ['faculty']);
	}

	public

	function viewpublications($id = null)
	{
		$faculty = $this->Faculty->get($id, ['contain' => ['Publications']]);
		
		
		$faculty = $this->Faculty->get($id, ['contain' => ['Publications'=>['sort'=>['Publications.Publication_Name' => 'ASC']]]]);

		//Get the permission
        $session = $this->request->session ();
        $username= $session->read ( 'User.name' );
        // GET ROLE
        
        $role = $session->read ( 'User.role' );
        $admin = Configure::read ( 'Role.Admin' );       
        
        
        $colnames = $this->Global->loadTablePermission ( $session,'publications' );
        
        $this->log ( $this->name."_".$this->request->action." ::Colnames::" . implode("--",$colnames), 'debug' );
        $this->set ( 'colnames', $colnames );

		// End permission

		$this->set('faculty', $faculty);
		$this->set('role', $role);
		$this->set('Admin', $admin);
		$this->set('_serialize', ['faculty']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public

	function add()
	{
		$faculty = $this->Faculty->newEntity();
		if ($this->request->is('post'))
		{
			$faculty = $this->Faculty->patchEntity($faculty, $this->request->data);
			if ($this->Faculty->save($faculty))
			{
				$this->Flash->success(__('The faculty has been saved.'));
				return $this->redirect(['action' => 'index']);
			}
			else
			{
				$this->Flash->error(__('The faculty could not be saved. Please, try again.'));
			}
		}

		$this->set(compact('faculty'));
		$this->set('_serialize', ['faculty']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id
	 *        	Faculty id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public

	function edit($id = null)
	{
		$faculty = $this->Faculty->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put']))
		{
			$faculty = $this->Faculty->patchEntity($faculty, $this->request->data);
			if ($this->Faculty->save($faculty))
			{
				$this->Flash->success(__('The faculty has been saved.'));
				return $this->redirect(['action' => 'index']);
			}
			else
			{
				$this->Flash->error(__('The faculty could not be saved. Please, try again.'));
			}
		}

		$this->set(compact('faculty'));
		$this->set('_serialize', ['faculty']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	Faculty id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public

	function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$faculty = $this->Faculty->get($id);
		if ($this->Faculty->delete($faculty))
		{
			$this->Flash->success(__('The faculty has been deleted.'));
		}
		else
		{
			$this->Flash->error(__('The faculty could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	// Custom --sush

	public

	function initialize()
	{
		parent::initialize();
		if (in_array($this->request->action, ['redirectingPrevented', 'form', 'toggle']))
		{
			$this->components['Ajax.Ajax'] = ['flashKey' => 'FlashMessage'];
		}
		$this ->loadComponent('Global')	;
	}

	

	/**
	 * Search by University,faculty
	 */
	public

	function search()
	{
		$univs = TableRegistry::get('Universities');
		$universities = $univs->find('list', ['keyField' => 'University_ID', 'valueField' => 'University']);

		// Find Labs/Centers

		$values = TableRegistry::get('Faculty');
		$faclnames = $values->find('list', ['keyField' => 'Faculty_ID', 'valueField' => 'Faculty_Lname'])->order(['Faculty_Lname' => 'ASC']);
		$this->log($this->name . "_" . $this->request->action . " ::Fac Lname:" . $faclnames, 'debug');
		$facfnames = $values->find('list', ['keyField' => 'Faculty_Fname', 'valueField' => 'Faculty_Fname'])->order(['Faculty_Fname' => 'ASC']);
		$this->set(compact('universities'));
		$this->set('_serialize', ['universities']);
		$this->set(compact('faclnames'));
		$this->set('_serialize', ['faclnames']);
		$this->set(compact('facfnames'));
		$this->set('_serialize', ['facfnames']);
	}

	/**
	 *
	 * @throws NotFoundException
	 */
	public function univFlnameAjax()
	{
		
		$this->request->allowMethod('ajax');
		$id = $this->request->query('university_id');
		if (!$id)
		{
			throw new NotFoundException();
		}

		$this->log("University ID." . $id, "debug");
		$this->viewBuilder()->className('Ajax.Ajax');
		$this->loadModel('Faculty');
		$conn = ConnectionManager::get('default');
		$faclnames = $conn->execute('select 
				distinct (f.Faculty_Lname ),
					   u.University,					 
					  f.Faculty_ID,					 
					  f.Faculty_Fname,
					  f.Faculty_MInitial
					from 
					  labs_centers lc
				  	  left join universities u on lc.university_id = u.university_id 
					  left join colleges c on lc.colleges_id = c.colleges_id 
					  LEFT join centers_faculty_junction cfj on cfj.Labs_Centers_ID=lc.Labs_Centers_ID
					  INNER JOIN faculty f ON cfj.Faculty_ID=f.Faculty_ID
					where 
					  lc.university_id = :univ  group by f.Faculty_Lname ORDER  BY f.Faculty_Lname ASC ', ['univ' => $id])->fetchAll('assoc');
		$this->set('faclnames', $faclnames);

		// $this->set ( compact ( 'faclnames' ) );

		$this->set('_serialize', 'faclnames');
	}

	public	function fnameLnameAjax()
	{
		$this->log(" Get First Name", 'debug');
		$this->request->allowMethod('ajax');
		$id = $this->request->query('university_id');
		$lname = $this->request->query('flname');
		if (!$id)
		{
			throw new NotFoundException();
		}

		$this->log($id . "--lname_id-->." . $lname, "debug");
		$this->viewBuilder()->className('Ajax.Ajax');
		$this->loadModel('Faculty');
		$conn = ConnectionManager::get('default');
		$facfnames = $conn->execute('select
				distinct(f.Faculty_ID),
				f.Faculty_Fname ,
					   u.University,					  
					  f.Faculty_Fname,
					  f.Faculty_MInitial
					from
					  labs_centers lc
				  	  left join universities u on lc.university_id = u.university_id
					  left join colleges c on lc.colleges_id = c.colleges_id
					  LEFT join centers_faculty_junction cfj on cfj.Labs_Centers_ID=lc.Labs_Centers_ID
					  INNER JOIN faculty f ON cfj.Faculty_ID=f.Faculty_ID
					where
					  lc.university_id = :univ  and f.Faculty_Lname=:lname ORDER  BY f.Faculty_Fname ASC ', ['univ' => $id, 'lname' => $lname])->fetchAll('assoc');

		// Test start

		foreach($facfnames as $fac)
		{
			$this->log("Name-->" . h($fac['Faculty_Fname']) , "debug");
		}

		// Test End

		$this->set(compact('facfnames'));
		$this->set('_serialize', 'facfnames');
	}

	/**
	 * Search by Publications
	 */
	public function searchResults()
	{
		
		
		
		if ($this->request->is('get'))
		{

			// Get the request ids

			$university_id = $this->request->query['university_id'];
			$fac_id =$this->request->query['lname_id'];
			$data_component = $this->request->query['Datacomponent'];
			$this->log("Univ ID--".$university_id ."--Fac ID--".$fac_id."--Comp--".$data_component, 'debug');
			$this->set ( 'component', $data_component );
			// Find relative themes
			$conn = ConnectionManager::get ( 'default' );
			if ($data_component == 'faculty') {
			
				$facdata =$conn->execute ( 'select 
					  lc.Center_Name, 
					  lc.Labs_Centers_ID, 
					  lc.Center_Type, 
					  thm.Theme, 
					  dept.Department, 
					  u.University, 
					  c.College, 
					  f.Faculty_ID,
					 f.Faculty_Lname ,
					  f.Faculty_Fname,
					  f.Faculty_MInitial
					from 
					  faculty f 
            		  LEFT JOIN centers_faculty_junction cfj ON cfj.Faculty_ID=f.Faculty_ID
            		  LEFT JOIN labs_centers lc ON cfj.Labs_Centers_ID=lc.Labs_Centers_ID
					  left join themes_centers_junction tcj on lc.Labs_Centers_ID = tcj.Labs_Centers_ID 
					  left join themes thm on thm.themes_ID = tcj.Themes_ID 
					  left join departments dept on lc.departments_ID = dept.departments_id 
					  left join universities u on lc.university_id = u.university_id 
					  left join colleges c on lc.colleges_id = c.colleges_id 
					where 
					  lc.university_id =:univ
					  and f.Faculty_ID=:fac_id ', [ 
						'univ' => $university_id,
						'fac_id' => $fac_id 
				] )->fetchAll ( 'assoc' );
				
			
				
				// $this->log("raw sql::".(Text::toList($sql)),'debug');
			
				$this->set ( 'facdata', $facdata );
				$this->set ( '_serialize', [
						'facdata'
				] );
			
			}else if ($data_component == 'publication') {
				return $this->redirect(['action' => 'viewpublications', $fac_id]);
			}
			
			
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
		if ($this->request->action == 'fnameLnameAjax' || $this->request->action == 'view' || $this->request->action == 'search' || $this->request->action == 'searchResults' || $this->request->action == 'univFlnameAjax' || $this->request->action == 'viewpublications') {
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