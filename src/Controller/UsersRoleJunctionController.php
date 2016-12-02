<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersRoleJunction Controller
 *
 * @property \App\Model\Table\UsersRoleJunctionTable $UsersRoleJunction
 */
class UsersRoleJunctionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $usersRoleJunction = $this->paginate($this->UsersRoleJunction);

        $this->set(compact('usersRoleJunction'));
        $this->set('_serialize', ['usersRoleJunction']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Role Junction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersRoleJunction = $this->UsersRoleJunction->get($id, [
            'contain' => ['RoleJunctions', 'Roles']
        ]);

        $this->set('usersRoleJunction', $usersRoleJunction);
        $this->set('_serialize', ['usersRoleJunction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersRoleJunction = $this->UsersRoleJunction->newEntity();
        if ($this->request->is('post')) {
            $usersRoleJunction = $this->UsersRoleJunction->patchEntity($usersRoleJunction, $this->request->data);
            if ($this->UsersRoleJunction->save($usersRoleJunction)) {
                $this->Flash->success(__('The users role junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users role junction could not be saved. Please, try again.'));
            }
        }
        
        $roles = $this->UsersRoleJunction->Roles->find('list', ['limit' => 200]);
        $this->set(compact('usersRoleJunction',  'roles'));
        $this->set('_serialize', ['usersRoleJunction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Role Junction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersRoleJunction = $this->UsersRoleJunction->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersRoleJunction = $this->UsersRoleJunction->patchEntity($usersRoleJunction, $this->request->data);
            if ($this->UsersRoleJunction->save($usersRoleJunction)) {
                $this->Flash->success(__('The users role junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users role junction could not be saved. Please, try again.'));
            }
        }
        $roleJunctions = $this->UsersRoleJunction->RoleJunctions->find('list', ['limit' => 200]);
        $roles = $this->UsersRoleJunction->Roles->find('list', ['limit' => 200]);
        $this->set(compact('usersRoleJunction', 'roleJunctions', 'roles'));
        $this->set('_serialize', ['usersRoleJunction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Role Junction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersRoleJunction = $this->UsersRoleJunction->get($id);
        if ($this->UsersRoleJunction->delete($usersRoleJunction)) {
            $this->Flash->success(__('The users role junction has been deleted.'));
        } else {
            $this->Flash->error(__('The users role junction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
