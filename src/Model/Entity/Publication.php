<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Publication Entity
 *
 * @property int $Publications_ID
 * @property string $Publication_Name
 * @property string $Faculty_LName
 * @property string $Faculty_FName
 * @property string $Faculty_MInitial
 * @property string $CSU
 * @property string $Author_1_LName
 * @property string $Author_1_FName
 * @property string $Author_1_MInitial
 * @property string $Author_Name_2
 * @property string $Author_Name_3
 * @property string $Journal
 * @property string $Published_Yr
 * @property string $Database_Accessed
 * @property string $Other
 * @property string $Sources
 * @property string $Validation
 * @property string $Validation_Source
 * @property string $Valid_Exist
 */
class Publication extends Entity
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
        'Publications_ID' => false
    ];
}
