<div class="card m-4 add-comment">
    <div class="card-body">
        <?php
        echo $this->Form->create(null, ['url' => ['controller' => 'Comments', 'action' => 'add', 'model' => $type, 'id' => $id, '_method' => 'post']]);
        echo $this->Form->control('comment');
        echo $this->Form->control('table_name', ['type' => 'hidden']);
        echo $this->Form->control('primary_key', ['type' => 'hidden']);
        echo $this->Form->submit('Add comment', ['class' => 'btn btn-primary']);
        echo $this->Form->end();
        ?>
    </div>
</div>
