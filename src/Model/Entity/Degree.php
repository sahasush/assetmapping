<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Degree Entity
 *
 * @property int $Degrees_ID
 * @property string $Description
 * @property string $Degree_Level
 * @property string $Program_Name
 * @property string $Other
 * @property string $Sources
 */
class Degree extends Entity
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
        'Degrees_ID' => false
    ];
}
