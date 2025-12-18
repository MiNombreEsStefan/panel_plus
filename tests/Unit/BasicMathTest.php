<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class BasicMathTest extends TestCase
{
    public function test_one_plus_one_is_two(): void
    {
        $this->assertEquals(2, 1 + 1);
    }
}
