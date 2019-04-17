<div class="comments mt-3 mb-3">
    <?php
    $comments = collection($comments)->sortBy('modified', SORT_ASC);
    foreach ($comments as $comment) {
        echo $this->element('comments/view', ['comment' => $comment]);
    }
    ?>

    <a class="add-comment-link" href="#add-comment" title="Add a comment">Add a comment</a>
    <?= $this->element('comments/add', ['type' => $type, 'id' => $id]);?>
</div>
