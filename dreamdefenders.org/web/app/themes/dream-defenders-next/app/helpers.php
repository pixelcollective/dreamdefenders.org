<?php

namespace App;

function svg_image($icon, $class = '', $attrs = [])
{
    echo app('BladeSvg\SvgFactory')->svg($icon, $class, $attrs)->toHtml();
}
