<?php


namespace Redis\Client\Adapter;


use Redis\Client;

class NullClientAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testThatANullClientAlwaysLooksDisconnected()
    {
        $clientAdapter = new NullClientAdapter();
        $clientAdapter->connect();

        $this->assertEquals(true, $clientAdapter->isConnected(), 'Connected flag on null adapter is updated after connecting');
    }

    public function testThatTheMasterReturnedIsCorrectType()
    {
        $clientAdapter = new NullClientAdapter();
        $master = $clientAdapter->getMaster('test');

        $this->assertInstanceOf('\\Redis\\Client', $master, 'The master returned should be a \\Redis\\Client instance');
    }

    public function testThatTheRoleIsAlwaysSentinel()
    {
        $clientAdapter = new NullClientAdapter();
        $this->assertEquals(Client::ROLE_SENTINEL, $clientAdapter->getRole(), 'The role is always sentinel');
    }
}
 