<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersRoleJunctionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersRoleJunctionTable Test Case
 */
class UsersRoleJunctionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersRoleJunctionTable
     */
    public $UsersRoleJunction;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_role_junction',
        'app.role_junctions',
        'app.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersRoleJunction') ? [] : ['className' => 'App\Model\Table\UsersRoleJunctionTable'];
        $this->UsersRoleJunction = TableRegistry::get('UsersRoleJunction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersRoleJunction);

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
