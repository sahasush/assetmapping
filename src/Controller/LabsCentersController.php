<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LabsCenters Controller
 *
 * @property \App\Model\Table\LabsCentersTable $LabsCenters
 */
class LabsCentersController extends AppController
{


//Custom start




//end
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
	
	
    {
       // $labsCenters = $this->paginate($this->LabsCenters);
	   $this->loadModel("LabsCenters");
	  		
		$query = $this->LabsCenters->find('all');
		
		
          

        $this->set('labsCenters', $this->paginate($query));
		
		
       // $this->set(compact('labsCenters'));
       // $this->set('_serialize', ['labsCenters']);
    }

    /**
     * View method
     *
     * @param string|null $id Labs Center id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
	
		
		$this->loadModel("LabsCenters");
		//$labsCenter = $this->LabsCenters->get($id, [
         // 'contain' => []
        //]);

		
	
		
		
	//Custom start
	
	$labsCenter = $this->LabsCenters->find()->where(['Labs_Centers_ID'=>$id])->contain('faculty')->first();
	
	//end
		$this->set('labsCenter', $labsCenter);
        $this->set('_serialize', ['labsCenter']);
	
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
    	$this->loadModel("LabsCenters");
    	$labsCenter = $this->LabsCenters->newEntity();
        if ($this->request->is('post')) {
            $labsCenter = $this->LabsCenters->patchEntity($labsCenter, $this->request->data);
            if ($this->LabsCenters->save($labsCenter)) {
                $this->Flash->success(__('The labs center has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The labs center could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('labsCenter'));
        $this->set('_serialize', ['labsCenter']);
		
		
    }

    /**
     * Edit method
     *
     * @param string|null $id Labs Center id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labsCenter = $this->LabsCenters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labsCenter = $this->LabsCenters->patchEntity($labsCenter, $this->request->data);
            if ($this->LabsCenters->save($labsCenter)) {
                $this->Flash->success(__('The labs center has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The labs center could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('labsCenter'));
        $this->set('_serialize', ['labsCenter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Labs Center id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labsCenter = $this->LabsCenters->get($id);
        if ($this->LabsCenters->delete($labsCenter)) {
            $this->Flash->success(__('The labs center has been deleted.'));
        } else {
            $this->Flash->error(__('The labs center could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
