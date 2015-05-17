<?php

namespace frontend\controllers;

use common\models\Domain;
use common\models\Relationship;
use common\models\Tag;
use common\models\Writings;
use yii\web\Controller;

class IndexController extends Controller
{

    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        $writings = Writings::getList();
        $domains = Domain::getList();
        $tags = Tag::getList();

        return $this->render('index', [
            'tag' => '',
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }

    public function actionView($id)
    {
        $writing = Writings::findOne($id);
        if (!$writing) {
            $this->redirect('/');
        }
        $domains = Domain::getList();
        $tags = Tag::getList();

        return $this->render('view', [
            'tags' => $tags,
            'domains' => $domains,
            'writing' => $writing,
        ]);
    }

    public function actionTag($id)
    {
        $tag = Tag::findOne($id);
        if (!$tag) {
            $this->redirect('/');
        }

        $relationships = Relationship::getList($id);
        $writings = [];
        foreach ($relationships as $relationship) {
            $writing = $relationship->writings;
            $writings[] = $writing;
        }
        $domains = Domain::getList();
        $tags = Tag::getList();

        return $this->render('index', [
            'tag' => $tag,
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }

    public function actionDomain($id)
    {
        $domain = Domain::findOne($id);
        if (!$domain) {
            $this->redirect('/');
        }
        $writings = Writings::getList(null, $id);
        $domains = Domain::getList();
        $tags = Tag::getList();

        return $this->render('index', [
            'tag' => $domain,
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }


}