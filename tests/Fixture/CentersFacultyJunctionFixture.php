<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CentersFacultyJunctionFixture
 *
 */
class CentersFacultyJunctionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'centers_faculty_junction';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Centers_Faculty_Junction_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Labs_Centers_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Faculty_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FacultyCenters_Faculty_Junction' => ['type' => 'index', 'columns' => ['Faculty_ID'], 'length' => []],
            'Labs_CentersCenters_Faculty_Junction' => ['type' => 'index', 'columns' => ['Labs_Centers_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Centers_Faculty_Junction_ID'], 'length' => []],
            'FacultyCenters_Faculty_Junction' => ['type' => 'foreign', 'columns' => ['Faculty_ID'], 'references' => ['faculty', 'Faculty_ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'Labs_CentersCenters_Faculty_Junction' => ['type' => 'foreign', 'columns' => ['Labs_Centers_ID'], 'references' => ['labs_centers', 'Labs_Centers_ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'Centers_Faculty_Junction_ID' => 1,
            'Labs_Centers_ID' => 1,
            'Faculty_ID' => 1
        ],
    ];
}
