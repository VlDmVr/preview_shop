<div id="main_aut">
    <?php
    if($categories):
        foreach($categories as $category): 
    ?>
        <div class="category">   
            <?php 
                echo '<p>'.ucfirst($category['name']).'</p>';
            ?>
                <div class="wrapper_auto">
                    <?php
                    if($arr_cat_auto):
                        foreach($arr_cat_auto as $key_arr_auto=>$vle_arr_auto):
                            if($category['id'] == $key_arr_auto):
                                $i = 1;
                                $display = "";
                                foreach($vle_arr_auto as $auto): 
                                
                                 if($i == count($vle_arr_auto))
                                 {
                                     $display = "display:none;";
                                 }
                    ?>
                                <div class="auto">
                                    <a href="<?php echo '/auto/'.$auto['id']; ?>"><?php echo $auto['name']; ?></a>
                                    <div class="link_delimetr" style="<?php echo $display;?>">|</div>  
                                </div>
                    <?php 
                                 $i++;
                                endforeach;
                            endif;
                        endforeach;
                    endif;
                    ?>
            </div>
        </div>
    <?php 
        endforeach;
    endif;
    ?>
</div>