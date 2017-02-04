<h1>Автомобили <?php echo ucfirst($name);?>:</h1>
<br>
<div>
    <?php
    if($autos_select_cat):
        foreach($autos_select_cat as $select_category):
    ?>
        <div class="auto">
            <h3>
               <a href="<?php echo '/auto/'.$select_category['id']; ?>">
                   <?php echo $select_category['name'];?>
               </a>
            </h3>
            <?php if($select_category['image']):?>
                <div>
                    <a href="<?php echo '/auto/'.$select_category['id']; ?>">
                        <img src="/images/autos/<?php echo $name;?>/<?php echo $select_category['image'];?>" width="158px">
                    </a>
                </div>
            <?php else:?>
                <div><img src="/images/zaglushka.png"></div>
            <?php endif;?>
            <h3><?php echo $select_category['price'];?> руб.</h3>
        </div>
    <?php
        endforeach;
    endif;
    ?>
</div>

