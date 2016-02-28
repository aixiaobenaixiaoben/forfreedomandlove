<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Inflector;
use yii\web\Controller;

use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Writings model.
 */
class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public $layout = 'site';

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $this->goHome();
        }
        return parent::beforeAction($action);
    }

    /**
     * Lists all models.
     * @return mixed
     */
    public function actionIndex()
    {
        $models = [
            'domain',
            'log',
            'message',
            'relationship',
            'tag',
            'writings',
        ];
        return $this->render('index', [
            'models' => $models,
        ]);
    }


}
