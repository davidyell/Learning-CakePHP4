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
                <?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id), 'class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('List Questions'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
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
        <div class="questions view content">
            <h3><?= h($question->title) ?></h3>
            <table class="table table-striped">
                                                                                        <tr>
                                <th scope="row"><?= __('Title') ?></th>
                                <td><?= h($question->title) ?></td>
                            </tr>
                                                                                                <tr>
                                <th scope="row"><?= __('Slug') ?></th>
                                <td><?= h($question->slug) ?></td>
                            </tr>
                                                                                                                            <tr>
                                <th scope="row"><?= __('User') ?></th>
                                <td><?= $question->has('user') ? $this->Html->link($question->user->username, ['controller' => 'Users', 'action' => 'view', $question->user->id]) : '' ?></td>
                            </tr>
                                                                                                                                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($question->id) ?></td>
                        </tr>
                                            <tr>
                            <th scope="row"><?= __('Answer Count') ?></th>
                            <td><?= $this->Number->format($question->answer_count) ?></td>
                        </tr>
                                            <tr>
                            <th scope="row"><?= __('View Count') ?></th>
                            <td><?= $this->Number->format($question->view_count) ?></td>
                        </tr>
                                                                                                <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($question->created) ?></td>
                        </tr>
                                            <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($question->modified) ?></td>
                        </tr>
                                                                </table>
                                                <div class="row">
                        <h4><?= __('Question') ?></h4>
                        <?= $this->Text->autoParagraph(h($question->question)); ?>
                    </div>
                                                                                                    <div class="related">
                    <h4><?= __('Related Comments') ?></h4>
                    <?php if (!empty($question->comments)): ?>
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
                        <?php foreach ($question->comments as $comments): ?>
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
                    <?php if (!empty($question->votes)): ?>
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
                        <?php foreach ($question->votes as $votes): ?>
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
                                                            <div class="related">
                    <h4><?= __('Related Answers') ?></h4>
                    <?php if (!empty($question->answers)): ?>
                    <table cellpadding="0" cellspacing="0" class="table table-condensed">
                        <tr>
                                                            <th scope="col"><?= __('Id') ?></th>
                                                            <th scope="col"><?= __('Question Id') ?></th>
                                                            <th scope="col"><?= __('User Id') ?></th>
                                                            <th scope="col"><?= __('Answer') ?></th>
                                                            <th scope="col"><?= __('Created') ?></th>
                                                            <th scope="col"><?= __('Modified') ?></th>
                                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($question->answers as $answers): ?>
                        <tr>
                                                            <td><?= h($answers->id) ?></td>
                                                            <td><?= h($answers->question_id) ?></td>
                                                            <td><?= h($answers->user_id) ?></td>
                                                            <td><?= h($answers->answer) ?></td>
                                                            <td><?= h($answers->created) ?></td>
                                                            <td><?= h($answers->modified) ?></td>
                                                                                    <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Answers', 'action' => 'view', $answers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Answers', 'action' => 'edit', $answers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Answers', 'action' => 'delete', $answers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                                                            <div class="related">
                    <h4><?= __('Related Tagged') ?></h4>
                    <?php if (!empty($question->tagged)): ?>
                    <table cellpadding="0" cellspacing="0" class="table table-condensed">
                        <tr>
                                                            <th scope="col"><?= __('Id') ?></th>
                                                            <th scope="col"><?= __('Question Id') ?></th>
                                                            <th scope="col"><?= __('Tag Id') ?></th>
                                                            <th scope="col"><?= __('Created') ?></th>
                                                            <th scope="col"><?= __('Modified') ?></th>
                                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($question->tagged as $tagged): ?>
                        <tr>
                                                            <td><?= h($tagged->id) ?></td>
                                                            <td><?= h($tagged->question_id) ?></td>
                                                            <td><?= h($tagged->tag_id) ?></td>
                                                            <td><?= h($tagged->created) ?></td>
                                                            <td><?= h($tagged->modified) ?></td>
                                                                                    <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tagged', 'action' => 'view', $tagged->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tagged', 'action' => 'edit', $tagged->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tagged', 'action' => 'delete', $tagged->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagged->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                    </div>
    </div>
</div>
