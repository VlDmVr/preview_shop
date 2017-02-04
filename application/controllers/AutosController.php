<?php

class AutosController extends Controller
{
    public function actionIndex($name)
    {
        $arr_autos_id = Category::getIdCategory($name);
        $autos_id = $arr_autos_id['id'];
        $autos_select_cat = Autos::getCategoryAutos($autos_id);
        
        $this->render('autos_view', array('autos_select_cat'=>$autos_select_cat, 'name'=>$name));
    }
}