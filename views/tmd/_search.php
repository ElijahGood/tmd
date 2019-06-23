<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TmdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'msg') ?>

    <?= $form->field($model, 'device_type') ?>

    <?= $form->field($model, 'device_brand') ?>

    <?php // echo $form->field($model, 'device_name') ?>

    <?php // echo $form->field($model, 'user_browser') ?>

    <?php // echo $form->field($model, 'user_os') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
