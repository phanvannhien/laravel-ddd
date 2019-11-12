<?php
declare(strict_types=1);

namespace Fractal\Share\Application;

interface CommandBus
{
    public function subscribe($command, $handler);

    public function handle($command);
}
