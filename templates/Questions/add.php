<h2>Ask a new question</h2>

<?php
echo $this->Form->create($question);
echo $this->Form->control('title');
echo $this->Form->control('question');
echo $this->Form->control('tags', ['type' => 'select', 'multiple' => true]);
echo $this->Form->submit('Save', ['class' => 'btn btn-primary']);
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
