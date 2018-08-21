<?php
use yii\db\Migration;

/**
 * Class m180821_160213_init_rbac
 */
class m180821_160213_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $adminPermission = $auth->createPermission('adminPermission');
        $adminPermission->description = 'Everything access';
        $auth->add($adminPermission);

        $editorPermission = $auth->createPermission('editorPermission');
        $editorPermission->description = 'Everything but only user cannot';
        $auth->add($editorPermission);

        $authorPermission = $auth->createPermission('authorPermission');
        $authorPermission->description = 'Everything but only user cannot';
        $auth->add($authorPermission);

        $adminRole = $auth->createRole('adminRole');
        $auth->add($adminRole);
        $auth->addChild($adminRole, $adminPermission);

        $editorRole = $auth->createRole('editorRole');
        $auth->add($editorRole);
        $auth->addChild($editorRole, $editorPermission);

        $authorRole = $auth->createRole('authorRole');
        $auth->add($authorRole);
        $auth->addChild($authorRole, $authorPermission);        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180821_160213_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180821_160213_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
