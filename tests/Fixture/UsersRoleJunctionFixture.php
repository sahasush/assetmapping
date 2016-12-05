<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersRoleJunctionFixture
 *
 */
class UsersRoleJunctionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'users_role_junction';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'role_junction_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'roles_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_users_role_junction_users_id' => ['type' => 'index', 'columns' => ['id'], 'length' => []],
            'FK_users_role_junction_roles_role_id' => ['type' => 'index', 'columns' => ['roles_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['role_junction_id'], 'length' => []],
            'FK_users_role_junction_roles_role_id' => ['type' => 'foreign', 'columns' => ['roles_id'], 'references' => ['roles', 'role_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_users_role_junction_users_id' => ['type' => 'foreign', 'columns' => ['id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
            'role_junction_id' => 1,
            'id' => 1,
            'roles_id' => 1
        ],
    ];
}
