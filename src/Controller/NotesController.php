<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notes Controller
 *
 * @property \App\Model\Table\NotesTable $Notes
 */
class NotesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Publishers', 'Tags']
        ];
        $notes = $this->paginate($this->Notes);

        $this->set(compact('notes'));
        $this->set('_serialize', ['notes']);
    }

    /**
     * View method
     *
     * @param string|null $id Note id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $note = $this->Notes->get($id, [
            'contain' => ['Publishers', 'Tags']
        ]);

        $this->set('note', $note);
        $this->set('_serialize', ['note']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $note = $this->Notes->newEntity();
        if ($this->request->is('post')) {
            $note = $this->Notes->patchEntity($note, $this->request->data);
            if ($this->Notes->save($note)) {
                //$this->Flash->success(__('The note has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The note could not be saved. Please, try again.'));
        }
        $publishers = $this->Notes->Publishers->find('list', ['limit' => 200]);
        $tags = $this->Notes->Tags->find('list', ['limit' => 200]);
        $this->set(compact('note', 'publishers', 'tags'));
        $this->set('_serialize', ['note']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Note id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $note = $this->Notes->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $note = $this->Notes->patchEntity($note, $this->request->data);
            if ($this->Notes->save($note)) {
                //$this->Flash->success(__('The note has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The note could not be saved. Please, try again.'));
        }
        $publishers = $this->Notes->Publishers->find('list', ['limit' => 200]);
        $tags = $this->Notes->Tags->find('list', ['limit' => 200]);
        $this->set(compact('note', 'publishers', 'tags'));
        $this->set('_serialize', ['note']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Note id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $note = $this->Notes->get($id);
        if ($this->Notes->delete($note)) {
            //$this->Flash->success(__('The note has been deleted.'));
        } else {
            //$this->Flash->error(__('The note could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
