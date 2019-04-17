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
            <div class="card float-left mr-3 <?= ($question->get('answer_count') < 1) ? 'border-0' : null?>">
                <div class="card-body text-center">
                    <small><?= $question->get('answer_count');?><br>
                    answers</small>
                </div>
            </div>
            <div class="question-content">
                <?= $this->Html->link(
                    '<h4>' . $question->get('title') . '</h4>',
                    ['controller' => 'Questions', 'action' => 'view', 'slug' => $question->get('slug')],
                    ['escape' => false]
                )?>

                <?php
                if (!empty($question->get('tagged'))) {
                    foreach ($question->get('tagged') as $tagged) {
                        echo "<span class='badge badge-secondary mr-2'>" . $tagged->get('tag')->get('name') . "</span>";
                    }
                }
                ?>

                <p class="text-secondary float-right">
                    asked <?= $question->get('modified')->timeAgoInWords()?> <?= $question->get('user')->get('username');?>
                </p>
            </div>
            <div class="clearfix"></div>
            <hr>
        </div>
        <?php
    }
endif;?>

<nav>
    <ul class="pagination"><?= $this->Paginator->numbers()?></ul>
</nav>
