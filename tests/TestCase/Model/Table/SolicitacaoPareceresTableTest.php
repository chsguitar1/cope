<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SolicitacaoPareceresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SolicitacaoPareceresTable Test Case
 */
class SolicitacaoPareceresTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.solicitacao_pareceres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SolicitacaoPareceres') ? [] : ['className' => 'App\Model\Table\SolicitacaoPareceresTable'];
        $this->SolicitacaoPareceres = TableRegistry::get('SolicitacaoPareceres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SolicitacaoPareceres);

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
}
