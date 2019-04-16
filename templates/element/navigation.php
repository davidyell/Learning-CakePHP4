<?php
/* @var $this \Cake\View\View */
?>
<div class="container">
    <ul class="nav justify-content-center nav-pills mt-3 mb-3">
        <li class="nav-item">
            <?= $this->Html->link(
                'Questions',
                ['controller' => 'Questions', 'action' => 'index'],
                [
                    'class' => $this->getRequest()->getParam('controller') === 'Questions'
                    && $this->getRequest()->getParam('action') === 'index' ? 'nav-link active' : 'nav-link'
                ]
            );?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link(
                'Ask',
                ['controller' => 'Questions', 'action' => 'add'],
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
        <?php else: ?>
            <li class="nav-item">
                <?= $this->Html->link(
                    'Logout ' . $this->getRequest()->getSession()->read('Auth.User.username'),
                    ['controller' => 'Users', 'action' => 'logout'],
                    ['class' => 'nav-link']
                );?>
            </li>
        <?php endif; ?>
    </ul>
</div>
