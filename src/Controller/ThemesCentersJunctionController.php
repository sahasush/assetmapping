<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ThemesCentersJunction Controller
 *
 * @property \App\Model\Table\ThemesCentersJunctionTable $ThemesCentersJunction
 */
class ThemesCentersJunctionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $themesCentersJunction = $this->paginate($this->ThemesCentersJunction);

        $this->set(compact('themesCentersJunction'));
        $this->set('_serialize', ['themesCentersJunction']);
    }

    /**
     * View method
     *
     * @param string|null $id Themes Centers Junction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $themesCentersJunction = $this->ThemesCentersJunction->get($id, [
            'contain' => []
        ]);

        $this->set('themesCentersJunction', $themesCentersJunction);
        $this->set('_serialize', ['themesCentersJunction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $themesCentersJunction = $this->ThemesCentersJunction->newEntity();
        if ($this->request->is('post')) {
            $themesCentersJunction = $this->ThemesCentersJunction->patchEntity($themesCentersJunction, $this->request->data);
            if ($this->ThemesCentersJunction->save($themesCentersJunction)) {
                $this->Flash->success(__('The themes centers junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The themes centers junction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('themesCentersJunction'));
        $this->set('_serialize', ['themesCentersJunction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Themes Centers Junction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $themesCentersJunction = $this->ThemesCentersJunction->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $themesCentersJunction = $this->ThemesCentersJunction->patchEntity($themesCentersJunction, $this->request->data);
            if ($this->ThemesCentersJunction->save($themesCentersJunction)) {
                $this->Flash->success(__('The themes centers junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The themes centers junction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('themesCentersJunction'));
        $this->set('_serialize', ['themesCentersJunction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Themes Centers Junction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $themesCentersJunction = $this->ThemesCentersJunction->get($id);
        if ($this->ThemesCentersJunction->delete($themesCentersJunction)) {
            $this->Flash->success(__('The themes centers junction has been deleted.'));
        } else {
            $this->Flash->error(__('The themes centers junction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
