<?php
declare(strict_types=1);
/**
 * UsersController
 *
 * Copyright (c) 2019 UK Web Media Ltd.
 * @package App\Controller
 * @author David Yell <dyell@ukwebmedia.com>
 *
 */

namespace App\Controller;

/**
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Build the controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->Auth->allow(['register']);
    }

    /**
     * Log a user in
     *
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        if ($this->getRequest()->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
        }
    }

    /**
     * Log the user out
     *
     * @return string
     */
    public function logout()
    {
        $this->getRequest()->getSession()->destroy();

        return $this->redirect($this->Auth->logout());
    }

    /**
     * Register a user
     *
     * @return \Cake\Http\Response|null
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->getRequest()->is('post')) {
            $user = $this->Users->patchEntity($user, $this->getRequest()->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success('Thanks for registering, please login');

                return $this->redirect(['controller' => 'Questions', 'action' => 'index']);
            }

            $this->Flash->error('Sorry we could not register your account');
        }

        $this->set('user', $user);
    }
}
