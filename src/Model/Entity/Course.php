<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $Courses_ID
 * @property string $Course_Title
 * @property string $Course_Abbr
 * @property string $Course_Number
 * @property float $Units
 * @property string $Catalog_Link
 * @property string $Other
 * @property string $Sources
 * @property int $University_ID
 * @property int $Departments_ID
 */
class Course extends Entity
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
        'Courses_ID' => false
    ];
}
