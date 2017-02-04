<?php

class AutoController extends Controller
{
    public function actionIndex($id)
    {
        $auto = Autos::getAutoById($id);
        $cat_id = $auto['cat_id'];
        
        $image_folder = Category::getNameCategory($cat_id);
        
        if($_POST['sub_to_cart'])
        {
            $id = trim($_POST['id']);
            $quantity = trim($_POST['quantity']);
            
            $all_arr_products = Cart::addToCart($id, $quantity);
        }
        
        if(!$auto){
           $error = new ErrorController;
           $error->actionError();
        }
        else
        {
            $this->render('auto_view', array('auto'=>$auto, 'image_folder'=>$image_folder, 'id'=>$id));
        }
    }
}

