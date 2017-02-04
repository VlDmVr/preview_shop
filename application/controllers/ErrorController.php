<?php

class ErrorController extends Controller
{
    public function actionError()
    {
        include ROOT.'/application/views/error/error_view.php';
    }
}
