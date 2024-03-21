<?php

use yii\db\Migration;

/**
 * Class m240227_112507_add_foreign_key_to_task_table
 */
class m240227_112507_add_foreign_key_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'assigned_to' => $this->integer(),
        ]);

        // Add foreign key for assigned_to
        $this->addForeignKey('fk-task-assigned_to', '{{%task}}', 'assigned_to', '{{%users}}', 'id', 'SET NULL', 'CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-task-assigned_to', '{{%task}}');
        $this->dropTable('{{%task}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240227_112507_add_foreign_key_to_task_table cannot be reverted.\n";

        return false;
    }
    */
}
