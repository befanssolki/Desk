<?php

use yii\db\Migration;

/**
 * Class m190705_042301_add_new_collumn_category_name_to_table_category
 */
class m190705_042301_add_new_collumn_category_name_to_table_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('category', 'category_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190705_042301_add_new_collumn_category_name_to_table_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190705_042301_add_new_collumn_category_name_to_table_category cannot be reverted.\n";

        return false;
    }
    */
}
