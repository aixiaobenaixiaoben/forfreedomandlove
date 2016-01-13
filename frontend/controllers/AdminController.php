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
            $this->redirect('/');
        }
        return parent::beforeAction($action);
    }

    /**
     * Lists all models.
     * @return mixed
     */
    public function actionIndex()
    {
        $path_handle = opendir(__DIR__);
        $models_path = [];
        while ($file = readdir($path_handle)) {
            if ($pos = strpos($file, 'Controller.php')) {
                $file = substr_replace($file, '', $pos);
                $models_path[$file] = Inflector::camel2id($file, '-');
            }
        }
        return $this->render('index', [
            'models' => $models_path,
        ]);
    }


}
