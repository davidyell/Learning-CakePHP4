<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>
<div class="row">
    <div class="col-md-2">
        <nav id="actions-sidebar">
            <h4>Actions</h4>
            <div class="list-group">
                <?= $this->Html->link(__('New Question'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                                                                <?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Tagged'), ['controller' => 'Tagged', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Tagged'), ['controller' => 'Tagged', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                    </div>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="questions index large-9 medium-8 columns content">
            <h3><?= __('Questions') ?></h3>
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                <tr>
                                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('answer_count') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                            <th scope="col"><?= $this->Paginator->sort('view_count') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($questions as $question): ?>
                <tr>
                                                                                                                                                                                                                                        <td><?= $this->Number->format($question->id) ?></td>
                                                                                                                                                                                                                                                                                            <td><?= h($question->title) ?></td>
                                                                                                                                                                                                                                                                                            <td><?= h($question->slug) ?></td>
                                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($question->answer_count) ?></td>
                                                                                                                                                                                                                    <td><?= $question->has('user') ? $this->Html->link($question->user->username, ['controller' => 'Users', 'action' => 'view', $question->user->id]) : '' ?></td>
                                                                                                                                                                                                                                                                                                                    <td><?= h($question->created) ?></td>
                                                                                                                                                                                                                                                                                            <td><?= h($question->modified) ?></td>
                                                                                                                                                                                                                                                                                            <td><?= $this->Number->format($question->view_count) ?></td>
                                                                                                                <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $question->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
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
