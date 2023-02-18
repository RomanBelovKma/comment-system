<?php

namespace app\components;

use app\models\Comment;
use app\widgets\CommentWidget;

class CommentTree
{
    /** @var array Комменты разбитые на массивы по p_id */
    protected array $comments = [];

    /** @var string Полное Html дерево с коментами */
    protected string $html = '';

    /**
     * @return string
     * @throws \Throwable
     */
    public function getTree()
    {
        $this->comments = $this->getAllComments();
        $this->recursiveTree(0, 0);
        return $this->html;
    }

    /**
     * @return array
     */
    protected function getAllComments(): array
    {
        $result = [];
        $comments = Comment::find()->asArray()->all();
        foreach ($comments as $comment) {
            $key = $comment['p_id'];
            $result[$key][] = $comment;
        }
        return $result;
    }

    /**
     * @param int $pId
     * @param int $level
     * @throws \Throwable
     */
    protected function recursiveTree(int $pId, int $level)
    {
        $comments = $this->comments;
        if (isset($comments[$pId])) {
            foreach ($comments[$pId] as $comment) {
                $this->html .= CommentWidget::widget(['comment' => $comment, 'level' => $level]);
                $level++;
                $pId = $comment['id'];
                $this->recursiveTree($pId, $level);
                $level--;
            }
        }
    }
}