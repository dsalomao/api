<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subscribers Controller
 *
 * @property \App\Model\Table\SubscribersTable $Subscribers
 */
class SubscribersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate['contain'] = [
                'Tags' => ['Notes']
        ];
        $subscribers = $this->paginate($this->Subscribers);

        $this->set(compact('subscribers'));
        $this->set('_serialize', ['subscribers']);
    }

    /**
     * View method
     *
     * @param string|null $id Subscriber id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subscriber = $this->Subscribers->get($id, [
            'contain' => ['Tags' => ['Notes']]
        ]);

        $this->set('subscriber', $subscriber);
        $this->set('_serialize', ['subscriber']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subscriber = $this->Subscribers->newEntity();
        if ($this->request->is('post')) {
            $subscriber = $this->Subscribers->patchEntity($subscriber, $this->request->data);
            if ($this->Subscribers->save($subscriber)) {
                //$this->Flash->success();
            }
            //$this->Flash->error();
        }
        $tags = $this->Subscribers->Tags->find('list', ['limit' => 200]);
        $this->set(compact('subscriber', 'tags'));
        $this->set('_serialize', ['subscriber']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subscriber id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subscriber = $this->Subscribers->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subscriber = $this->Subscribers->patchEntity($subscriber, $this->request->data);
            if ($this->Subscribers->save($subscriber)) {
                //$this->Flash->success(__('The subscriber has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The subscriber could not be saved. Please, try again.'));
        }
        $tags = $this->Subscribers->Tags->find('list', ['limit' => 200]);
        $this->set(compact('subscriber', 'tags'));
        $this->set('_serialize', ['subscriber']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subscriber id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subscriber = $this->Subscribers->get($id);
        if ($this->Subscribers->delete($subscriber)) {
            //$this->Flash->success(__('The subscriber has been deleted.'));
        } else {
            //$this->Flash->error(__('The subscriber could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
