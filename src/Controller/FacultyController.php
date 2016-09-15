<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Faculty Controller
 *
 * @property \App\Model\Table\FacultyTable $Faculty
 */
class FacultyController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
      //  $faculty = $this->paginate($this->Faculty);
		
		
		//Custom --sush
	
	 $query = $this->Faculty
            // Use the plugins 'search' custom finder and pass in the
            // processed query params
            ->find('search', $this->Faculty->filterParams($this->request->query));
            

        $this->set('faculty', $this->paginate($query));
		
		//end --sush

      //  $this->set(compact('faculty'));
        //$this->set('_serialize', ['faculty']);
    }

    /**
     * View method
     *
     * @param string|null $id Faculty id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $faculty = $this->Faculty->get($id, [
            'contain' => []
        ]);

        $this->set('faculty', $faculty);
        $this->set('_serialize', ['faculty']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faculty = $this->Faculty->newEntity();
        if ($this->request->is('post')) {
            $faculty = $this->Faculty->patchEntity($faculty, $this->request->data);
            if ($this->Faculty->save($faculty)) {
                $this->Flash->success(__('The faculty has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The faculty could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('faculty'));
        $this->set('_serialize', ['faculty']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Faculty id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $faculty = $this->Faculty->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faculty = $this->Faculty->patchEntity($faculty, $this->request->data);
            if ($this->Faculty->save($faculty)) {
                $this->Flash->success(__('The faculty has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The faculty could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('faculty'));
        $this->set('_serialize', ['faculty']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Faculty id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faculty = $this->Faculty->get($id);
        if ($this->Faculty->delete($faculty)) {
            $this->Flash->success(__('The faculty has been deleted.'));
        } else {
            $this->Flash->error(__('The faculty could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	//Custom --sush
	public function initialize()
    {
       parent::initialize();

       
	 $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
	}
	//end
}
