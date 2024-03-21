<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Task".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $assigned_to
 * @property int $order
 */
class Task extends \yii\db\ActiveRecord
{
    public $order;

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () {
                    return time(); // Or use Yii::$app->formatter->asTimestamp(date('Y-m-d H:i:s'));
                },
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
            [['assigned_to', 'order'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'assigned_to' => 'Assigned To',
            'order' => 'Order',
        ];
    }

    public function getAssigne()
    {
        return $this->hasOne(User::class, ['id' => 'assigned_to']);
    }
}
