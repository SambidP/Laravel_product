<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class ProductFilter extends ApiFilter{
    protected $safeParms = [
        'name' => ['eq'],
        'display_name' => ['eq'],
        'code' => ['eq','lt','gt','lte','gte'],
    ];

    protected $columnMap = [
        'display_name' => 'display_name',
        'image_path' => 'image_path'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}
