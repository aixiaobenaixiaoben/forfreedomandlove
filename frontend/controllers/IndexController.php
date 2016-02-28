<?php

namespace frontend\controllers;

use common\models\AjaxResponse;
use common\models\Domain;
use common\models\Log;
use common\models\Tag;
use common\models\Writings;
use frontend\models\CreateContactForm;
use Yii;
use yii\web\Controller;

class IndexController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }


    /**
     * default method to redirect to homepage
     */
    public function actionError()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $message = 'Error_Url:' . addslashes($_SERVER['REQUEST_URI']);
            Log::countVisit($message);
        }

        $this->goHome();
    }

    /**
     * home page
     * @return string
     */
    public function actionIndex()
    {
        Log::countVisit('HomePage');

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

    /**
     * display a article
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $writing = Writings::findOne($id);
        if (!$writing) {
            $this->goHome();
        }

        Log::createLog($id);

        $domains = Domain::getList();
        $tags = Tag::getList();

        return $this->render('view', [
            'tags' => $tags,
            'domains' => $domains,
            'writing' => $writing,
        ]);
    }


    /**
     * display a variety of articles of one tag
     * @param $id
     * @return string
     */
    public function actionTag($id)
    {
        /**@var Tag $tag */
        $tag = Tag::findOne($id);
        if (!$tag) {
            $this->goHome();
        }

        $relationships = $tag->relationships;
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

    /**
     * display a variety of articles belonging to a particular domain
     * @param $id
     * @return string
     */
    public function actionDomain($id)
    {
        /** @var Domain $domain */
        $domain = Domain::findOne($id);
        if (!$domain) {
            $this->goHome();
        }
        $writings = $domain->writings;
        $domains = Domain::getList();
        $tags = Tag::getList();

        return $this->render('index', [
            'tag' => $domain,
            'tags' => $tags,
            'domains' => $domains,
            'writings' => $writings,
        ]);
    }

    /**
     * display the page of Contact
     * @return string
     */
    public function actionContact()
    {
        $this->getView()->title = 'Contact';

        if (isset($_GET['res'])) {
            $massage = $_GET['res'];
            $massage = addslashes($massage);
            Log::countVisit($massage);
        }

        $domains = Domain::getList();
        $tags = Tag::getList();

        return $this->render('contact', [
            'tag' => '',
            'tags' => $tags,
            'domains' => $domains,
        ]);
    }

    /**
     * handle the message the visitor submit
     */
    public function actionMessage()
    {
        $form = new CreateContactForm();
        if ($form->load(Yii::$app->request->post(), '') && $form->validate() && $form->save()) {
            AjaxResponse::success();
        }
        AjaxResponse::fail($form->errors);
    }

    /**
     * record the score of the game
     */
    public function actionRecord()
    {
        if (isset($_POST['res'])) {
            $massage = $_POST['res'];
            $massage = addslashes($massage);
            Log::countVisit($massage);
        }
    }
}