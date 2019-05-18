<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <?= $this->fetch('meta') ?>
    <?= $this->Html->css(['site']);?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Administration</h1>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-2">
                <?= $this->element('admin/navigation');?>
            </div>
        </div>
    </div>

    <div class="container clearfix">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

    <footer class="container mt-5 p-5">
        <div class="row">
            <div class="col text-center">
                Built with<br>
                <?= $this->Html->link(
                    $this->Html->image('logo-1.jpg', ['style' => 'height: 60px']),
                    'https://cakephp.org/',
                    ['escape' => false]
                )?>
            </div>
            <div class="col text-center">
                Fork me on<br>
                <?= $this->Html->link(
                    $this->Html->image('GitHub_Logo.png', ['style' => 'height: 60px']),
                    'https://github.com/davidyell/Learning-CakePHP4',
                    ['escape' => false]
                )?>
            </div>
            <div class="col text-center">
                Inspired by<br>
                <?= $this->Html->link(
                    $this->Html->image('se-logo.png', ['style' => 'height: 60px']),
                    'https://stackexchange.com/',
                    ['escape' => false]
                )?>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/jquery@3.4.0/dist/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?= $this->Html->script('site');?>
    <?= $this->fetch('script') ?>

</body>
</html>
