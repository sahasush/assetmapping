<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Faculty Entity
 *
 * @property int $Faculty_ID
 * @property string $Faculty_Fname
 * @property string $Faculty_Lname
 * @property string $Faculty_MInitial
 * @property string $Email
 * @property string $CSU
 * @property string $Position
 * @property string $Dept_Affiliation
 * @property string $Address_Line_1
 * @property string $Building_Room
 * @property string $Address_Line_2
 * @property string $Phone_1
 * @property string $Phone_1_Ext
 * @property string $Phone_2
 * @property string $Phone_2_Desc
 * @property string $Expertise
 * @property string $Degree
 * @property string $Degree_Discip
 * @property string $Other
 * @property string $Sources
 * @property string $Validation
 * @property string $Validation_Source
 * @property string $Valid_Exist
 */
class Faculty extends Entity
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
        'Faculty_ID' => false
    ];
}
