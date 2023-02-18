<?php

/** @var \yii\web\View $this */
/** @var array $comment */
/** @var string $style */

use app\models\Comment;
?>

<div class="card m-b-20" style="<?= $style?>">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <div class="i-block">
                    <div class="btn btn-dark btn-sm js-reply"
                         data-bs-toggle="modal"
                         data-bs-target="#w0"
                         data-comment-id="<?= $comment['id']?>"
                    >
                        <span class="card-author"><?= $comment['author']?></span>:
                    </div>
                    <?php if (Comment::isEditable($comment['editable_to'])) : ?>
                        <div class="btn btn-warning btn-sm js-edit"
                             data-bs-toggle="modal"
                             data-bs-target="#w0"
                             data-comment-id="<?= $comment['id']?>"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                        </div>
                    <?php endif;?>
                </div>

            </div>
            <div class="col-sm-10">
                <p class="card-text"><?= $comment['text']?></p>
            </div>
        </div>

    </div>
</div>
