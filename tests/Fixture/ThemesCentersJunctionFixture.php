<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ThemesCentersJunctionFixture
 *
 */
class ThemesCentersJunctionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'themes_centers_junction';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Themes_Centers_Junction_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Labs_Centers_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Themes_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'Labs_CentersThemes_Centers_Junction' => ['type' => 'index', 'columns' => ['Labs_Centers_ID'], 'length' => []],
            'ThemesThemes_Centers_Junction' => ['type' => 'index', 'columns' => ['Themes_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Themes_Centers_Junction_ID'], 'length' => []],
            'Labs_CentersThemes_Centers_Junction' => ['type' => 'foreign', 'columns' => ['Labs_Centers_ID'], 'references' => ['labs_centers', 'Labs_Centers_ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'ThemesThemes_Centers_Junction' => ['type' => 'foreign', 'columns' => ['Themes_ID'], 'references' => ['themes', 'Themes_ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'Themes_Centers_Junction_ID' => 1,
            'Labs_Centers_ID' => 1,
            'Themes_ID' => 1
        ],
    ];
}
