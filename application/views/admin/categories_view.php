<h1>Журнал категорий:</h1>
<div id='messages'><a href="/admin/create_categories">Создать новую категорию</a></div>
<table id="order" border="1" cellspacing="0">
    <tr>
        <th>id</th>
        <th>Логотип</th>
        <th>Имя категории</th>
        <th>Статус</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    <?php if(!empty($categories)):
            foreach($categories as $category):
    ?>
    <tr>
        <td><?php echo $category['id'];?></td>
        <td><img src="/images/logo/<?php echo $category['image'];?>" width="40"/></td>
        <td><?php echo $category['name'];?></td>
        <td><?php echo $category['status'];?></td>
        <td><a href="/admin/update_category/<?php echo $category['id'];?>">V</a></td>
        <td><a href="/admin/delete_category/<?php echo $category['id'];?>">X</a></td>
    </tr>   
    <?php 
             endforeach;
        endif;
    ?>
</table>
