<h1>Личный кабинет.</h1>
<?php
    if($userData):
?>
    <h3>Приветсвуем вас <?php echo $userData['name'];?>!</h3>
<?php
    endif;
?>