<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class CopyrightExtensionRuntime implements RuntimeExtensionInterface
{
    public function printCopyright()
    {
        $date = date("Y");
        $str = "&copy; $date WF3";

        return $str;
    }
}
