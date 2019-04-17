<div class="card m-4">
    <div class="card-body">
        <?= $comment->get('comment');?> &mdash; <span class="text-secondary"><?= $comment->get('user')->get('username');?> <?= $comment->get('modified')->timeAgoInWords()?></span>
    </div>
</div>
