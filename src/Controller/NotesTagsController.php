<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NotesTags Controller
 *
 * @property \App\Model\Table\NotesTagsTable $NotesTags
 */
class NotesTagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tags', 'Notes']
        ];
        $notesTags = $this->paginate($this->NotesTags);

        $this->set(compact('notesTags'));
        $this->set('_serialize', ['notesTags']);
    }

    /**
     * View method
     *
     * @param string|null $id Notes Tag id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notesTag = $this->NotesTags->get($id, [
            'contain' => ['Tags', 'Notes']
        ]);

        $this->set('notesTag', $notesTag);
        $this->set('_serialize', ['notesTag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notesTag = $this->NotesTags->newEntity();
        if ($this->request->is('post')) {
            $notesTag = $this->NotesTags->patchEntity($notesTag, $this->request->data);
            if ($this->NotesTags->save($notesTag)) {
                $this->Flash->success(__('The notes tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notes tag could not be saved. Please, try again.'));
        }
        $tags = $this->NotesTags->Tags->find('list', ['limit' => 200]);
        $notes = $this->NotesTags->Notes->find('list', ['limit' => 200]);
        $this->set(compact('notesTag', 'tags', 'notes'));
        $this->set('_serialize', ['notesTag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notes Tag id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notesTag = $this->NotesTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notesTag = $this->NotesTags->patchEntity($notesTag, $this->request->data);
            if ($this->NotesTags->save($notesTag)) {
                $this->Flash->success(__('The notes tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notes tag could not be saved. Please, try again.'));
        }
        $tags = $this->NotesTags->Tags->find('list', ['limit' => 200]);
        $notes = $this->NotesTags->Notes->find('list', ['limit' => 200]);
        $this->set(compact('notesTag', 'tags', 'notes'));
        $this->set('_serialize', ['notesTag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notes Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notesTag = $this->NotesTags->get($id);
        if ($this->NotesTags->delete($notesTag)) {
            $this->Flash->success(__('The notes tag has been deleted.'));
        } else {
            $this->Flash->error(__('The notes tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
