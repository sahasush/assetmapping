<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry ;
use Cake\Log\Log;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
    
    public function home()
    {
    	//Do nothing
    }
    

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['roles']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
        	$data=$this->request->data();
        	
        	$associated=['Roles'];
            $user = $this->Users->patchEntity($user, $this->request->data(),['associated' => $associated]);
            $this->log ( "test::" . $user, 'debug' );
            if ($this->Users->save($user)) {
            	 $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Users->roles->find('list');
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Users->roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Login
     */
    public function login()
    {
    	if ($this->request->is('post')) {
    		$user = $this->Auth->identify();
    
    
    		if ($user) {
    			$this->Auth->setUser($user);
    			//Get roles
    
    			//      $id   = $user['id'];
    			 
    			$session = $this->request->session();
    			$role=$this->getUserRoles($user);
    			$session->write('User.role', $role);
    			$session->write('User.name',$user['username']);
    			//End
    			return $this->redirect($this->Auth->redirectUrl());
    		}
    
    
    		$this->Flash->error(__('Invalid username or password, try again'));
    	}
    }
    private function getUserRoles($user)
    {
    	$users = TableRegistry::get('Users');
    	$session = $this->request->session();
    	$rname="";
    	$priority=10;
    	$counter=0;
    	$rolename="";
    	$query = $users->find()
    	->contain(['roles'])
    	->where(['users.id' => $user['id']])
    	->limit(1);
    	 
    	foreach ($query as $row) {
    		// Each row is now an instance of our Article class.
    		echo $row->id;
    
    		if (!empty($row->roles)){
    			foreach ($row->roles as $role){
    				$counter=$counter+1;
    				if($counter ==1 ){
    					$priority=$role->priority;
    					$rolename=$role->name;
    					$session->write('User.roleID', $role->role_id);
    				}else{
    					$priority=min(	$priority,$role->priority);//not needed for now
    					$rolename=$role->name;
    					$session->write('User.roleID', $role->role_id);
    					
    				}
    			}
    		}
    
    	}
    	
    	return $rolename;
    }
    
    
    
    public function initialize()
    {
    	parent::initialize();
    	$this->Auth->allow(['logout']);
    }
    
    public function logout()
    {
    	$this->Flash->success('You are now logged out.');
    	return $this->redirect($this->Auth->logout());
    }
    
       }