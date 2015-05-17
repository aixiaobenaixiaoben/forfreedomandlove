<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Writings */

$this->title = 'Create Writings';
$this->params['breadcrumbs'][] = ['label' => 'Writings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="writings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
