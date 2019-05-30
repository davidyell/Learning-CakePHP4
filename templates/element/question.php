<div class="question">
    <div class="card float-left mr-3 border-0">
        <div class="card-body text-center">
            <?= $question->get('vote_count') ?? 0 ;?><br><small>votes</small>
        </div>
    </div>
    <div class="card float-left mr-3 <?= ($question->get('answer_count') < 1) ? 'border-0' : 'text-success'?>">
        <div class="card-body text-center">
            <?= $question->get('answer_count');?><br><small>answers</small>
        </div>
    </div>
    <div class="card float-left mr-3 border-0">
        <div class="card-body text-center">
            <?= $question->get('view_count');?><br><small>views</small>
        </div>
    </div>
    <div class="question-content">
        <?= $this->Html->link(
            '<h4>' . $question->get('title') . '</h4>',
            ['controller' => 'Questions', 'action' => 'view', 'slug' => $question->get('slug')],
            ['escape' => false]
        )?>

        <?php
        if (!empty($question->get('tagged'))) {
            foreach ($question->get('tagged') as $tagged) {
                echo $this->Html->link(
                    "<span class='badge badge-secondary mr-2'>" . $tagged->get('tag')->get('name') . "</span>",
                    ['controller' => 'Tags', 'action' => 'view', $tagged->get('tag')->get('id')],
                    ['escape' => false]
                );
            }
        }
        ?>

        <p class="text-secondary float-right">
            asked <?= $question->get('modified')->timeAgoInWords()?> <?= $question->get('user')->get('username');?>
        </p>
    </div>
    <div class="clearfix"></div>
    <hr>
</div>
