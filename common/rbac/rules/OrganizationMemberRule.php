<?php

namespace common\rbac\rules;

use yii\rbac\Rule;
use common\models\User;
use common\models\Organization;
use common\models\OrganizationMember;
/**
 * Checks if authorID matches user passed via params
 */
class OrganizationMemberRule extends Rule
{
    public $name = 'isMember';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['UserID']) && isset($params['UserID']) ? in_array(User::findIdentity($params['UserID']), Organization::findById($params['OrganizationID'])->getUsers()) : false;
    }
}