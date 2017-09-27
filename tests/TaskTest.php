<?php

namespace Tests;

use Bavix\Gearman\Task;
use Bavix\Tests\Unit;

class TaskTest extends Unit
{

    public function testName()
    {
        $this->assertSame(
            Task::getName(__FUNCTION__),
            dirname(__DIR__) . '/src/Gearman/Task.php' . __FUNCTION__
        );
    }

}
