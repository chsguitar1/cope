<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'loginRedirect' => [
                'controller' => 'Projetos',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
            ,
            'unauthorizedRedirect' => '/projetos/redirecionar'
        ]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event) {



        $this->loadModel('Users');
        $userId = $this->Auth->user('id');

        if (isset($userId)) {
            $user = $this->Users->get($userId, ['contain' => ['RoleUsers', 'Pessoas']]);

            $roles = array();

            foreach ($user['role_users'] as $r) {
                //array_push($roles, $r, $user)
                $roles[$r['role']] = \App\Model\Entity\User::escoposUsersToStr($r['role']);
            }

            $role_padrao = $this->request->session()->read('role');

//            die(print_r($user->role_users));
//            die(print_r($this->Auth->user()));
//            die(print_r($role_padrao));
//            die('role_padrao'.$role_padrao);
            $this->set('role_padrao', $role_padrao['role']);
            $this->set('roles', $roles);
            $this->set('user', $user);
        }
    }

    public function isAuthorized($user) {
        $role = $this->request->session()->read('role');

        if ($role['role'] == \App\Model\Entity\User::ROLE_ADMIN) {
//            die('YES');
            return true;
        }
      //  $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        $this->Flash->error(__('Acesso negado!'));
        
        return false;
    }

}
