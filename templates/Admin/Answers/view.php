<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Answer $answer
 */
?>

<div class="row">
    <div class="col-md-2">
        <nav class="columns" id="actions-sidebar">
            <h4>Actions</h4>
            <div class="list-group">
                <?= $this->Html->link(__('Edit Answer'), ['action' => 'edit', $answer->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Delete Answer'), ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id), 'class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('List Answers'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('New Answer'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                        <?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                                                                                                    <?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                                        </div>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="answers view content">
            <h3><?= h($answer->answer) ?></h3>
            <table class="table table-striped">
                                                                                                                    <tr>
                                <th scope="row"><?= __('Question') ?></th>
                                <td><?= $answer->has('question') ? $this->Html->link($answer->question->title, ['controller' => 'Questions', 'action' => 'view', $answer->question->id]) : '' ?></td>
                            </tr>
                                                                                                                            <tr>
                                <th scope="row"><?= __('User') ?></th>
                                <td><?= $answer->has('user') ? $this->Html->link($answer->user->username, ['controller' => 'Users', 'action' => 'view', $answer->user->id]) : '' ?></td>
                            </tr>
                                                                                                                                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($answer->id) ?></td>
                        </tr>
                                                                                                <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($answer->created) ?></td>
                        </tr>
                                            <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($answer->modified) ?></td>
                        </tr>
                                                                </table>
                                                <div class="row">
                        <h4><?= __('Answer') ?></h4>
                        <?= $this->Text->autoParagraph(h($answer->answer)); ?>
                    </div>
                                                                                                    <div class="related">
                    <h4><?= __('Related Comments') ?></h4>
                    <?php if (!empty($answer->comments)): ?>
                    <table cellpadding="0" cellspacing="0" class="table table-condensed">
                        <tr>
                                                            <th scope="col"><?= __('Id') ?></th>
                                                            <th scope="col"><?= __('Comment') ?></th>
                                                            <th scope="col"><?= __('User Id') ?></th>
                                                            <th scope="col"><?= __('Table Name') ?></th>
                                                            <th scope="col"><?= __('Primary Key') ?></th>
                                                            <th scope="col"><?= __('Created') ?></th>
                                                            <th scope="col"><?= __('Modified') ?></th>
                                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($answer->comments as $comments): ?>
                        <tr>
                                                            <td><?= h($comments->id) ?></td>
                                                            <td><?= h($comments->comment) ?></td>
                                                            <td><?= h($comments->user_id) ?></td>
                                                            <td><?= h($comments->table_name) ?></td>
                                                            <td><?= h($comments->primary_key) ?></td>
                                                            <td><?= h($comments->created) ?></td>
                                                            <td><?= h($comments->modified) ?></td>
                                                                                    <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                                                            <div class="related">
                    <h4><?= __('Related Votes') ?></h4>
                    <?php if (!empty($answer->votes)): ?>
                    <table cellpadding="0" cellspacing="0" class="table table-condensed">
                        <tr>
                                                            <th scope="col"><?= __('Id') ?></th>
                                                            <th scope="col"><?= __('Table Name') ?></th>
                                                            <th scope="col"><?= __('Primary Key') ?></th>
                                                            <th scope="col"><?= __('User Id') ?></th>
                                                            <th scope="col"><?= __('Vote') ?></th>
                                                            <th scope="col"><?= __('Created') ?></th>
                                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($answer->votes as $votes): ?>
                        <tr>
                                                            <td><?= h($votes->id) ?></td>
                                                            <td><?= h($votes->table_name) ?></td>
                                                            <td><?= h($votes->primary_key) ?></td>
                                                            <td><?= h($votes->user_id) ?></td>
                                                            <td><?= h($votes->vote) ?></td>
                                                            <td><?= h($votes->created) ?></td>
                                                                                    <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Votes', 'action' => 'view', $votes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Votes', 'action' => 'edit', $votes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Votes', 'action' => 'delete', $votes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $votes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                    </div>
    </div>
</div>
