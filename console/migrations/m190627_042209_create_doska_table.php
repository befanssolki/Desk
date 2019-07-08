<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%doska}}`.
 */
class m190627_042209_create_doska_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%doska}}', [
            'id_doska' => $this->primaryKey(),
            'id_profile' => $this->integer(),
            'header' => $this->string()->notNull(),
            'category' => $this->string()->notNull(),
            'price' => $this->string()->notNull(),
            'photo' => $this->string()->notNull(),
            'date_pub' => $this->timestamp(),
            'about' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%doska}}');
    }
}
