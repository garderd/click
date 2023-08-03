<?php

namespace Controller;
use Model\RedirectModel;

class RedirectController{
    public function actionRedirect($shortLink){
        $redirectModel = new RedirectModel();
        $redirectModel->redirect($shortLink);
    }
}