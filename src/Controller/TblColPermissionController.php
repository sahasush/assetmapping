<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TblColPermission Controller
 *
 * @property \App\Model\Table\TblColPermissionTable $TblColPermission
 */
class TblColPermissionController extends AppController
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
    	
    	
        $tblColPermission = $this->paginate($this->TblColPermission);

        $this->set(compact('tblColPermission'));
        $this->set('_serialize', ['tblColPermission']);
    }

    /**
     * View method
     *
     * @param string|null $id Tbl Col Permission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblColPermission = $this->TblColPermission->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('tblColPermission', $tblColPermission);
        $this->set('_serialize', ['tblColPermission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblColPermission = $this->TblColPermission->newEntity();
        if ($this->request->is('post')) {
            $tblColPermission = $this->TblColPermission->patchEntity($tblColPermission, $this->request->data);
            if ($this->TblColPermission->save($tblColPermission)) {
                $this->Flash->success(__('The tbl col permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tbl col permission could not be saved. Please, try again.'));
            }
        }
        $tblColPerms = $this->TblColPermission->TblColPerms->find('list', ['limit' => 200]);
        $roles = $this->TblColPermission->Roles->find('list', ['limit' => 200]);
        $this->set(compact('tblColPermission', 'tblColPerms', 'roles'));
        $this->set('_serialize', ['tblColPermission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tbl Col Permission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblColPermission = $this->TblColPermission->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblColPermission = $this->TblColPermission->patchEntity($tblColPermission, $this->request->data);
            if ($this->TblColPermission->save($tblColPermission)) {
                $this->Flash->success(__('The tbl col permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tbl col permission could not be saved. Please, try again.'));
            }
        }
        $tblColPerms = $this->TblColPermission->TblColPerms->find('list', ['limit' => 200]);
        $roles = $this->TblColPermission->Roles->find('list', ['limit' => 200]);
        $this->set(compact('tblColPermission', 'tblColPerms', 'roles'));
        $this->set('_serialize', ['tblColPermission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tbl Col Permission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblColPermission = $this->TblColPermission->get($id);
        if ($this->TblColPermission->delete($tblColPermission)) {
            $this->Flash->success(__('The tbl col permission has been deleted.'));
        } else {
            $this->Flash->error(__('The tbl col permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
