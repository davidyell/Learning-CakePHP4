<h2>Ask a new question</h2>

<?php
echo $this->Form->create($question);
echo $this->Form->control('title');
echo $this->Form->control('question');
echo $this->Form->submit('Save', ['class' => 'btn btn-primary']);
echo $this->Form->end();
?>
