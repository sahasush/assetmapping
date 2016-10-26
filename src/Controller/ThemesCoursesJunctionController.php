<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ThemesCoursesJunction Controller
 *
 * @property \App\Model\Table\ThemesCoursesJunctionTable $ThemesCoursesJunction
 */
class ThemesCoursesJunctionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $themesCoursesJunction = $this->paginate($this->ThemesCoursesJunction);

        $this->set(compact('themesCoursesJunction'));
        $this->set('_serialize', ['themesCoursesJunction']);
    }

    /**
     * View method
     *
     * @param string|null $id Themes Courses Junction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $themesCoursesJunction = $this->ThemesCoursesJunction->get($id, [
            'contain' => []
        ]);

        $this->set('themesCoursesJunction', $themesCoursesJunction);
        $this->set('_serialize', ['themesCoursesJunction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $themesCoursesJunction = $this->ThemesCoursesJunction->newEntity();
        if ($this->request->is('post')) {
            $themesCoursesJunction = $this->ThemesCoursesJunction->patchEntity($themesCoursesJunction, $this->request->data);
            if ($this->ThemesCoursesJunction->save($themesCoursesJunction)) {
                $this->Flash->success(__('The themes courses junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The themes courses junction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('themesCoursesJunction'));
        $this->set('_serialize', ['themesCoursesJunction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Themes Courses Junction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $themesCoursesJunction = $this->ThemesCoursesJunction->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $themesCoursesJunction = $this->ThemesCoursesJunction->patchEntity($themesCoursesJunction, $this->request->data);
            if ($this->ThemesCoursesJunction->save($themesCoursesJunction)) {
                $this->Flash->success(__('The themes courses junction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The themes courses junction could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('themesCoursesJunction'));
        $this->set('_serialize', ['themesCoursesJunction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Themes Courses Junction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $themesCoursesJunction = $this->ThemesCoursesJunction->get($id);
        if ($this->ThemesCoursesJunction->delete($themesCoursesJunction)) {
            $this->Flash->success(__('The themes courses junction has been deleted.'));
        } else {
            $this->Flash->error(__('The themes courses junction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
