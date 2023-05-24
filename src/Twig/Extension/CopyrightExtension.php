<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\CopyrightExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CopyrightExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('copyright', [CopyrightExtensionRuntime::class, 'printCopyright'], ['is_safe' => ['html']]),
        ];
    }
}
