<div class="container">
    <div class="row pb-3 pt-3">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <?= $this->Html->link(
                    'Questions',
                    ['controller' => 'Questions', 'action' => 'index', 'prefix' => 'Admin'],
                    ['class' => $this->getRequest()->getParam('controller') === 'Questions' ? 'nav-link active' : 'nav-link']
                );?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    'Answers',
                    ['controller' => 'Answers', 'action' => 'index', 'prefix' => 'Admin'],
                    ['class' => $this->getRequest()->getParam('controller') === 'Answers' ? 'nav-link active' : 'nav-link']
                );?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    'Comments',
                    ['controller' => 'Comments', 'action' => 'index', 'prefix' => 'Admin'],
                    ['class' => $this->getRequest()->getParam('controller') === 'Comments' ? 'nav-link active' : 'nav-link']
                );?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    'Users',
                    ['controller' => 'Users', 'action' => 'index', 'prefix' => 'Admin'],
                    ['class' => $this->getRequest()->getParam('controller') === 'Users' ? 'nav-link active' : 'nav-link']
                );?>
            </li>
        </ul>
    </div>
</div>
