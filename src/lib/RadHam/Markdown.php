<?php

namespace RadHam;

use Michelf\MarkdownExtra;

class Markdown
{
    public static function render($filename)
    {
        return MarkdownExtra::defaultTransform(file_get_contents($filename));
    }
}
