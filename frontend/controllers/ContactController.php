<?php

namespace frontend\controllers;

use common\models\AjaxResponse;
use Yii;
use yii\web\Controller;

class ContactController extends Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect('/');
        }
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        $user = 'userName';
        return $this->render('index', ['user' => $user]);
    }


}