<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ThemesDegreesJunctionFixture
 *
 */
class ThemesDegreesJunctionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'themes_degrees_junction';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Themes_Degrees_Junction_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Themes_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Degrees_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'DegreesThemes_Degrees_Junction' => ['type' => 'index', 'columns' => ['Degrees_ID'], 'length' => []],
            'ThemesThemes_Degrees_Junction' => ['type' => 'index', 'columns' => ['Themes_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Themes_Degrees_Junction_ID'], 'length' => []],
            'DegreesThemes_Degrees_Junction' => ['type' => 'foreign', 'columns' => ['Degrees_ID'], 'references' => ['degrees', 'Degrees_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ThemesThemes_Degrees_Junction' => ['type' => 'foreign', 'columns' => ['Themes_ID'], 'references' => ['themes', 'Themes_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'Themes_Degrees_Junction_ID' => 1,
            'Themes_ID' => 1,
            'Degrees_ID' => 1
        ],
    ];
}
