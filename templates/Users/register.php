<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Register</h1>

            <?php
            echo $this->Form->create();
            echo $this->Form->control('username');
            echo $this->Form->control('email_address');
            echo $this->Form->control('password');
            echo $this->Form->submit('Register', ['class' => 'btn btn-primary btn-block']);
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
