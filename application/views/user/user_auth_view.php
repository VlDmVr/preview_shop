<h1>Форма авторизации:</h1>
<div id="messages">
    <?php
        if($errors):
            foreach($errors as $error):
    ?>
        <p><?php echo $error; ?></p>
    <?php
            endforeach;
        endif;
    ?>
</div>
<div>
    <form action='' method='POST'>
        <input type='text' name='email' placeholder="E-mail" value='<?php echo $email; ?>' />
        <input type='password' name='password' placeholder="Пароль" value='<?php echo $password; ?>' />
        <input type='submit' name='auth_submit' value='Отправить' />
    </form>
</div>

