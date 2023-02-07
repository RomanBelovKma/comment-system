<?php

use yii\db\Migration;

/**
 * Class m230207_145357_create_comments
 */
class m230207_145357_create_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // ToDo * я не стал делать  таблицу user, авторизацию, регистрацию итд... В задаче сказано простое решение. Усложнять не стал
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'p_id' => $this->integer()->null()->comment('Ссылка на родительский коммент если он есть'),
            'text' => $this->string(),
            'author' => $this->string()->comment('Имя автора'), // ToDo *
            'editable_to' => $this->integer()->comment('Время до которого можно редактировать коммент'),
            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'updated_at' => 'TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP()',
        ]);

        $this->createIndex('index__comment__p_id', 'comment', 'p_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
