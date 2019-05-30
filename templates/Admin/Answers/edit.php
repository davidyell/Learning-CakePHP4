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
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $answer->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $answer->id), 'class' => 'list-group-item list-group-item-action']
                ) ?>
                <?= $this->Html->link(__('List Answers'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
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
        <div class="answers form columns content">
            <?= $this->Form->create($answer) ?>
            <fieldset>
                <legend><?= __('Edit Answer') ?></legend>
                <?php
                echo $this->Form->control('question_id', ['options' => $questions, 'class' => 'form-control']);
                echo $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control']);
                echo $this->Form->control('answer');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


