<?php

namespace app\widgets;

use yii\base\Widget;

class CommentWidget extends Widget
{
    public array $comment;
    public int $level;

    public function run()
    {
        $num = $this->level * 50;
        $style = "margin-left: {$num}px";
        return $this->render('comment', [
            'comment' => $this->comment,
            'style' => $style
        ]);
    }
}