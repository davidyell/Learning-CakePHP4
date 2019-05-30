<div class="vote card float-left border-0 mr-3 text-center">
    <?php
    use \Cake\Utility\Inflector;
    $table = Inflector::camelize(Inflector::pluralize($table));

    $upvotes = $item->get('upvotes');
    if (empty($item->get('upvotes'))) {
        $upvotes = 0;
    }
    $downvotes = $item->get('downvotes');
    if (empty($item->get('downvotes'))) {
        $downvotes = 0;
    }
    ?>
    <?= $this->Html->link(
        '<i class="fas fa-chevron-up"></i><br>+' . $upvotes,
        ['controller' => 'Votes', 'action' => 'vote', 'dir' => 'up', 'model' => $table, 'id' => $item->get('id')],
        ['escape' => false, 'class' => 'text-success']
    );?>
    <hr>
    <?= $this->Html->link(
        '-' . $downvotes . '<br><i class="fas fa-chevron-down"></i>',
        ['controller' => 'Votes', 'action' => 'vote', 'dir' => 'down', 'model' => $table, 'id' => $item->get('id')],
        ['escape' => false, 'class' => 'text-danger']
    );?>
</div>
