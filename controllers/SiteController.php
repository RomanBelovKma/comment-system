<?php

namespace app\controllers;

use Yii;
use app\models\Comment;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     * @throws \Throwable
     */
    public function actionIndex()
    {
        $comments = (new Comment())->getTree();
        return $this->render('index', [
            'comments' => $comments
        ]);
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function actionAddComment()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $comment = new Comment();
        if ($comment->load(Yii::$app->request->post())) {
            if ($comment->save()) {
                $html = Comment::getTree();
                return [
                    'success' => true,
                    'errors' => false,
                    'html' => $html
                ];
            }
        }
        return [
            'success' => false,
            'errors' => $comment->firstErrors,
            'html' => false
        ];
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function actionEditComment()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->post('edit-comment-id');
        $comment = Comment::find()->where(['id' => $id])->one();

        if ($comment->load(Yii::$app->request->post()) && $comment->save()) {
            $html = Comment::getTree();
            return [
                'success' => true,
                'errors' => false,
                'html' => $html
            ];
        }
        return [
            'success' => false,
            'errors' => $comment->firstErrors,
            'html' => false
        ];
    }
}
