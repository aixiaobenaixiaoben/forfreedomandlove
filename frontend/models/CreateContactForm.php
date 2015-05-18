<?php

namespace frontend\models;

use common\models\Message;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CreateContactForm extends Model
{
    public $name;
    public $email;
    public $title;
    public $content;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
            [['title', 'content', 'name'], 'string'],
            [['content'], 'filter', 'filter' => ['\yii\helpers\HtmlPurifier', 'process']],
            [['title', 'content'], 'safe']
        ];
    }

    public function save()
    {
        $message = new Message();
        $message->name = $this->name;
        $message->email = $this->email;
        $message->title = $this->title;
        $message->message = $this->content;
        if ($message->save()) {
            return true;
        }
        return false;
    }
}
