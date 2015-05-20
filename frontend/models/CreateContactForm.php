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
        $transaction = Yii::$app->db->beginTransaction();

        $message = new Message();
        $message->name = $this->name;
        $message->email = $this->email;
        $message->title = $this->title;
        $message->message = $this->content;

        $message_res = $message->save();

        $mail_title = $message->title . '---' . $message->name;
        $mail_content = "<br><br>" . 'Name:' . $message->name;
        $mail_content .= "<br>" . 'Email:' . $message->email;
        $mail_content .= "<br>" . 'Title:' . $message->title;
        $mail_content .= "<br>" . 'Message:' . $message->message . "<br><br><br><br>";


        $mail_res = Yii::$app->mailer->compose()
            ->setTo($message->email)
            ->setSubject($mail_title)
            ->setHtmlBody($mail_content)
            ->send();

        if ($message_res && $mail_res) {
            $transaction->commit();
            return true;
        }

        return false;
    }
}
