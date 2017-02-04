<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="/css/widgets.css" type="text/css">
    <script  type="text/javascript" src="/js/jquery-1.11.3.js"></script>
    <script  type="text/javascript" src="/js/js_file.js"></script>
    <script  type="text/javascript" src="/js/widgets.js"></script>
    <title>Cars</title>
</head>
<body>
    <div id="wrapper_main">
        <div id="content">
            <div id="new">

		<div id="top_level">
                    
                    <div id="logo">
                        <p>car,auto,machine</p>
                        <h1><a href="/">Cars</a></h1>
                        <div id="cart">
                            <?php
                                if(!$_SESSION['userId'] || !$_SESSION['role']):
                            ?>
                                <a href="/user/auth">Вход</a>
                            <?php
                                else:
                            ?>
                                <a href="/user/exit">Выход</a>
                                <a href="/cabinet">Личный кабинет</a>
                                <a href="/admin/" style="display:<?php echo App::getUserRole();?>;">Администратор</a>
                            <?php
                                endif;
                            ?>
                            <a href="/cart/">Корзина(<?php echo Cart::countProducts($_SESSION['cart']);?>)</a>
                        </div>
                    </div>
                   
                </div>
		
		<div id="top_menu">
                    <ul id="menu">
                            <li><a href="/">Главная</a></li>
                            <li><a href="/about/">О нас</a></li>
                            <li><a href="/user/registration">Регистрация</a></li>
                            <li><a href="/contacts/">Контакты</a></li>
                    </ul>
                </div>
                
		<div class="clear"><br /></div>
              
             <!-- start slider --> 
             <?php
                if(SliderWidget::getVisible()):
             ?>
            
                <div id="widget_slider">
                     <img class="arrows" id="right_arrow" src="/application/views/widgets/config/image/right_arrow.png">
                     <img class="arrows" id="left_arrow" src="/application/views/widgets/config/image/left_arrow.png">
                     <img id="preview" src=""/> 
                </div>
            
             <?php
                endif;
             ?>
              <!-- end slider -->
        
		<div id="left">
			<div class="box">
                            <ul>
                                <?php foreach(Category::getAllCategory() as $category):?>
                                <li><a href="<?php echo '/autos/'.$category['name'];?>"><img src="<?php echo '/images/logo/'.$category['image'];?>" /><span class="list"><?php echo ucfirst($category['name']);?></span></a></li>
                                <?php endforeach;?>
                            </ul>
			</div>
		</div>
		
		<div id="center">
			<?php 
                            echo $content;
                        ?>
		</div>
            </div>   
	</div>
    </div>
    <div id="footer">
            <div id="fl">
                    <p>&copy; Copyright <?=date('Y')?><br/>"Cars Company"</p>
            </div>
    </div>
        
	
</body>
</html>