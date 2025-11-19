<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * App Controller for the Admin prefix
 *
 * Add your common administrative controller logic in here.
 */
class AppController extends AppController
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        
        // You can load admin-specific components here, like Authorization.
        // For example:
        $this->loadComponent('Authentication.Authentication');
    }
}