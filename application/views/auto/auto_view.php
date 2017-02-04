<?php if($auto): ?>
    <h3><?php echo $auto['name'];?></h3>
    <div>
        <?php if($auto['image']):?>
            <div>
                <img src="/images/autos/<?php echo $image_folder['name']; ?>/<?php echo $auto['image']; ?>" alt="<?php echo $auto['image']; ?>" width="158px">
            </div>
        <?php else: ?>
            <div><img src="/images/zaglushka.png"></div>
        <?php endif;?>
        <p><?php echo $auto['description'];?></p>
        <h3><?php echo $auto['price'];?> руб.</h3>
    </div>
    <div class="submit_to_cart">
        <form action="" method="POST">
            <div>
                Колличество шт.: <select name="quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="sub_to_cart" value="В корзину">
        </form>
    </div>
<?php endif; ?>