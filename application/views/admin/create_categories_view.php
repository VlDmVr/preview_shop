<h1>Создать новую категорию:</h1>
<div id='messages'><a href="/admin/categories">Вернуться к списоку категорий</a></div>
<div id="messages">
    <?php
        if($result):
    ?>
        <p>Новая категория успешно создана!</p>
    <?php
        endif;
    ?>
    
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
<div id="see_category"><h3>Посмотреть все категории на данный момент:</h3></div>
<div id="isset_category"><ul></ul></div>
<div id="order_form">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="<?php echo $name;?>" placeholder="Имя категории"/>
        <div>
            Статус: 
                <select name="status">
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
        </div>
       <div class="grab">
           <p>Название изображения должно быть такое же, как название категории плюс точка(.) плюс разширение файла.<br/>
           Например image.jpg или image.gif или image.png.<br/>
           Размер файла должен быть 50x50px.</p>
           <div style="display: inline-block;"> Логотип: <input style="display: inline-block;" type="file" name="logo"/></div>
       </div>
        <input type="submit" name="sub_create_category" value="Записать"/>
    </form>
</div>

