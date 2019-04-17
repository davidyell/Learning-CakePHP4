<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Login</h1>

            <?php
            echo $this->Flash->render('auth');

            echo $this->Form->create();
            echo $this->Form->control('email_address');
            echo $this->Form->control('password');
            echo $this->Form->submit('Login', ['class' => 'btn btn-primary btn-block']);
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
