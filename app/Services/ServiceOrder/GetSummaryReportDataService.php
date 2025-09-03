<?php

namespace App\Services\ServiceOrder;

use App\Repositories\Contracts\ServiceOrderRepositoryInterface;

class GetSummaryReportDataService
{
    public function __construct(
        protected ServiceOrderRepositoryInterface $repository
    ) {}

    public function get(): array
    {
        return $this->repository
            ->getSummary();
    }
}
