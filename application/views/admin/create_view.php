<h1>Создать запись товара:</h1>
<div id='messages'><a href="/admin/products">Вернуться к списоку товаров</a></div>
<div id="messages">
    <?php
        if($result):
    ?>
        <p>Новый товар успешно создан!</p>
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
<div id="order_form">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="<?php echo $name;?>" placeholder="Марка"/>
        <div>
            Производитель: 
                        <select name="producer">
                            <?php foreach($category as $item):?>
                                <option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
                            <?php endforeach;?>
                         </select>
        </div>
        <input type="text" name="price" value="<?php echo $price;?>" placeholder="Цена"/>
        <div>
            Статус: 
                <select name="status">
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
        </div>   
        <textarea name="description" cols="50" rows="20" placeholder="Краткое описание..."><?php echo $description;?></textarea>
        <input type="file" name="image"/>
        <input type="submit" name="sub_create_product" value="Записать"/>
    </form>
</div>
