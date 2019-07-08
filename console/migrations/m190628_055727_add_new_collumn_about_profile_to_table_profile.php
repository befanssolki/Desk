<?php

use yii\db\Migration;

/**
 * Class m190628_055727_add_new_collumn_about_profile_to_table_profile
 */
class m190628_055727_add_new_collumn_about_profile_to_table_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'about_profile', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190628_055727_add_new_collumn_about_profile_to_table_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190628_055727_add_new_collumn_about_profile_to_table_profile cannot be reverted.\n";

        return false;
    }
    */
}
