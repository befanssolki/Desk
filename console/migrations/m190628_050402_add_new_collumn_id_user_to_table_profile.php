<?php

use yii\db\Migration;

/**
 * Class m190628_050402_add_new_collumn_id_user_to_table_profile
 */
class m190628_050402_add_new_collumn_id_user_to_table_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'id_user', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190628_050402_add_new_collumn_id_user_to_table_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190628_050402_add_new_collumn_id_user_to_table_profile cannot be reverted.\n";

        return false;
    }
    */
}
