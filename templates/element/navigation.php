<?php
/* @var $this \Cake\View\View */

$prefix = $this->getRequest()->getParam('prefix');
?>
<div class="container">
    <ul class="nav justify-content-center nav-pills mt-3 mb-3">
        <li class="nav-item">
            <?= $this->Html->link(
                'Questions',
                ['controller' => 'Questions', 'action' => 'index', 'prefix' => false],
                [
                    'class' => $this->getRequest()->getParam('controller') === 'Questions'
                    &&  in_array($this->getRequest()->getParam('action'), ['index', 'view']) ? 'nav-link active' : 'nav-link'
                ]
            );?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link(
                'Ask',
                ['controller' => 'Questions', 'action' => 'add', 'prefix' => false],
                [
                    'class' => $this->getRequest()->getParam('controller') === 'Questions'
                    && $this->getRequest()->getParam('action') === 'add' ? 'nav-link active' : 'nav-link'
                ]
            );?>
        </li>

        <?php if (!$this->getRequest()->getSession()->check('Auth')): ?>
            <li class="nav-item">
                <?= $this->Html->link(
                    'Register',
                    ['controller' => 'Users', 'action' => 'register'],
                    ['class' => $this->getRequest()->getParam('action') === 'register' ? 'nav-link active' : 'nav-link']
                );?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    'Login',
                    ['controller' => 'Users', 'action' => 'login'],
                    ['class' => $this->getRequest()->getParam('action') === 'login' ? 'nav-link active' : 'nav-link']
                );?>
            </li>
        <?php else: // User is logged in ?>
            <li class="nav-item">
                <?= $this->Html->link(
                    'My profile',
                    ['controller' => 'Users', 'action' => 'profile', 'prefix' => false],
                    [
                        'class' => $this->getRequest()->getParam('controller') === 'Users'
                        && $this->getRequest()->getParam('action') === 'profile' ? 'nav-link active' : 'nav-link'
                    ]
                );?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    'Administration',
                    ['controller' => 'Questions', 'action' => 'index', 'prefix' => 'Admin'],
                    ['class' => $this->getRequest()->getParam('prefix') === 'Admin' ? 'nav-link active' : 'nav-link']
                )?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    'Logout ' . $this->getRequest()->getSession()->read('Auth.User.username'),
                    ['controller' => 'Users', 'action' => 'logout', 'prefix' => false],
                    ['class' => 'nav-link']
                );?>
            </li>
        <?php endif; ?>
    </ul>
</div>
