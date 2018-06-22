<?php

namespace Tests;

use App\Utils\AppService;
use PHPUnit\Framework\TestCase;

class AppControllerTest extends TestCase
{
    /**
     * @dataProvider SqrtFuncDP
     */
    public function testSqrtFunc($expected, $real)
    {
        $app = new AppService();

        $real = $app->sqrtFunc($real);

        $this->assertEquals($expected, $real);
    }

    public function SqrtFuncDP()
    {
        return [
            [5, 25],
            [6, 36],
            [2, 5],
        ];
    }
}
