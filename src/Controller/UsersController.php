<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\ORM\Query;

/**
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Build the controller
     *
     * @return void
     * @throws \Exception If a component cannot be loaded
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
    public function logout(): string
    {
        $this->getRequest()->getSession()->destroy();
        return $this->Auth->logout();
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

    /**
     * View the currently logged in users profile
     *
     * @return void
     */
    public function profile()
    {
        $user = $this->Users->find()
            ->contain([
                'Questions' => function (Query $query) {
                    return $query
                        ->order(['modified' => 'desc'])
                        ->limit(5);
                },
                'Answers' => function (Query $query) {
                    return $query
                        ->contain('Questions')
                        ->order(['Answers.modified' => 'desc'])
                        ->limit(5);
                },
                'Comments' => function (Query $query) {
                    return $query
                        ->contain([
                            'Questions',
                            'Answers' => [
                                'Questions'
                            ]
                        ])
                        ->order(['Comments.modified' => 'desc'])
                        ->limit(5);
                }
            ])
            ->where(['Users.id' => $this->getRequest()->getSession()->read('Auth.User.id')])
            ->first();

        $this->set('user', $user);
    }
}
