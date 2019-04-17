<div class="comment p-3">
    <?= $comment->get('comment');?> &mdash; <span class="text-secondary"><?= $comment->get('user')->get('username');?> <?= $comment->get('modified')->timeAgoInWords()?></span>
</div>
