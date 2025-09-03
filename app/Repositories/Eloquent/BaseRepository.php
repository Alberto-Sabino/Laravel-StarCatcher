<?php

namespace App\Repositories\Eloquent;

use App\Exceptions\TreatedException;
use App\Http\Requests\PaginateAndFilterRequest;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(
        protected Model $model,
        private string $modelName
    ) {}

    /** @throws TreatedException if not exists*/
    public function getById(int $id): Model
    {
        $this->model = $this->model
            ->find($id);

        if (!$this->model->exists()) {
            $this->throwModelNotFoundException();
        }

        return $this->model;
    }

    public function list(PaginateAndFilterRequest $request): LengthAwarePaginator
    {
        $query = $this->model->query();

        if ($request->hasFilters()) {
            $request->applyFilters($query);
        }

        return $query->paginate(...$request->getPagination());
    }

    public function create(array $data): Model
    {
        return $this->model
            ->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->getById($id)
            ->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->getById($id)
            ->delete();
    }

    /**
     * Throws a TreatedException if the model is not found in the database.
     *
     * @throws TreatedException
     */
    private function throwModelNotFoundException(): void
    {
        throw new TreatedException(
            "Não encontramos registro do(a) {$this->modelName} para o identificador informado!",
            404
        );
    }
}
