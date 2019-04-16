<?php
if ($data->has('question')) {
    $copy = $data->get('question');
} elseif ($data->has('answer')) {
    $copy = $data->get('answer');
}
?>

<p><?= nl2br($copy);?></p>

<div class="clearfix"><!-- clear --></div>

<?php
if (!empty($data->get('tagged')) && $data->has('question')) {
    echo "<div class='float-left'>";
    foreach ($data->get('tagged') as $tagged) {
        echo "<span class='badge badge-secondary mr-2'>" . $tagged->get('tag')->get('name') . "</span>";
    }
    echo "</div>";
}
?>

<div class="card float-right bg-light">
    <div class="card-body">
        <p class="text-secondary">asked <?= $data->get('modified')->timeAgoInWords()?></p>
        <img class="float-left mr-3" src="<?= "https://www.gravatar.com/avatar/" . md5(strtolower(trim($data->get('user')->get('email_address')))) . "?s=32"?>">
        <p style="white-space: nowrap"><?= $data->get('user')->get('username');?></p>
    </div>
</div>

<div class="clearfix"><!-- clear --></div>
