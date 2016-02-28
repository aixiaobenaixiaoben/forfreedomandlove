<?php

namespace frontend\controllers;

use common\models\Domain;
use common\models\Log;
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


    /**
     * display the articles about programing
     * @return string
     */
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

    /**
     * view a particular article about programing
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $writing = Writings::findOne(['id' => $id, 'type' => Writings::TYPE_OF_PROGRAMING,]);

        if (!$writing) {
            $this->goHome();
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

    /**
     * display a variety of article of a particular tag
     * @param $id
     * @return string
     */
    public function actionTag($id)
    {
        /**@var Tag $tag */
        $tag = Tag::findOne(['id' => $id, 'type' => Writings::TYPE_OF_PROGRAMING]);

        if (!$tag) {
            $this->goHome();
        }

        $relationships = $tag->relationships;
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

    /**
     * display a variety of articles of a particular domain
     * @param $id
     * @return string
     */
    public function actionDomain($id)
    {
        $domain = Domain::findOne(['id' => $id, 'type' => Writings::TYPE_OF_PROGRAMING]);

        if (!$domain) {
            $this->goHome();
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