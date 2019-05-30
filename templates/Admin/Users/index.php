<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <div class="col-md-2">
        <nav id="actions-sidebar">
            <h4>Actions</h4>
            <div class="list-group">
                <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                        <?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Tagged'), ['controller' => 'Tagged', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Tagged'), ['controller' => 'Tagged', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                    </div>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="users index large-9 medium-8 columns content">
            <h3><?= __('Users') ?></h3>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                <tr>
                                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('email_address') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                                                                                                                                                                                    <td><?= $this->Number->format($user->id) ?></td>
                                                                                                                                                                                                                                        <td><?= h($user->username) ?></td>
                                                                                                                                                                                                                                        <td><?= h($user->email_address) ?></td>
                                                                                                                                                                                                                                        <td><?= h($user->is_active) ?></td>
                                                                                                                                                                                                                                        <td><?= h($user->created) ?></td>
                                                                                                                                                                                                                                        <td><?= h($user->modified) ?></td>
                                                                                                                <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
            </div>
        </div>
    </div>
</div>
