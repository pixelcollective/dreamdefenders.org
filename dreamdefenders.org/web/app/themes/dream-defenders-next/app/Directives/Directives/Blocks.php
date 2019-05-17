<?php

namespace App\Directives;

use function \Roots\view;

return [
    [
        'directive' => 'blocks',
        'expression' => function () {
            return "<?php if(\$block) { ?>";
        },
    ],
    [
        'directive' => 'endblocks',
        'expression' => function () {
            return "<?php } ?>";
        },
    ],
    [
        'directive' => 'block',
        'expression' => function ($expression) {
            return '<?php if($block->name == \''. $expression .'\') { print \Roots\view(\'blocks.'. $expression .'\', [\'block\' => $block]); } ?>';
        },
    ],
];
