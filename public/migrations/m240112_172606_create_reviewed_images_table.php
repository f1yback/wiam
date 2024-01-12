<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reviewed_images}}`.
 */
class m240112_172606_create_reviewed_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reviewed_images}}', [
            'id' => $this->primaryKey(),
            'image_id' => $this->integer()->notNull(),
            'status' => $this->tinyInteger()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reviewed_images}}');
    }
}
