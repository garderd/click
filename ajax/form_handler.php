<?php
require_once "../vendor/autoload.php";
use Controller\LinkController;
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $linkController = new LinkController();
    $url = $_POST['link'];
    
    $valudURL = $linkController->actionValidURL($url);
    if($valudURL !== true){
        $result['status'] = 'novalid';
        $result['info'] = 'Введённое значение не является ссылкой';
        echo json_encode($result);
        exit;
    }
    else{
        $data = $linkController->actionGetShortLink($url);
        if($data){
            $result['status'] = 'success';
            $result['short_link'] = $_SERVER['SERVER_NAME']. "/" .$data['short_string'];
            echo json_encode($result);
        }
        else{
            echo false;
        }
    }
    

    exit;
}