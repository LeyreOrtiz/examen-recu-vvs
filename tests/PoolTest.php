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
        $fakeResults = new FakeResults(['españa-brasil' => '1']);
        $pool = new Pool($fakeResults);

        // Act
        $result = $pool->handle('apostar españa-brasil 1');

        // Assert
        $this->assertEquals('españa-brasil: 1', $result);
    }

    /**
     * @test
     */
    public function givenABetWithASignThatNotExistsReturnsInvalidSign()
    {
        // Arrange
        $fakeResults = new FakeResults(['españa-brasil' => '1']);
        $pool = new Pool($fakeResults);

        // Act
        $result = $pool->handle('apostar españa-brasil: 3');

        // Assert
        $this->assertEquals('Signo no válido', $result);
    }

    /**
     * @test
     */
    public function givenABetThatExitsReturnsPoolUpdate()
    {
        // Arrange
        $fakeResults = new FakeResults(['españa-brasil' => '1']);
        $pool = new Pool($fakeResults);

        // Act
        $pool->handle('apostar españa-brasil 1');
        $result = $pool->handle('apostar españa-brasil 2');

        // Assert
        $this->assertEquals('españa-brasil: 2', $result);
    }

    /**
     * @test
     */
    public function givenTwoBetsReturnsThatTwoBets()
    {
        // Arrange
        $fakeResults = new FakeResults(['españa-brasil' => '1']);
        $pool = new Pool($fakeResults);

        // Act
        $pool->handle('apostar españa-brasil 1');
        $result = $pool->handle('apostar francia-alemania X');

        // Assert
        $this->assertEquals('españa-brasil: 1, francia-alemania: X', $result);
    }

    /**
     * @test
     */
    public function givenDeleteMatchReturnsPoolWithoutThatMatch()
    {
        // Arrange
        $fakeResults = new FakeResults(['españa-brasil' => '1']);
        $pool = new Pool($fakeResults);

        // Act
        $pool->handle('apostar españa-brasil 1');
        $pool->handle('apostar francia-alemania X');
        $result = $pool->handle('quitar francia-alemania');

        // Assert
        $this->assertEquals('españa-brasil: 1', $result);
    }

    /**
     * @test
     */
    public function givenDeleteMatchThatNotExistsInThePoolReturnsMessage()
    {
        // Arrange
        $fakeResults = new FakeResults(['españa-brasil' => '1']);
        $pool = new Pool($fakeResults);

        // Act
        $pool->handle('apostar españa-brasil 1');
        $result = $pool->handle('quitar francia-alemania');

        // Assert
        $this->assertEquals('La apuesta seleccionada no existe', $result);
    }

    /**
     * @test
     */
    public function givenDeleteMatchThatExistsInThePoolButClearThePoolReturnsMessage()
    {
        // Arrange
        $fakeResults = new FakeResults(['españa-brasil' => '1']);
        $pool = new Pool($fakeResults);

        // Act
        $pool->handle('apostar españa-brasil 1');
        $result = $pool->handle('quitar españa-brasil');

        // Assert
        $this->assertEquals('La quiniela está vacía', $result);
    }
}
