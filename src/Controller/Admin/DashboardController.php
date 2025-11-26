<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class DashboardController extends AppController
{
    public function index()
    {
        $this->Trips;
        $this->Vehicles;
        $this->Stations;

        // 1. Vehículos rentados hoy
        $today = date('Y-m-d');

        $vehiclesRentedToday = $this->Trips->find()
            ->where([
                'Trips.start_time >=' => $today . ' 00:00:00',
                'Trips.start_time <=' => $today . ' 23:59:59'
            ])
            ->count();

        // 2. Ingresos del mes
        $monthStart = date('Y-m-01');
        $monthEnd = date('Y-m-t');

        $totalIncomeMonth = $this->Trips->find()
            ->select(['total' => 'SUM(Trips.total_cost)'])
            ->where([
                'Trips.end_time >=' => $monthStart,
                'Trips.end_time <=' => $monthEnd
            ])
            ->first()
            ->total ?? 0;

        // === NUEVO: Ingresos diarios del mes (para Chart.js) ===
        $dailyIncome = $this->Trips->find()
            ->select([
                'day' => 'DATE(Trips.end_time)',
                'total' => 'SUM(Trips.total_cost)'
            ])
            ->where([
                'Trips.end_time >=' => $monthStart,
                'Trips.end_time <=' => $monthEnd
            ])
            ->group('DATE(Trips.end_time)')
            ->order('DATE(Trips.end_time)')
            ->toArray();

        $incomeLabels = [];
        $incomeValues = [];

        foreach ($dailyIncome as $row) {
            $incomeLabels[] = $row->day;
            $incomeValues[] = (float)$row->total;
        }

        // 3. Ocupación de estaciones
        $totalStations = $this->Stations->find()->count();

        $stationsWithVehicles = $this->Vehicles->find()
            ->where(['Vehicles.status' => 'disponible'])
            ->group('Vehicles.current_station_id')
            ->count();

        $stationOccupancy = $totalStations > 0
            ? round(($stationsWithVehicles / $totalStations) * 100)
            : 0;

        // 4. Vehículos disponibles
        $vehiclesAvailable = $this->Vehicles->find()
            ->where(['Vehicles.status' => 'disponible'])
            ->count();

        // 5. Vehículos en uso
        $vehiclesInUse = $this->Vehicles->find()
            ->where(['Vehicles.status' => 'en_uso'])
            ->count();

        // 6. Todos los vehículos
        $vehicles = $this->Vehicles->find()
            ->contain(['Models'])
            ->all();

        // 7. Todas las estaciones
        $stations = $this->Stations->find()->all();

        $this->set(compact(
            'vehiclesRentedToday',
            'totalIncomeMonth',
            'stationOccupancy',
            'vehiclesAvailable',
            'vehiclesInUse',
            'vehicles',
            'stations',
            'incomeLabels',   
            'incomeValues'    
        ));
    }
}
