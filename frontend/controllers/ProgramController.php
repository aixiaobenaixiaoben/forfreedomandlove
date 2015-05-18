<?php

namespace frontend\controllers;

use common\models\Domain;
use common\models\Log;
use common\models\Relationship;
use common\models\Tag;
use common\models\Writings;
use yii\web\Controller;

class ProgramController extends Controller
{

    public function beforeAction($action)
    {
        $this->getView()->title = 'Programming';
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        $writings = Writings::getList(Writings::TYPE_OF_PROGRAMING);
        $domains = Domain::getList(Writings::TYPE_OF_PROGRAMING);
        $tags = Tag::getList(Writings::TYPE_OF_PROGRAMING);

        return $this->render('index', [
            'tag' => '',
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }

    public function actionView($id)
    {
        $writing = Writings::findOne(['id' => $id, 'type' => Writings::TYPE_OF_PROGRAMING,]);

        if (!$writing) {
            $this->redirect('/');
        }
        Log::createLog($id);

        $domains = Domain::getList(Writings::TYPE_OF_PROGRAMING);
        $tags = Tag::getList(Writings::TYPE_OF_PROGRAMING);

        return $this->render('view', [
            'tags' => $tags,
            'domains' => $domains,
            'writing' => $writing,
        ]);
    }

    public function actionTag($id)
    {
        $tag = Tag::findOne(['id' => $id, 'type' => Writings::TYPE_OF_PROGRAMING]);

        if (!$tag) {
            $this->redirect('/');
        }

        $relationships = Relationship::getList($id);
        $writings = [];
        foreach ($relationships as $relationship) {
            $writing = $relationship->writings;
            if ($writing->type != Writings::TYPE_OF_PROGRAMING) {
                continue;
            }
            $writings[] = $writing;
        }

        $domains = Domain::getList(Writings::TYPE_OF_PROGRAMING);
        $tags = Tag::getList(Writings::TYPE_OF_PROGRAMING);

        return $this->render('index', [
            'tag' => $tag,
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }

    public function actionDomain($id)
    {
        $domain = Domain::findOne(['id' => $id, 'type' => Writings::TYPE_OF_PROGRAMING]);

        if (!$domain) {
            $this->redirect('/');
        }

        $writings = Writings::getList(Writings::TYPE_OF_PROGRAMING, $id);
        $domains = Domain::getList(Writings::TYPE_OF_PROGRAMING);
        $tags = Tag::getList(Writings::TYPE_OF_PROGRAMING);

        return $this->render('index', [
            'tag' => $domain,
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }


}