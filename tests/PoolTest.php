<?php

namespace ExamenRecuVvs\Test;

use ExamenRecuVvs\Pool;
use PHPUnit\Framework\TestCase;

class PoolTest extends TestCase
{
    /**
     * @test
     */
    public function givenABetThatExistWithTheCorrectFormatReturnsThePool()
    {
        // Arrange
        $fakeResult = new FakeResults(['españa-brasil' => 1]);
        $pool = new Pool($fakeResult);

        // Act
        $result = $pool->handle('apostar españa-brasil: 1');

        // Assert
        $this->assertEquals('españa-brasil: 1', $result);
    }
}
