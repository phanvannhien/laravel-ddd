<?php
declare(strict_types=1);

namespace Fractal\Share\Application;

interface Handler
{
    public function handle(Command $command);
}
