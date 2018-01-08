<?php

namespace App\Dao\User;

use App\Dao\BaseDao;

class UserDao  extends BaseDao implements UserDaoInterface
{
    protected $table = 'user';

    public function declares()
    {
        return array(
            'serializes' => array(
                'roles' => 'delimiter',
            ),
            'orderbys' => array(
                'id',
                'createdTime',
                'updatedTime',
                'promotedTime',
                'promoted',
                'promotedSeq',
                'nickname',
            ),
            'timestamps' => array(
                'createdTime',
                'updatedTime',
            ),
            'conditions' => array(
                'mobile = :mobile',
                'promoted = :promoted',
                'roles LIKE :roles',
                'roles = :role',
                'UPPER(nickname) LIKE :nickname',
                'id =: id',
                'id > :id_GT',
                'loginIp = :loginIp',
                'createdIp = :createdIp',
                'approvalStatus = :approvalStatus',
                'UPPER(email) LIKE :email',
                'level = :level',
                'createdTime >= :startTime',
                'createdTime <= :endTime',
                'updatedTime >= :updatedTime_GE',
                'approvalTime >= :startApprovalTime',
                'approvalTime <= :endApprovalTime',
                'loginTime >= :loginStartTime',
                'loginTime <= :loginEndTime',
                'locked = :locked',
                'level >= :greatLevel',
                'UPPER(verifiedMobile) LIKE :verifiedMobile',
                'type LIKE :type',
                'id IN ( :userIds)',
                'inviteCode = :inviteCode',
                'inviteCode != :NoInviteCode',
                'id NOT IN ( :excludeIds )',
                'orgCode PRE_LIKE :likeOrgCode',
                'orgCode = :orgCode',
            ),
        );
    }
}