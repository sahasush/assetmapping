<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ThemesDegreesJunction Controller
 *
 * @property \App\Model\Table\ThemesDegreesJunctionTable $ThemesDegreesJunction
 */
class ThemesDegreesJunctionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $themesDegreesJunction = $this->paginate($this->ThemesDegreesJunction);

        $this->set(compact('themesDegreesJunction'));
        $this->set('_serialize', ['themesDegreesJunction']);
    }

    /**
     * View method
     *
     * @param string|null $id Themes Degrees Junction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $themesDegreesJunction = $this->ThemesDegreesJunction->get($id, [
            'contain' => []
        ]);

        $this->set('themesDegreesJunction', $themesDegreesJunction);
        $this->set('_serialize', ['themesDegreesJunction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $themesDegreesJunction = $this->ThemesDegreesJunction->newEntity();
        if ($this->request->is('post')) {
            $themesDegreesJunction = $this->ThemesDegreesJunction->patchEntity($themesDegreesJunction, $this->request->data);
            if ($this->ThemesDegreesJunction->save($themesDegreesJunction)) {
                $this->Flash->success(__('The themes degrees junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The themes degrees junction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('themesDegreesJunction'));
        $this->set('_serialize', ['themesDegreesJunction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Themes Degrees Junction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $themesDegreesJunction = $this->ThemesDegreesJunction->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $themesDegreesJunction = $this->ThemesDegreesJunction->patchEntity($themesDegreesJunction, $this->request->data);
            if ($this->ThemesDegreesJunction->save($themesDegreesJunction)) {
                $this->Flash->success(__('The themes degrees junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The themes degrees junction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('themesDegreesJunction'));
        $this->set('_serialize', ['themesDegreesJunction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Themes Degrees Junction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $themesDegreesJunction = $this->ThemesDegreesJunction->get($id);
        if ($this->ThemesDegreesJunction->delete($themesDegreesJunction)) {
            $this->Flash->success(__('The themes degrees junction has been deleted.'));
        } else {
            $this->Flash->error(__('The themes degrees junction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
