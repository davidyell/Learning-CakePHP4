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
                                <?= $this->Html->link(__('List Comments'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
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
        <div class="comments form columns content">
            <?= $this->Form->create($comment) ?>
            <fieldset>
                <legend><?= __('Add Comment') ?></legend>
                <?php
                        echo $this->Form->control('comment');
                    echo $this->Form->control('user_id', ['options' => $users]);
                        echo $this->Form->control('table_name');
                    echo $this->Form->control('primary_key', ['options' => $answers]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


