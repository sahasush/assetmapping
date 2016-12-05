<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ThemesCoursesJunctionFixture
 *
 */
class ThemesCoursesJunctionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'themes_courses_junction';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Themes_Courses_Junction_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Themes_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Courses_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'CoursesThemes_Courses_Junction' => ['type' => 'index', 'columns' => ['Courses_ID'], 'length' => []],
            'ThemesThemes_Courses_Junction' => ['type' => 'index', 'columns' => ['Themes_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Themes_Courses_Junction_ID'], 'length' => []],
            'CoursesThemes_Courses_Junction' => ['type' => 'foreign', 'columns' => ['Courses_ID'], 'references' => ['courses', 'Courses_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ThemesThemes_Courses_Junction' => ['type' => 'foreign', 'columns' => ['Themes_ID'], 'references' => ['themes', 'Themes_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'Themes_Courses_Junction_ID' => 1,
            'Themes_ID' => 1,
            'Courses_ID' => 1
        ],
    ];
}
