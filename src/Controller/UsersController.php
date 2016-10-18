<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry ;


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
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
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
            'contain' => []
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
        $this->set(compact('user'));
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
                //End
               return $this->redirect($this->Auth->redirectUrl());
            }
            
            
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    private function getUserRoles($user)
    {
    	$users = TableRegistry::get('Users');
    	$rname="";
    	$priority=10;
    	$counter=0;
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
    				}else{
    					$priority=min(	$priority,$role->priority);
    				}
    			}
    		}
    		
    	}   	
    	
    	return $priority;
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
