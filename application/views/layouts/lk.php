<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <script  type="text/javascript" src="/js/jquery-1.11.3.js"></script>
    <script  type="text/javascript" src="/js/js_file.js"></script>
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
                                if(!$_SESSION['userId']):
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
		
		<div class="clear"><br /></div>
	
		<div id="left">
			<div class="box">
                            <ul>
                                <li><a href="/cabinet/edit">Персональные данные</a></li>
                                <li><a href="#">Журнал заказов</a></li>
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