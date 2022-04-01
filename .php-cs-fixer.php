<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->notPath('bootstrap/*')
    ->notPath('storage/*')
    ->notPath('vendor')
    ->in([
        __DIR__.'/app',
        __DIR__.'/tests',
        __DIR__.'/database',
        __DIR__.'/routes',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new PhpCsFixer\Config();

return $config->setRiskyAllowed(true)->setRules([
    '@PHP80Migration'                => true,
    '@PHP81Migration'                => true,
    '@PSR12'                         => true,
    '@PhpCsFixer'                    => true,
    'operator_linebreak'             => ['only_booleans' => true],
    'array_indentation'              => true,
    'array_push'                     => true,
    'array_syntax'                   => ['syntax' => 'short'],
    'blank_line_before_statement'    => ['statements' => ['break', 'continue', 'declare', 'for', 'foreach', 'if', 'phpdoc', 'return', 'switch', 'throw', 'try', 'try', 'while']],
    'class_attributes_separation'    => ['elements' => ['method' => 'one']],
    'clean_namespace'                => true,
    'combine_consecutive_issets'     => true,
    'mb_str_functions'               => true,
    'no_alternative_syntax'          => true,
    'no_blank_lines_after_phpdoc'    => true,
    'no_empty_phpdoc'                => true,
    'no_superfluous_phpdoc_tags'     => true,
    'no_unused_imports'              => true,
    'no_useless_else'                => true,
    'no_useless_return'              => true,
    'ordered_imports'                => ['sort_algorithm' => 'alpha'],
    'php_unit_construct'             => true,
    'php_unit_dedicate_assert'       => true,
    'php_unit_method_casing'         => ['case' => 'snake_case'],
    'php_unit_test_annotation'       => ['style' => 'annotation'],
    'phpdoc_indent'                  => true,
    'phpdoc_line_span'               => true,
    'phpdoc_scalar'                  => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_summary'                 => true,
    'phpdoc_trim'                    => true,
    'phpdoc_var_without_name'        => true,
    'random_api_migration'           => true,
    'simplified_if_return'           => true,
    'single_line_comment_style'      => true,
    'single_quote'                   => true,
    'ternary_operator_spaces'        => true,
    'ternary_to_null_coalescing'     => true,
    'trailing_comma_in_multiline'    => true,
    'trim_array_spaces'              => true,
    'unary_operator_spaces'          => true,
    'yoda_style'                     => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
    //align array
    'binary_operator_spaces' => [
        'default'   => 'single_space',
        'operators' => ['=>' => 'align_single_space_minimal'],
    ],
    //remove semicolon
    'multiline_whitespace_before_semicolons' => false,
    'phpdoc_types_order'                     => ['null_adjustment' => 'always_last', 'sort_algorithm' => 'none'],
    'php_unit_test_class_requires_covers'    => false,
    'php_unit_internal_class'                => false,
])->setFinder($finder);
