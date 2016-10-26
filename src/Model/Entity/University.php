<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * University Entity
 *
 * @property int $University_ID
 * @property string $University
 * @property string $Addrss_Line_1
 * @property string $Addrss_Line_2
 */
class University extends Entity
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
        'University_ID' => false
    ];
}
