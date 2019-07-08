<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profile}}`.
 */
class m190627_042951_create_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profile}}', [
            'id_profile' => $this->primaryKey(),
            'name_profile' => $this->string()->notNull(),
            'familia_profile' => $this->string()->notNull(),
            'otchestvo_profile' => $this->string()->notNull(),
            'tel' => $this->integer()->notNull(),
            'datereg' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profile}}');
    }
}
