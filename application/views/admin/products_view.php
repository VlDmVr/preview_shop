<h1>Журнал товаров:</h1>
<div id='messages'><a href="/admin/create_products">Создать новую запись товара</a></div>
<table id="order" border="1" cellspacing="0">
    <tr>
        <th>id</th>
        <th>Марка</th>
        <th>Производитель</th>
        <th>Цена за шт., руб.</th>
        <th>Статус</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    <?php if(!empty($limit_items_arr)):
            foreach($limit_items_arr as $product):
    ?>
    <tr>
        <td><?php echo $product['id'];?></td>
        <td><?php echo $product['name'];?></td>
        <td><?php echo $product['producer'];?></td>
        <td><?php echo $product['price'];?></td>
        <td><?php echo $product['status'];?></td>
        <td><a href="/admin/update_product/<?php echo $product['id'];?>">V</a></td>
        <td><a href="/admin/delete_product/<?php echo $product['id'];?>">X</a></td>
    </tr>   
    <?php 
             endforeach;
        endif;
    ?>
</table>

<div id="pagination_panel">
    <?php
        if($id==1)
        {
            $display_plus = 'none';
        }
        if($id==$link_page)
        {
            $display_minus = 'none';
        }
    ?>
    <div class="start_end_link"><a style="display:<?php echo $display_plus;?>" href="/admin/products/1"><<</a></div>
    <div class="prev_next_link"><a style="display:<?php echo $display_plus;?>" href="/admin/products/<?php echo $id-1;?>"><</a></div>
    <?php
        if(!empty($limit_items_arr)):
            for($i=1; $i<=$link_page; $i++):
                if($i==$id)
                {
                    $bgcolor = '';
                }
                else
                {
                    $bgcolor = '#eee';
                }
    ?>
    <div class="pagination_link">
        <a  style="background-color:<?php echo $bgcolor;?>" href="/admin/products/<?php echo $i;?>">
            <?php
                if(!$bgcolor)
                {
                   echo '<b>'.$i.'</b>'; 
                }
                else
                {
                   echo $i;
                }
            ?>
        </a>
    </div>
    <?php
            endfor;
        endif;
    ?>
    <div class="prev_next_link"><a style="display:<?php echo $display_minus;?>" href="/admin/products/<?php echo $id+1;?>">></a></div>
    <div class="start_end_link"><a style="display:<?php echo $display_minus;?>" href="/admin/products/<?php echo $link_page;?>">>></a></div>
</div>
