<h2>Edit your question</h2>

<?php
echo $this->Form->create($question, ['novalidate' => true]);
echo $this->Form->control('title');
echo $this->Form->control('question');

$existingTags = [];
if (!empty($question->get('tagged'))) {
    $existingTags = collection($question->get('tagged'))->combine('tag.name', 'tag.name')->toArray();
}
echo $this->Form->control('tags', ['type' => 'select', 'multiple' => true, 'value' => $existingTags]);

echo "<div class='submit'>";
    echo $this->Form->button('Save', ['type' => 'submit', 'class' => 'btn btn-primary mr-3']);
    echo $this->Html->link('Cancel', ['controller' => 'Questions', 'action' => 'view', 'slug' => $question->get('slug')], ['class' => 'btn btn-danger']);
echo "</div>";
echo $this->Form->end();
?>

<?php $this->append('script');?>
<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css">
<script type="application/javascript">
    $(function () {
        $('#tags').selectize({
            delimiter: ',',
            create: function (input) {
                return {
                    value: input,
                    text: input
                }
            }
        });
    });
</script>
<?php $this->end();?>
