<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected array $safeParams = [];

    protected array $columnMap = [];

    protected array $operatorMap = [];

    protected array $convertParams = [];

    public function transform(Request $request)
    {
        $eloquentQuery = [];

        foreach ($this->safeParams as $param => $operators) {
            $queryParam = $request->query($param);

            if (!isset($queryParam)) continue;

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($queryParam[$operator])) {
                    if (isset($this->convertParams[$column])) {
                        $columnValue = $this->getConvertableVal($this->convertParams[$column], $queryParam[$operator]);
                    } else $columnValue = $queryParam[$operator];
                    $eloquentQuery[] = [$column, $this->operatorMap[$operator], $columnValue];
                }
            }
        }

        return $eloquentQuery;

    }

    private function getConvertableVal(\Closure $closure, mixed $convertable_val): mixed
    {
        return $closure($convertable_val);
    }

}
