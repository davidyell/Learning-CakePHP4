<h1>Questions</h1>
<hr>

<?php if ($questions->isEmpty()): ?>
    <div class="alert alert-info">
        Sorry, we couldn't find any questions.
    </div>
    <p><?= $this->Html->link('Ask question', ['controller' => 'Questions', 'action' => 'add'], ['class' => 'btn btn-primary'])?></p>
<?php else:
    foreach ($questions as $question) {
        ?>
        <div class="question">
            <?= $this->Html->link(
                '<h4>' . $question->get('title') . '</h4>',
                ['controller' => 'Questions', 'action' => 'view', $question->get('id')],
                ['escape' => false]
            )?>
            <p class="text-secondary float-right">
                asked <?= $question->get('modified')->timeAgoInWords()?> <?= $question->get('user')->get('username');?>
            </p>
        </div>
        <?php
    }
endif;?>