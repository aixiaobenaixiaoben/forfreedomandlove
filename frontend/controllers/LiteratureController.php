<?php

namespace frontend\controllers;

use common\models\Domain;
use common\models\Log;
use common\models\Tag;
use common\models\Writings;
use yii\web\Controller;

class LiteratureController extends Controller
{

    public function beforeAction($action)
    {
        $this->getView()->title = 'Literature';
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        $writings = Writings::getList(Writings::TYPE_OF_LITERATURE);
        $domains = Domain::getList(Writings::TYPE_OF_LITERATURE);
        $tags = Tag::getList(Writings::TYPE_OF_LITERATURE);

        return $this->render('index', [
            'tag' => '',
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }

    public function actionView($id)
    {
        $writing = Writings::findOne(['id' => $id, 'type' => Writings::TYPE_OF_LITERATURE,]);

        if (!$writing) {
            $this->redirect('/');
        }
        Log::createLog($id);

        $domains = Domain::getList(Writings::TYPE_OF_LITERATURE);
        $tags = Tag::getList(Writings::TYPE_OF_LITERATURE);

        return $this->render('view', [
            'tags' => $tags,
            'domains' => $domains,
            'writing' => $writing,
        ]);
    }

    public function actionTag($id)
    {
        /**@var Tag $tag */
        $tag = Tag::findOne(['id' => $id, 'type' => Writings::TYPE_OF_LITERATURE]);

        if (!$tag) {
            $this->redirect('/');
        }

        $relationships = $tag->relationships;
        $writings = [];
        foreach ($relationships as $relationship) {
            $writing = $relationship->writings;
            if ($writing->type != Writings::TYPE_OF_LITERATURE) {
                continue;
            }
            $writings[] = $writing;
        }

        $domains = Domain::getList(Writings::TYPE_OF_LITERATURE);
        $tags = Tag::getList(Writings::TYPE_OF_LITERATURE);

        return $this->render('index', [
            'tag' => $tag,
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }

    public function actionDomain($id)
    {
        $domain = Domain::findOne(['id' => $id, 'type' => Writings::TYPE_OF_LITERATURE]);

        if (!$domain) {
            $this->redirect('/');
        }

        $writings = Writings::getList(Writings::TYPE_OF_LITERATURE, $id);
        $domains = Domain::getList(Writings::TYPE_OF_LITERATURE);
        $tags = Tag::getList(Writings::TYPE_OF_LITERATURE);

        return $this->render('index', [
            'tag' => $domain,
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }


}