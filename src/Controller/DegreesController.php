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
 * Degrees Controller
 *
 * @property \App\Model\Table\DegreesTable $Degrees
 */
class DegreesController extends AppController
{

	public 	function initialize()
	{
		parent::initialize();
	
		$this ->loadComponent('Global')	;
	}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $degrees = $this->paginate($this->Degrees);

        $this->set(compact('degrees'));
        $this->set('_serialize', ['degrees']);
    }

    /**
     * View method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $degree = $this->Degrees->get($id, [
            'contain' => []
        ]);
        
       // GET ROLE

    	$session = $this->request->session();
    	$username = $session->read('User.name');
    	 
    	$role = $session->read('User.role');
    	$admin = Configure::read('Role.Admin');
    	$colnames = $this->Global->loadTablePermission ( $session,'degrees' );
    	$this->set('colnames', $colnames);
    	
    	// End permission

        $this->set('degree', $degree);
        $this->set('_serialize', ['degree']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $degree = $this->Degrees->newEntity();
        if ($this->request->is('post')) {
            $degree = $this->Degrees->patchEntity($degree, $this->request->data);
            if ($this->Degrees->save($degree)) {
                $this->Flash->success(__('The degree has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The degree could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('degree'));
        $this->set('_serialize', ['degree']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $degree = $this->Degrees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $degree = $this->Degrees->patchEntity($degree, $this->request->data);
            if ($this->Degrees->save($degree)) {
                $this->Flash->success(__('The degree has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The degree could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('degree'));
        $this->set('_serialize', ['degree']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Degree id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $degree = $this->Degrees->get($id);
        if ($this->Degrees->delete($degree)) {
            $this->Flash->success(__('The degree has been deleted.'));
        } else {
            $this->Flash->error(__('The degree could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Authorize users
     */
    public function isAuthorized($user) {
    	$session = $this->request->session ();
    	$role = $session->read ( 'User.role' );
    
    	$admin = Configure::read ( 'Role.Admin' );
    	if ($role != $admin) {
    		$this->log ( "Test:Not admin::" . $role."--action".$this->request->action , 'debug' );
    		if ($this->request->action == 'view' ) {
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
