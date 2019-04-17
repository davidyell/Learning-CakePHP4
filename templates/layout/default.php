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
    <?= $this->fetch('css') ?>
</head>
<body>
    <?= $this->element('navigation');?>

    <div class="container clearfix">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

    <footer>
    </footer>

    <script src="https://unpkg.com/jquery@3.4.0/dist/jquery.min.js"></script>
    <?= $this->fetch('script') ?>
</body>
</html>
