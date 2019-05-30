<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>

<div class="row">
    <div class="col-md-2">
        <nav class="columns" id="actions-sidebar">
            <h4>Actions</h4>
            <div class="list-group">
                <?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('List Comments'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('New Comment'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                            <?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                            <?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
                                                                                                                                                                                                                </div>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="comments view content">
            <h3><?= h($comment->comment) ?></h3>
            <table class="table table-striped">
                                                                                                                    <tr>
                                <th scope="row"><?= __('User') ?></th>
                                <td><?= $comment->has('user') ? $this->Html->link($comment->user->username, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?></td>
                            </tr>
                                                                                                <tr>
                                <th scope="row"><?= __('Table Name') ?></th>
                                <td><?= h($comment->table_name) ?></td>
                            </tr>
                                                                                                                            <tr>
                                <th scope="row"><?= __('Question') ?></th>
                                <td><?= $comment->has('question') ? $this->Html->link($comment->question->title, ['controller' => 'Questions', 'action' => 'view', $comment->question->id]) : '' ?></td>
                            </tr>
                                                                                                                                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($comment->id) ?></td>
                        </tr>
                                                                                                <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($comment->created) ?></td>
                        </tr>
                                            <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($comment->modified) ?></td>
                        </tr>
                                                                </table>
                                                <div class="row">
                        <h4><?= __('Comment') ?></h4>
                        <?= $this->Text->autoParagraph(h($comment->comment)); ?>
                    </div>
                                                            </div>
    </div>
</div>
