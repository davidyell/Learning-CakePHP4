<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>


<div class="row">
    <div class="col-md-2">
        <nav class="columns" id="actions-sidebar">
            <h4>Actions</h4>
            <div class="list-group">
                                    <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $question->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $question->id), 'class' => 'list-group-item list-group-item-action']
                        ) ?>
                                <?= $this->Html->link(__('List Questions'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
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
        <div class="questions form columns content">
            <?= $this->Form->create($question) ?>
            <fieldset>
                <legend><?= __('Edit Question') ?></legend>
                <?php
                        echo $this->Form->control('title');
                        echo $this->Form->control('question');
                        echo $this->Form->control('slug');
                        echo $this->Form->control('answer_count');
                    echo $this->Form->control('user_id', ['options' => $users]);
                        echo $this->Form->control('view_count');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


