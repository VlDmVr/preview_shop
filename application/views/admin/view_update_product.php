<h1>Редактироваит товар:</h1>
<div id='messages'><a href="/admin/products">Вернуться к списоку товаров</a></div>
<div id="messages">
    <?php
        if($result):
    ?>
        <p>Продукт успешно отредактирован!</p>
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
        <input type="text" name="name" value="<?php echo $name;?>" />
        <div>
            Производитель: 
                        <select name="producer">
                            <?php foreach($category as $item):
                                        $selected = '';
                                        if($cat_id == $item['id'])
                                        {
                                            $selected = 'selected';
                                        }
                            ?>
                                <option value="<?php echo $item['id'];?>" <?php echo $selected;?>><?php echo $item['name'];?></option>
                            <?php endforeach;?>
                         </select>
        </div>
        <input type="text" name="price" value="<?php echo $price;?>" />
        <div>
            Статус: 
                <select name="status">
                    <?php 
                    echo $status;
                        $selected_st_one = '';
                        $selected_st_two = '';
                        if($status == 1)
                        {
                            $selected_st_one = 'selected';
                        }
                        else
                        {
                            $selected_st_two = 'selected';
                        }
                    ?>
                    <option value="1" <?php echo $selected_st_one;?>>1</option>
                    <option value="0" <?php echo $selected_st_two;?>>0</option>
                </select>
        </div>   
        <textarea name="description" cols="50" rows="20" ><?php echo $description;?></textarea>
        <div class="grab">
            Запись в базе: <input type="text" name="image_data" value="<?php echo $img_data;?>"/>
            Новый файл: <input type="file" name="image_new"/>
        </div>
        <input type="submit" name="sub_update_product" value="Записать"/>
    </form>
</div>