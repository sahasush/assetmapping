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
 * Faculty Controller
 *
 * @property \App\Model\Table\FacultyTable $Faculty
 */
class FacultyController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
      //  $faculty = $this->paginate($this->Faculty);
		
		
		//Custom --sush
	
	 $query = $this->Faculty
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', $this->Faculty->filterParams($this->request->query));
	 
	 // GET ROLE
	 $session = $this->request->session ();
	 $role = $session->read ( 'User.role' );
	 $this->log ( "Userrole::" . $role, 'debug' );
	 $admin = Configure::read ( 'Role.Admin' );
	 
	 if ($role != $admin) {
	 		
	 	$this->Flash->error ( __ ( 'You are not authorized to view this page.' ) );
	 } else {
	 		
	 	$this->set('faculties', $this->paginate($query));
		
	 }
	 
            

        
		//end --sush

      //  $this->set(compact('faculty'));
        //$this->set('_serialize', ['faculty']);
    }

    /**
     * View method
     *
     * @param string|null $id Faculty id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $faculty = $this->Faculty->get($id, [
            'contain' => []
        ]);
        
        //Get the permission       
        $session = $this->request->session ();
        $username= $session->read ( 'User.name' );    
        // GET ROLE
      
        $role = $session->read ( 'User.role' );
        $admin = Configure::read ( 'Role.Admin' );
        
        $colnames = $this->loadTablePermission ( $session );
        $this->set ( 'colnames', $colnames );
        //End permission

        $this->set('faculty', $faculty);
        $this->set('role',$role);
        $this->set('Admin',$admin);
        $this->set('_serialize', ['faculty']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faculty = $this->Faculty->newEntity();
        if ($this->request->is('post')) {
            $faculty = $this->Faculty->patchEntity($faculty, $this->request->data);
            if ($this->Faculty->save($faculty)) {
                $this->Flash->success(__('The faculty has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The faculty could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('faculty'));
        $this->set('_serialize', ['faculty']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Faculty id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $faculty = $this->Faculty->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faculty = $this->Faculty->patchEntity($faculty, $this->request->data);
            if ($this->Faculty->save($faculty)) {
                $this->Flash->success(__('The faculty has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The faculty could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('faculty'));
        $this->set('_serialize', ['faculty']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Faculty id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faculty = $this->Faculty->get($id);
        if ($this->Faculty->delete($faculty)) {
            $this->Flash->success(__('The faculty has been deleted.'));
        } else {
            $this->Flash->error(__('The faculty could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	//Custom --sush
	public function initialize()
    {
       parent::initialize();

       
	 $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
	}
	//end
	
	public function loadTablePermission($session) {
		$tblcolPer = TableRegistry::get ( 'TblColPermission' );
		$colnames = array ();
	
		$session = $this->request->session ();
		$role = $session->read ('User.roleID' );
		// Start a new query.
		$results = $tblcolPer->find ()->select ( [
				'col_name'
		] )->where ( [
				'table_name ' => 'faculty'
		] )->where ( [
				'role_id' => $role
		] );
	
		foreach ( $results as $result ) {
			 
			$this->log ( "colname::" . $result->col_name, 'debug' );
			$colnames [] = $result->col_name;
		}
	
		return $colnames;
	}
}
