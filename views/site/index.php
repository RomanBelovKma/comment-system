<?php

/** @var yii\web\View $this */
/** @var \app\models\Comment[] $comments */

use app\widgets\CommentFormWidget;

$this->title = 'Comments system';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent p-b-40">
        <h1 class="display-4">Congratulations!</h1>
        <p class="lead">Хотите оставить свой коментарий?</p>
        <?= CommentFormWidget::widget()?>
    </div>

    <div class="body-content">
        <div class="row" id="js-paste-comments">
            <?php echo $comments;?>
        </div>
    </div>

</div>