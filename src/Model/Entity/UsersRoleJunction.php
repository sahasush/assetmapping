<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersRoleJunction Entity
 *
 * @property int $role_junction_id
 * @property int $id
 * @property int $roles_id
 *
 * @property \App\Model\Entity\RoleJunction $role_junction
 * @property \App\Model\Entity\Role $role
 */
class UsersRoleJunction extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'role_junction_id' => false
    ];
}
