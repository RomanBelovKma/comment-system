<?php

/** @var \yii\web\View $this */
/** @var \app\models\Comment $comment */

use app\assets\AjaxCommentAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Modal;

AjaxCommentAsset::register($this);
?>

<?php
Modal::begin([
    'title' => 'Оставить комментарий',
    'toggleButton' => [
        'label' => 'Оставить комментарий',
        'class' => 'btn btn-lg btn-success js-main-comment'],
    'size' => Modal::SIZE_LARGE,
]);

    $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'action' => ['/site/add-comment'],
        'method' => 'POST',
        'class' => 'form-horizontal',
        'id' => 'js-commentForm'
    ]); ?>

    <?= $form->field($comment, 'text')->textInput(['autofocus' => true, 'id' => 'js-text']) ?>
    <?= $form->field($comment, 'author')->textInput(['id' => 'js-author']) ?>
    <?= $form->field($comment, 'p_id')->hiddenInput(['id' => 'js-p_id'])->label(false) ?>
    <input type="hidden" name="edit-comment-id" value="" id="js-id">

    <div class="form-group">
        <a href="#" class="btn btn-primary" id="js-btnCommentSend">Отправить</a>
    </div>

    <?php ActiveForm::end(); ?>

<?php Modal::end();?>
