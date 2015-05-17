<?php

namespace frontend\controllers;

use common\models\AjaxResponse;
use common\models\Domain;
use common\models\Relationship;
use common\models\Tag;
use common\models\Writings;
use yii\web\Controller;

class LiteratureController extends Controller
{

    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        $writings = Writings::find()
            ->where(['type' => Writings::TYPE_OF_LITERATURE])
            ->orderBy(['created_at' => 'DESC'])
            ->all();

        $domains = Domain::find()
            ->where(['type' => Writings::TYPE_OF_LITERATURE])
            ->with('writings')
            ->all();

        $tags = Tag::find()
            ->where(['type' => Writings::TYPE_OF_LITERATURE])
            ->with('relationships')
            ->all();


        return $this->render('index', [
            'tag' => '',
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }

    public function actionView($id)
    {
        $writing = Writings::findOne([
            'id' => $id,
            'type' => Writings::TYPE_OF_LITERATURE,
        ]);

        $domains = Domain::find()
            ->where(['type' => Writings::TYPE_OF_LITERATURE])
            ->with('writings')
            ->all();

        $tags = Tag::find()
            ->where(['type' => Writings::TYPE_OF_LITERATURE])
            ->with('relationships')
            ->all();

        return $this->render('view', [
            'tags' => $tags,
            'domains' => $domains,
            'writing' => $writing,
        ]);
    }

    public function actionTag($id)
    {
        $tag = Tag::findOne([
            'id' => $id,
            'type' => Writings::TYPE_OF_LITERATURE
        ]);

        $relationships = Relationship::find()
            ->where(['tag_id' => $id])
            ->with('writings')
            ->all();

        $writings = [];
        foreach ($relationships as $relationship) {
            $writing = $relationship->writings;
            if ($writing->type != Writings::TYPE_OF_LITERATURE) {
                continue;
            }
            $writings[] = $writing;
        }


        $domains = Domain::find()
            ->where(['type' => Writings::TYPE_OF_LITERATURE])
            ->with('writings')
            ->all();

        $tags = Tag::find()
            ->where(['type' => Writings::TYPE_OF_LITERATURE])
            ->with('relationships')
            ->all();


        return $this->render('index', [
            'tag' => $tag,
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }

    public function actionDomain($id)
    {
        $domain = Domain::findOne([
            'id' => $id,
            'type' => Writings::TYPE_OF_LITERATURE
        ]);

        $writings = Writings::find()
            ->where([
                'type' => Writings::TYPE_OF_LITERATURE,
                'domain_id' => $id,
            ])->all();


        $domains = Domain::find()
            ->where(['type' => Writings::TYPE_OF_LITERATURE])
            ->with('writings')
            ->all();

        $tags = Tag::find()
            ->where(['type' => Writings::TYPE_OF_LITERATURE])
            ->with('relationships')
            ->all();


        return $this->render('index', [
            'tag' => $domain,
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }


}