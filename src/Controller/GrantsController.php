<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Grants Controller
 *
 * @property \App\Model\Table\GrantsTable $Grants
 */
class GrantsController extends AppController
{

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
}
