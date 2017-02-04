<h1>Форма регистрации:</h1>
<div id="messages">
<?php
    if($errors):
        foreach($errors as $error):
?>
        <p><?php echo $error; ?></p>
<?php
        endforeach; 
?>
<?php endif;?>
</div>
<div>
    <form action='' method='POST'>
        <input type='text' name='name' placeholder="Имя" value='<?php echo $name; ?>' />
        <input type='text' name='email' placeholder="E-mail" value='<?php echo $email; ?>' />
        <input type='password' name='password' placeholder="Пароль" value='<?php echo $password; ?>' />
        <input type='submit' name='reg_submit' value='Отправить' />
    </form>
</div>

