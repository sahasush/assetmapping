<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Grant Entity
 *
 * @property int $Grants_ID
 * @property string $Center_Name
 * @property string $CSU
 * @property string $Grant_Project_Title
 * @property string $Research_Obj
 * @property string $Grantor
 * @property float $Grant_Amount
 * @property string $Effective_Yr
 * @property string $Effective_Mo
 * @property string $Expiration_Yr
 * @property string $Expiration_Mo
 * @property string $PI_Fname
 * @property string $PI_Lname
 * @property string $PI_MInitial
 * @property string $Other
 * @property string $Sources
 * @property string $Validation
 * @property string $Validation_Source
 * @property string $Valid_Exist
 */
class Grant extends Entity
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
        'Grants_ID' => false
    ];
}
