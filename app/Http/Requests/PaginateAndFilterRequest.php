<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PaginateAndFilterRequest extends BaseRequest
{
    private array $filters;
    private int $page;
    private int $size;

    public function __construct(Request $request)
    {
        $this->filters = $request->input('filters', []);
        $this->page = (int) $request->input('page', 1);
        $this->size = (int) $request->input('size', 25);
    }

    public function getPagination(): array
    {
        return [$this->size, ['*'], 'page', $this->page];
    }

    public function hasFilters(): bool
    {
        return count($this->filters) > 0;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function applyFilters(Builder &$queryBuilder)
    {
        foreach ($this->filters as $column => $value) {
            if (is_null($value)) {
                continue;
            }

            if (is_array($value)) {
                $queryBuilder->whereIn($column, $value);
                continue;
            }

            $queryBuilder->where($column, $value);
        }
    }
}
