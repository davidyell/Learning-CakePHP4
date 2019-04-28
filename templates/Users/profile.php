<h1><?= $this->getRequest()->getSession()->read('Auth.User.username');?></h1>

<div class="row">
    <div class="col">
        <h2>Latest Questions</h2>
        <?php
        if (empty($user->get('questions'))) {
            ?><p>
                No questions found, why not ask a question?<br>
                <?= $this->Html->link('Ask a question', ['controller' => 'Questions', 'action' => 'add'], ['class' => 'btn btn-primary']);?>
            </p><?php
        } else {
            foreach ($user->get('questions') as $question) {
                echo $this->element('item-compact', ['data' => $question]);
            }
        }
        ?>
    </div>
    <div class="col">
        <h2>Latest Answers</h2>
        <?php
        if (empty($user->get('answers'))) {
            ?><p>
                No answers found, why post an answer?<br>
                <?= $this->Html->link('View questions', ['controller' => 'Questions', 'action' => 'index'], ['class' => 'btn btn-primary']);?>
            </p><?php
        } else {
            foreach ($user->get('answers') as $answer) {
                echo $this->element('item-compact', ['data' => $answer]);
            }
        }
        ?>
    </div>
    <div class="col">
        <h2>Latest Comments</h2>
        <?php
        if (empty($user->get('comments'))) {
            ?><p>
                No comments found
            </p><?php
        } else {
            foreach ($user->get('comments') as $comment) {
                echo $this->element('item-compact', ['data' => $comment]);
            }
        }
        ?>
    </div>
</div>
