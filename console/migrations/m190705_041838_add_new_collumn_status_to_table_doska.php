<?php

use yii\db\Migration;

/**
 * Class m190705_041838_add_new_collumn_status_to_table_doska
 */
class m190705_041838_add_new_collumn_status_to_table_doska extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('doska', 'status', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190705_041838_add_new_collumn_status_to_table_doska cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190705_041838_add_new_collumn_status_to_table_doska cannot be reverted.\n";

        return false;
    }
    */
}
