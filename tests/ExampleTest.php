<?php

namespace ExamenRecuVvs\Test;

use ExamenRecuVvs\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function testExample()
    {
        // Arrange
        $example = new Example();
        // Act
        $result = $example->hello();
        // Assert
        $this->assertEquals('Hello World!', $result);
    }
}
