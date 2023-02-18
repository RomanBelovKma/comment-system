<?php

namespace app\widgets;

use app\models\Comment;
use yii\base\Widget;

class CommentFormWidget extends Widget
{
    public function run()
    {
        return $this->render('commentForm', ['comment' => new Comment()]);
    }
}