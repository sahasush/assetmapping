<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TblColPermission Entity
 *
 * @property int $tbl_col_perm_id
 * @property string $table_name
 * @property string $col_name
 * @property int $role_id
 *
 * @property \App\Model\Entity\TblColPerm $tbl_col_perm
 * @property \App\Model\Entity\Role $role
 */
class TblColPermission extends Entity
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
        'tbl_col_perm_id' => false
    ];
}
