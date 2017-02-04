<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TagsSubscribers Controller
 *
 * @property \App\Model\Table\TagsSubscribersTable $TagsSubscribers
 */
class TagsSubscribersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tags', 'Subscribers']
        ];
        $tagsSubscribers = $this->paginate($this->TagsSubscribers);

        $this->set(compact('tagsSubscribers'));
        $this->set('_serialize', ['tagsSubscribers']);
    }

    /**
     * View method
     *
     * @param string|null $id Tags Subscriber id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tagsSubscriber = $this->TagsSubscribers->get($id, [
            'contain' => ['Tags', 'Subscribers']
        ]);

        $this->set('tagsSubscriber', $tagsSubscriber);
        $this->set('_serialize', ['tagsSubscriber']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tagsSubscriber = $this->TagsSubscribers->newEntity();
        if ($this->request->is('post')) {
            $tagsSubscriber = $this->TagsSubscribers->patchEntity($tagsSubscriber, $this->request->data);
            if ($this->TagsSubscribers->save($tagsSubscriber)) {
                $this->Flash->success(__('The tags subscriber has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags subscriber could not be saved. Please, try again.'));
        }
        $tags = $this->TagsSubscribers->Tags->find('list', ['limit' => 200]);
        $subscribers = $this->TagsSubscribers->Subscribers->find('list', ['limit' => 200]);
        $this->set(compact('tagsSubscriber', 'tags', 'subscribers'));
        $this->set('_serialize', ['tagsSubscriber']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tags Subscriber id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tagsSubscriber = $this->TagsSubscribers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tagsSubscriber = $this->TagsSubscribers->patchEntity($tagsSubscriber, $this->request->data);
            if ($this->TagsSubscribers->save($tagsSubscriber)) {
                $this->Flash->success(__('The tags subscriber has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags subscriber could not be saved. Please, try again.'));
        }
        $tags = $this->TagsSubscribers->Tags->find('list', ['limit' => 200]);
        $subscribers = $this->TagsSubscribers->Subscribers->find('list', ['limit' => 200]);
        $this->set(compact('tagsSubscriber', 'tags', 'subscribers'));
        $this->set('_serialize', ['tagsSubscriber']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tags Subscriber id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tagsSubscriber = $this->TagsSubscribers->get($id);
        if ($this->TagsSubscribers->delete($tagsSubscriber)) {
            $this->Flash->success(__('The tags subscriber has been deleted.'));
        } else {
            $this->Flash->error(__('The tags subscriber could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
