<?php

namespace Controller;
use Model\LinkModel;

class LinkController
{
    public function actionValidURL($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return false;
        } else return true;
    }
    public function actionGetShortLink($link){
        $linkModel = new LinkModel();
        $arLink = $linkModel->checkURL($link);
        if(!$arLink){
            $arLink = $linkModel->createShortURL($link);
        }
        return $arLink;
    }
}
