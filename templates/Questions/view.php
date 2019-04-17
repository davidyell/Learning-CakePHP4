<h1><?= $question->get('title');?></h1>
<hr>

<?= $this->element('item', ['data' => $question])?>

<?php
if (!empty($question->get('answers'))) {
    $answerCount = count($question->get('answers'));
    $label = 'Answer';
    if ($answerCount > 0) {
        $label .= 's';
    }
    echo "<h3>" . $answerCount . " " . $label . "</h3><hr>";
    foreach ($question->get('answers') as $answer) { ?>
        <div class="answer mt-4 mb-4">
            <?php echo $this->element('item', ['data' => $answer]); ?>
        </div>
        <hr>
        <?php
    }
}
?>

<?php
if ($this->getRequest()->getSession()->check('Auth.User')) {
    echo $this->Form->create($answer, ['url' => ['controller' => 'Answers', 'action' => 'add', $question->get('id')]]);
    echo $this->Form->control('question_id', ['type' => 'hidden', 'value' => $question->get('id')]);
    echo $this->Form->control('answer', ['label' => 'Your answer', 'value' => false]);
    echo $this->Form->submit('Post your answer', ['class' => 'btn btn-primary']);
    echo $this->Form->end();
} else {
    ?>
    <p class="bg-light p-3 mt-3">
        Please login to post an answer to this question<br>
        <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-primary mt-3']);?>
    </p>
    <?php
}
?>
