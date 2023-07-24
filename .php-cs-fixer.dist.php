<?php
$header = <<<EOF
PHP Package Boilerplate (https://github.com/tomkyle/boilerplate-php)

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/')
    ->exclude(__DIR__ . '/vendor');

return (new PhpCsFixer\Config())->setRules([
    '@PSR12' => true,
    'header_comment' => [
        'comment_type' => 'PHPDoc',
        'header' => $header,
        'location' => 'after_open',
        'separate' => 'both',
    ]
])->setFinder($finder);
