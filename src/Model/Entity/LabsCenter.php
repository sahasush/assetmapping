<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LabsCenter Entity
 *
 * @property int $Labs_Centers_ID
 * @property string $Center_Type
 * @property string $Center_Name
 * @property string $Research_Area
 * @property string $Estbl_Yr
 * @property string $Active_Status
 * @property string $Contact_1_Lname
 * @property string $Contact_1_Fname
 * @property string $Contact_1_Minitial
 * @property string $Contact_2_Lname
 * @property string $Contact_2_Fname
 * @property string $Contact_2_Minitial
 * @property string $No_of_Researchers
 * @property string $No_of_Technicians
 * @property string $Lab_Accreditation
 * @property string $Time_of_Operation
 * @property string $Email
 * @property string $Address_1
 * @property string $Building_Room
 * @property string $Address_2
 * @property string $Phone_1
 * @property string $Phone_1_Ext
 * @property string $Phone_2
 * @property string $Phone_2_Desc
 * @property string $Web_URL
 * @property string $Other
 * @property string $Sources
 * @property string $Validation
 * @property string $Validation_Source
 * @property string $Valid_Exist
 * @property int $University_ID
 * @property int $Colleges_ID
 * @property int $Departments_ID
 */
class LabsCenter extends Entity
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
        'Labs_Centers_ID' => false
    ];
}
