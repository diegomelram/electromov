<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Paymethods Controller
 *
 * @property \App\Model\Table\PaymethodsTable $Paymethods
 */
class PaymethodsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Paymethods->find()
            ->contain(['Users']);
        $paymethods = $this->paginate($query);

        $this->set(compact('paymethods'));
    }

    /**
     * View method
     *
     * @param string|null $id Paymethod id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymethod = $this->Paymethods->get($id, contain: ['Users', 'Trips']);
        $this->set(compact('paymethod'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymethod = $this->Paymethods->newEmptyEntity();
        if ($this->request->is('post')) {
            $paymethod = $this->Paymethods->patchEntity($paymethod, $this->request->getData());
            if ($this->Paymethods->save($paymethod)) {
                $this->Flash->success(__('The paymethod has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paymethod could not be saved. Please, try again.'));
        }
        $users = $this->Paymethods->Users->find('list', limit: 200)->all();
        $this->set(compact('paymethod', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paymethod id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymethod = $this->Paymethods->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymethod = $this->Paymethods->patchEntity($paymethod, $this->request->getData());
            if ($this->Paymethods->save($paymethod)) {
                $this->Flash->success(__('The paymethod has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paymethod could not be saved. Please, try again.'));
        }
        $users = $this->Paymethods->Users->find('list', limit: 200)->all();
        $this->set(compact('paymethod', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paymethod id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymethod = $this->Paymethods->get($id);
        if ($this->Paymethods->delete($paymethod)) {
            $this->Flash->success(__('The paymethod has been deleted.'));
        } else {
            $this->Flash->error(__('The paymethod could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
