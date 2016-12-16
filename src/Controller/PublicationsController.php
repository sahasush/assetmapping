<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Text;
use Cake\Database\Statement\PDOStatement;
use Cake\Database\Connection;

/**
 * Publications Controller
 *
 * @property \App\Model\Table\PublicationsTable $Publications
 */
class PublicationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $publications = $this->paginate($this->Publications);

        $this->set(compact('publications'));
        $this->set('_serialize', ['publications']);
    }

    /**
     * View method
     *
     * @param string|null $id Publication id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publication = $this->Publications->get($id, [
            'contain' => []
        ]);

        $this->set('publication', $publication);
        $this->set('_serialize', ['publication']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $publication = $this->Publications->newEntity();
        if ($this->request->is('post')) {
            $publication = $this->Publications->patchEntity($publication, $this->request->data);
            if ($this->Publications->save($publication)) {
                $this->Flash->success(__('The publication has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The publication could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('publication'));
        $this->set('_serialize', ['publication']);
    }
    

    /**
     * Edit method
     *
     * @param string|null $id Publication id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publication = $this->Publications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publication = $this->Publications->patchEntity($publication, $this->request->data);
            if ($this->Publications->save($publication)) {
                $this->Flash->success(__('The publication has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The publication could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('publication'));
        $this->set('_serialize', ['publication']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Publication id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publication = $this->Publications->get($id);
        if ($this->Publications->delete($publication)) {
            $this->Flash->success(__('The publication has been deleted.'));
        } else {
            $this->Flash->error(__('The publication could not be deleted. Please, try again.'));
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
