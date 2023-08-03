<?php
namespace Controller;
use App\View;

class IndexController{
    public function actionIndex(){
        View::render("indexView"); 
    }
}