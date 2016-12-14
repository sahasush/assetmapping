<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Grants Controller
 *
 * @property \App\Model\Table\GrantsTable $Grants
 */
class GrantsController extends AppController
{

	public function initialize()
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
        $grants = $this->paginate($this->Grants);

        $this->set(compact('grants'));
        $this->set('_serialize', ['grants']);
    }

    /**
     * View method
     *
     * @param string|null $id Grant id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grant = $this->Grants->get($id, [
            'contain' => []
        ]);

        
        //Get the permission
        $session = $this->request->session ();
        $username= $session->read ( 'User.name' );
        // GET ROLE
        
        $role = $session->read ( 'User.role' );
        $admin = Configure::read ( 'Role.Admin' );
        
        
        
        $colnames = $this->Global->loadTablePermission ( $session,'grants' );
        
        $this->log ( $this->name."_".$this->request->action." ::Colnames::" . implode("--",$colnames), 'debug' );
        $this->set ( 'colnames', $colnames );
        $this->set('grant', $grant);
        $this->set('_serialize', ['grant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grant = $this->Grants->newEntity();
        if ($this->request->is('post')) {
            $grant = $this->Grants->patchEntity($grant, $this->request->data);
            if ($this->Grants->save($grant)) {
                $this->Flash->success(__('The grant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grant could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('grant'));
        $this->set('_serialize', ['grant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grant = $this->Grants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grant = $this->Grants->patchEntity($grant, $this->request->data);
            if ($this->Grants->save($grant)) {
                $this->Flash->success(__('The grant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grant could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('grant'));
        $this->set('_serialize', ['grant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grant = $this->Grants->get($id);
        if ($this->Grants->delete($grant)) {
            $this->Flash->success(__('The grant has been deleted.'));
        } else {
            $this->Flash->error(__('The grant could not be deleted. Please, try again.'));
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
    
    		if ($this->request->action == 'view' ) {
    
    			return true;
    		}else{
    			$this->Flash->error(__('Page not authorized'));
    			return false;
    		}
    		 
    		 
    	}else{
    		 
    
    		return true;
    	}
    
    	return parent::isAuthorized($user);
    }
}
