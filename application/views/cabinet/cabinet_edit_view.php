<h1>Изменить персональные данные:</h1>
    
<div id="messages">
    <?php
        if($result):
    ?> 
        <p>Данные успешно сохранены!</p>
    <?php
        endif;
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
        <input type='text' name='name' placeholder="Имя" value='<?php echo $name; ?>' />
        <input type='text' name='email' placeholder="E-mail" value='<?php echo $email; ?>' />
        <input type='password' name='password' placeholder="Пароль" value='' />
        <input type='submit' name='edit_submit' value='Отправить' />
    </form>
</div>

