<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController as BaseAppController;

class AppController extends BaseAppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->viewBuilder()->setLayout('admin');

        $this->Trips = $this->fetchTable('Trips');
        $this->Vehicles = $this->fetchTable('Vehicles');
        $this->Stations = $this->fetchTable('Stations');

        $this->loadComponent('Authentication.Authentication');

    }
}
