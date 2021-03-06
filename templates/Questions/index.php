<h1>Questions</h1>
<hr>

<?php if ($questions->isEmpty()): ?>
    <div class="alert alert-info">
        Sorry, we couldn't find any questions.
    </div>
    <p><?= $this->Html->link('Ask question', ['controller' => 'Questions', 'action' => 'add'], ['class' => 'btn btn-primary'])?></p>
<?php else:
    foreach ($questions as $question) {
        echo $this->element('question', ['question' => $question]);
    }
endif;?>

<nav>
    <ul class="pagination"><?= $this->Paginator->numbers()?></ul>
</nav>
