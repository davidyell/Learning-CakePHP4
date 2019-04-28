<?php if ($data instanceof \App\Model\Entity\Question):?>
    <p><?= $this->Html->link($data->get('title'), ['controller' => 'Questions', 'action' => 'view', 'slug' => $data->get('slug')]);?></p>
<?php elseif ($data instanceof \App\Model\Entity\Answer):?>
    <p><?= $this->Html->link($data->get('question')->get('title'), ['controller' => 'Questions', 'action' => 'view', 'slug' => $data->get('question')->get('slug')]);?></p>
<?php elseif ($data instanceof \App\Model\Entity\Comment):
    if ($data->get('table_name') === 'Answers') {
        ?><p>
            <?= $this->Html->link(
                $data->get('answer')->get('question')->get('title'),
                ['controller' => 'Questions', 'action' => 'view', 'slug' => $data->get('answer')->get('question')->get('slug')]
            );?>
        </p><?php
    } elseif ($data->get('table_name') === 'Questions') {
        ?><p>
        <?= $this->Html->link(
            $data->get('question')->get('title'),
            ['controller' => 'Questions', 'action' => 'view', 'slug' => $data->get('question')->get('slug')]
        );?>
        </p><?php
    }
endif;?>
