<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row">
    <div class="col-md-2">
        <nav class="columns" id="actions-sidebar">
            <h4>Actions</h4>
            <div class="list-group">
                <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
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
        <div class="users view content">
            <h3><?= h($user->username) ?></h3>
            <table class="table table-striped">
                                                                                        <tr>
                                <th scope="row"><?= __('Username') ?></th>
                                <td><?= h($user->username) ?></td>
                            </tr>
                                                                                                <tr>
                                <th scope="row"><?= __('Email Address') ?></th>
                                <td><?= h($user->email_address) ?></td>
                            </tr>
                                                                                                                                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($user->id) ?></td>
                        </tr>
                                                                                                <tr>
                            <th scope="row"><?= __('Created') ?></th>
                            <td><?= h($user->created) ?></td>
                        </tr>
                                            <tr>
                            <th scope="row"><?= __('Modified') ?></th>
                            <td><?= h($user->modified) ?></td>
                        </tr>
                                                                                                <tr>
                            <th scope="row"><?= __('Is Active') ?></th>
                            <td><?= $user->is_active ? __('Yes') : __('No'); ?></td>
                        </tr>
                                                </table>
                                                <div class="row">
                        <h4><?= __('Password') ?></h4>
                        <?= $this->Text->autoParagraph(h($user->password)); ?>
                    </div>
                                                                                                    <div class="related">
                    <h4><?= __('Related Answers') ?></h4>
                    <?php if (!empty($user->answers)): ?>
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
                        <?php foreach ($user->answers as $answers): ?>
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
                    <h4><?= __('Related Comments') ?></h4>
                    <?php if (!empty($user->comments)): ?>
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
                        <?php foreach ($user->comments as $comments): ?>
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
                    <h4><?= __('Related Questions') ?></h4>
                    <?php if (!empty($user->questions)): ?>
                    <table cellpadding="0" cellspacing="0" class="table table-condensed">
                        <tr>
                                                            <th scope="col"><?= __('Id') ?></th>
                                                            <th scope="col"><?= __('Title') ?></th>
                                                            <th scope="col"><?= __('Question') ?></th>
                                                            <th scope="col"><?= __('Slug') ?></th>
                                                            <th scope="col"><?= __('Answer Count') ?></th>
                                                            <th scope="col"><?= __('User Id') ?></th>
                                                            <th scope="col"><?= __('Created') ?></th>
                                                            <th scope="col"><?= __('Modified') ?></th>
                                                            <th scope="col"><?= __('View Count') ?></th>
                                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->questions as $questions): ?>
                        <tr>
                                                            <td><?= h($questions->id) ?></td>
                                                            <td><?= h($questions->title) ?></td>
                                                            <td><?= h($questions->question) ?></td>
                                                            <td><?= h($questions->slug) ?></td>
                                                            <td><?= h($questions->answer_count) ?></td>
                                                            <td><?= h($questions->user_id) ?></td>
                                                            <td><?= h($questions->created) ?></td>
                                                            <td><?= h($questions->modified) ?></td>
                                                            <td><?= h($questions->view_count) ?></td>
                                                                                    <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                                                            <div class="related">
                    <h4><?= __('Related Tagged') ?></h4>
                    <?php if (!empty($user->tagged)): ?>
                    <table cellpadding="0" cellspacing="0" class="table table-condensed">
                        <tr>
                                                            <th scope="col"><?= __('Id') ?></th>
                                                            <th scope="col"><?= __('Question Id') ?></th>
                                                            <th scope="col"><?= __('Tag Id') ?></th>
                                                            <th scope="col"><?= __('Created') ?></th>
                                                            <th scope="col"><?= __('Modified') ?></th>
                                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->tagged as $tagged): ?>
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
