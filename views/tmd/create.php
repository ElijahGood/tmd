<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tmd */

$this->title = 'Create Tmd';
$this->params['breadcrumbs'][] = ['label' => 'Tmds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tmd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
