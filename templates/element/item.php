<?php
if ($data->has('question')) {
    $itemType = 'question';
    $copy = $data->get('question');
} elseif ($data->has('answer')) {
    $itemType = 'answer';
    $copy = $data->get('answer');
}
?>

<?= $this->element('vote', ['table' => $itemType, 'item' => $data]);?>

<p><?= nl2br($copy);?></p>

<div class="clearfix"><!-- clear --></div>

<?php
if (!empty($data->get('tagged')) && $itemType === 'question') {
    echo "<div class='float-left'>";
    foreach ($data->get('tagged') as $tagged) {
        echo "<span class='badge badge-secondary mr-2'>" . $tagged->get('tag')->get('name') . "</span>";
    }
    echo "</div>";
}
?>

<?php if ($this->getRequest()->getSession()->read('Auth.User.id') === $question->get('user_id')):?>
    <div class="float-left text-secondary" style="clear:left">
        <p class="mt-3"><?= $this->Html->link('edit', ['controller' => 'Questions', 'action' => 'edit', 'slug' => $question->get('slug')]);?></p>
    </div>
<?php endif;?>

<div class="card float-right bg-light">
    <div class="card-body">
        <?php
        $label = 'asked';
        if ($itemType === 'answer') {
            $label = 'answered';
        }
        ?>
        <p class="text-secondary"><?= $label?> <?= $data->get('modified')->timeAgoInWords()?></p>
        <img class="float-left mr-3" src="<?= "https://www.gravatar.com/avatar/" . md5(strtolower(trim($data->get('user')->get('email_address')))) . "?s=32"?>">
        <p style="white-space: nowrap"><?= $data->get('user')->get('username');?></p>
    </div>
</div>

<div class="clearfix"><!-- clear --></div>

<?= $this->element(
    'comments/index', [
        'comments' => $data->get('comments'),
        'type' => ($data->has('question')) ? 'questions' : 'answers',
        'id' => $data->get('id')
    ]
);?>
