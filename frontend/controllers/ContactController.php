<?php

namespace frontend\controllers;

use common\models\AjaxResponse;
use yii\web\Controller;

class ContactController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        $user = 'userName';
        return $this->render('index', ['user' => $user]);
    }


}