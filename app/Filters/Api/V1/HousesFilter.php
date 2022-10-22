<?php

namespace App\Filters\Api\V1;

use App\Filters\ApiFilter;
use App\Utils\Currency;
use Closure;
use Illuminate\Http\Request;

class HousesFilter extends ApiFilter
{
    protected array $safeParams = [
        'bedrooms' => ['eq'],
        'bathrooms' => ['eq'],
        'stores' => ['eq'],
        'garages' => ['eq'],
        'minPrice' => ['gte', 'gt'],
        'maxPrice' => ['lte', 'lt']
    ];

    protected array $columnMap = [
        'minPrice' => 'price',
        'maxPrice' => 'price'
    ];

    protected array $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='
    ];

    /** @var array<string, Closure> */
    protected array $convertParams = [];

    public function __construct()
    {
        $this->convertParams['price'] = fn(float $v) => Currency::convertRaw($v);
    }


    public function transform(Request $request)
    {
        $queryData = parent::transform($request);
        if (!empty($request->query('search'))) {
            $searchVal = $request->query('search');
            $searchLikeVal = '%' . $searchVal . '%';
            $queryData[] = ['name', 'like', $searchLikeVal];
        }
        return $queryData;
    }


}
