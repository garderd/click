<?php


namespace Controller;
use App\View;

class NoFoundController{
    public function action404(){
        View::render("NoFoundView"); 
    }
}