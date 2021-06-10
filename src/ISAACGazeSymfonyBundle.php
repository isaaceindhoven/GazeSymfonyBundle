<?php

declare(strict_types=1);

namespace ISAAC\GazeSymfonyBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use function dirname;

class ISAACGazeSymfonyBundle extends Bundle
{
    public function getPath(): string
    {
        return dirname(__DIR__);
    }
}
