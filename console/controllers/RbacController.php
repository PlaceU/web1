<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // add "manageOrganization" permission
        $manageOrganization = $auth->createPermission('manageOrganization');
        $manageOrganization->description = 'Manage Organization';
        $auth->add($manageOrganization);

        // add "orgMember" role and give this role the "manageOrganization" permission
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $manageOrganization);

        // add "manageUser" permission
        $manageUser = $auth->createPermission('manageUser');
        $manageUser->description = 'Manage User';
        $auth->add($manageUser);

        // add "admin" role and give this role the "manageUser" permission
        // as well as the permissions of the "manageOrganization" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $manageOrganization);
        $auth->addChild($admin, $manageUser);

        // Assign role to users 1. IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 1);
    }
}