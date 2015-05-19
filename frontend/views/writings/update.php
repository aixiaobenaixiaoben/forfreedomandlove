<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Writings */

$this->title = 'Update Writings: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Writings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="writings-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $model->content = str_replace("<br>", "\n", $model->content) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>