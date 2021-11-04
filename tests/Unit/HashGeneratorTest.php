<?php

namespace Tests\Unit;

use App\Services\HashGeneratorService;
use Tests\TestCase;

class HashGeneratorTest extends TestCase
{
    public function testLowNumberEncodeAndDecode()
    {
        $status = true;
        for ($i = 0; $i < 10; $i++)
        {
            $hash = HashGeneratorService::encode($i);
            if($i != HashGeneratorService::decode($hash))
            {
                $status = false;
                break;
            }
        }
        $this->assertTrue($status);
    }

    public function testHighNumberEncodeAndDecode()
    {
        $status = true;
        for ($i = 0; $i < 100; $i++)
        {
            $id = rand(0,1000000);
            $hash = HashGeneratorService::encode($id);
            if($id != HashGeneratorService::decode($hash))
            {
                $status = false;
                break;
            }
        }
        $this->assertTrue($status);
    }
}
