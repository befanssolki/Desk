<?php

use yii\db\Migration;

/**
 * Class m190628_054654_add_new_collumn_city_to_table_profile
 */
class m190628_054654_add_new_collumn_city_to_table_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'city', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190628_054654_add_new_collumn_city_to_table_profile cannyiot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190628_054654_add_new_collumn_city_to_table_profile cannot be reverted.\n";

        return false;
    }
    */
}
