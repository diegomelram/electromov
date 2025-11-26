<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
         // Add this line to check authentication result and lock your site
        $this->loadComponent('Authentication.Authentication');

        // Allow public access to the index action of the PagesController (for the homepage)
        // and potentially other actions like register/login in your UsersController.
        // Replace 'display' and 'add' with the actual actions you want public.
        $this->Authentication->allowUnauthenticated(['display']);

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // 1. ADMIN Prefix Check
        if ($this->request->getParam('prefix') === 'Admin') {
            $this->viewBuilder()->setLayout('admin');
            return; 
        }

        // Get the authenticated Identity (user object).
        $identity = $this->request->getAttribute('identity');

        // 2. CLIENT Layout Default Check
        if ($identity && $identity->getOriginalData()->admin === NULL) {
            $this->viewBuilder()->setLayout('default'); // Default (Client) Layout
            return;
        }
        
        // 3. Fallback (Public/Unauthenticated)
        $this->viewBuilder()->setLayout('public'); // Public Layout
    }

}
