<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblColPermissionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblColPermissionTable Test Case
 */
class TblColPermissionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblColPermissionTable
     */
    public $TblColPermission;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tbl_col_permission',
        'app.tbl_col_perms',
        'app.roles',
        'app.users',
        'app.users_role_junction',
        'app.role_junctions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TblColPermission') ? [] : ['className' => 'App\Model\Table\TblColPermissionTable'];
        $this->TblColPermission = TableRegistry::get('TblColPermission', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TblColPermission);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
