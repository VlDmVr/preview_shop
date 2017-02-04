<?php 
    if(!empty($products_arr)):
?> 
    <div id='messages'><a href="/cart/delete">Очистить корзину</a></div>
    <table id="order" border="1" cellspacing="0">
        <tr>
            <th>№</th>
            <th>Марка</th>
            <th>Производитель</th>
            <th>Цена за шт., руб.</th>
            <th>Количество, шт.</th>
            <th>Общая сумма, руб.</th>
            <th>Удалить</th>
        </tr>
<?php
        $i=1;
        foreach($products_arr as $product):
?>       
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $product['name'];?></td>
            <td><?php echo $product['producer'];?></td>
            <td><?php echo $product['price'];?></td>
            <td><?php echo $product['quantity'];?></td>
            <td><?php echo $product['sum'];?></td>
            <td><a href="/cart/delete_product/<?php echo $product['id'];?>">X</a></td>
        </tr>
<?php 
        $i++;
        endforeach;
?>
    </table>
    
    <h1>Сумма к оплате: <?php echo $all_sum;?> руб.</h1>
    <div id="make_order"><h1>Оформить заказ</h1></div>
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
    <div id="order_form" style="display:<?php echo $display;?>;">
        <form action="" method="POST">
            <input type="text" name="order_name" value="<?php echo $order_name; ?>" placeholder="Имя"/>
            <input type="text" name="order_email" value="<?php echo $order_email;?>" placeholder="E-mail"/>
            <input type="text" name="order_adress" value="<?php echo $order_adress;?>" placeholder="Адрес"/>
            <input type="text" name="order_phone" value="<?php echo $order_phone;?>" placeholder="Телефон"/>
            <input  id="order_submit" type="submit" name="order_submit" value="Заказать"/>
        </form>
    </div>

<?php
    else:
?>
    <h1>Ваша корзина пуста!</h1>
<?php
    endif;
?>