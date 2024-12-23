<?php

namespace Tests\Unit;

use App\app\Http\Service\ImmobileService;
use PHPUnit\Framework\TestCase;

class ImmobileTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $itest = ImmobileService::readXmlAndSaveToDatabase();
        $this->assertTrue(true);
    }
}
