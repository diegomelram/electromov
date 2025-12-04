<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Stations Controller
 *
 * @property \App\Model\Table\StationsTable $Stations
 */
class StationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Stations->find();
        $stations = $this->paginate($query);
        $stationsTable = $this->fetchTable('Stations');
        $stationsData = $stationsTable->find()->select(['id','name', 'latitude', 'longitude'])->all();
        // 2. Fetch Available Vehicles (Vehicles currently associated with a station)
        $vehiclesTable = $this->fetchTable('Vehicles');
        $availableVehicles = $vehiclesTable->find()
            ->select(['id', 'model_id', 'battery_level', 'current_station_id'])
            ->where(['status' => 'disponible']) // Only show vehicles ready to rent
            ->all();

        $this->set(compact('stations','stationsData','availableVehicles'));  
    }

    /**
     * View method
     *
     * @param string|null $id Station id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $station = $this->Stations->get($id, contain: ['Vehicles']);
        $this->set(compact('station'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $station = $this->Stations->newEmptyEntity();
        if ($this->request->is('post')) {
            $station = $this->Stations->patchEntity($station, $this->request->getData());
            if ($this->Stations->save($station)) {
                $this->Flash->success(__('The station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The station could not be saved. Please, try again.'));
        }
        $this->set(compact('station'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Station id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $station = $this->Stations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $station = $this->Stations->patchEntity($station, $this->request->getData());
            if ($this->Stations->save($station)) {
                $this->Flash->success(__('The station has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The station could not be saved. Please, try again.'));
        }
        $this->set(compact('station'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Station id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $station = $this->Stations->get($id);
        if ($this->Stations->delete($station)) {
            $this->Flash->success(__('The station has been deleted.'));
        } else {
            $this->Flash->error(__('The station could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
