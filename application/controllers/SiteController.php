<?php

class SiteController extends Controller
{
    public function actionIndex()
    {
        $categories = Category::getAllCategory();
        $autos = Autos::getAllAutos();
        
        foreach($categories as $category)
        {
            foreach($autos as $auto)
            {
                if($category['id'] == $auto['cat_id'] && ($auto['status'] != 0)){
                    $arr_cat_auto[$category['id']][] = $auto;
                }
            }
        }
   
        SliderWidget::setVisible(true);
        
        $this->render('site_view', array('categories'=>$categories, 'arr_cat_auto'=>$arr_cat_auto));
    }
}

