<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Equipment Entity
 *
 * @property int $Equipment_ID
 * @property string $Center_Name
 * @property string $CSU
 * @property string $Brand
 * @property string $Model
 * @property string $Type
 * @property string $Serial_Number
 * @property string $Description
 * @property string $Condition
 * @property string $Public_Access
 * @property string $Ownrshp_Status
 * @property string $Other
 * @property string $Sources
 * @property string $Validation
 * @property string $Validation_Source
 * @property string $Valid_Exist
 * @property int $Lab_Centers_ID
 */
class Equipment extends Entity
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
        'Equipment_ID' => false
    ];
}
