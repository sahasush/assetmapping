<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CentersFacultyJunction Controller
 *
 * @property \App\Model\Table\CentersFacultyJunctionTable $CentersFacultyJunction
 */
class CentersFacultyJunctionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $centersFacultyJunction = $this->paginate($this->CentersFacultyJunction);

        $this->set(compact('centersFacultyJunction'));
        $this->set('_serialize', ['centersFacultyJunction']);
    }

    /**
     * View method
     *
     * @param string|null $id Centers Faculty Junction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $centersFacultyJunction = $this->CentersFacultyJunction->get($id, [
            'contain' => []
        ]);

        $this->set('centersFacultyJunction', $centersFacultyJunction);
        $this->set('_serialize', ['centersFacultyJunction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $centersFacultyJunction = $this->CentersFacultyJunction->newEntity();
        if ($this->request->is('post')) {
            $centersFacultyJunction = $this->CentersFacultyJunction->patchEntity($centersFacultyJunction, $this->request->data);
            if ($this->CentersFacultyJunction->save($centersFacultyJunction)) {
                $this->Flash->success(__('The centers faculty junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The centers faculty junction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('centersFacultyJunction'));
        $this->set('_serialize', ['centersFacultyJunction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Centers Faculty Junction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $centersFacultyJunction = $this->CentersFacultyJunction->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $centersFacultyJunction = $this->CentersFacultyJunction->patchEntity($centersFacultyJunction, $this->request->data);
            if ($this->CentersFacultyJunction->save($centersFacultyJunction)) {
                $this->Flash->success(__('The centers faculty junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The centers faculty junction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('centersFacultyJunction'));
        $this->set('_serialize', ['centersFacultyJunction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Centers Faculty Junction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $centersFacultyJunction = $this->CentersFacultyJunction->get($id);
        if ($this->CentersFacultyJunction->delete($centersFacultyJunction)) {
            $this->Flash->success(__('The centers faculty junction has been deleted.'));
        } else {
            $this->Flash->error(__('The centers faculty junction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
