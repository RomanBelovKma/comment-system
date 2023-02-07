<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int|null $p_id Ссылка на родительский коммент если он есть
 * @property string|null $text
 * @property string|null $author Имя автора
 * @property int|null $editable_to Время до которого можно редактировать коммент
 * @property string $created_at
 * @property string|null $updated_at
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_id', 'editable_to'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['text', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'p_id' => 'P ID',
            'text' => 'Text',
            'author' => 'Author',
            'editable_to' => 'Editable To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert)
    {
        $this->editable_to = time() + (60 * 60);
        return parent::beforeSave($insert);
    }
}
