<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Trips Controller
 *
 * @property \App\Model\Table\TripsTable $Trips
 */
class TripsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Trips->find()
            ->contain(['Users', 'Vehicles', 'Paymethods', 'Promotions']);
        $trips = $this->paginate($query);

        $this->set(compact('trips'));
    }

    /**
     * View method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trip = $this->Trips->get($id, contain: ['Users', 'Vehicles', 'Paymethods', 'Promotions']);
        $this->set(compact('trip'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trip = $this->Trips->newEmptyEntity();
        if ($this->request->is('post')) {
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }
        $users = $this->Trips->Users->find('list', limit: 200)->all();
        $vehicles = $this->Trips->Vehicles->find('list', limit: 200)->all();
        $paymethods = $this->Trips->Paymethods->find('list', limit: 200)->all();
        $promotions = $this->Trips->Promotions->find('list', limit: 200)->all();
        $this->set(compact('trip', 'users', 'vehicles', 'paymethods', 'promotions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trip = $this->Trips->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }
        $users = $this->Trips->Users->find('list', limit: 200)->all();
        $vehicles = $this->Trips->Vehicles->find('list', limit: 200)->all();
        $paymethods = $this->Trips->Paymethods->find('list', limit: 200)->all();
        $promotions = $this->Trips->Promotions->find('list', limit: 200)->all();
        $this->set(compact('trip', 'users', 'vehicles', 'paymethods', 'promotions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
