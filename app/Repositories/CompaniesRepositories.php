<?php


namespace App\Repositories;

use App\Models\Companies;

/**
 * Class CompaniesRepositories
 * @package App\Repositories
 */
class CompaniesRepositories
{
    /**
     * @param $search
     * @return array
     */
    public function searchByName($search): array
    {
        return Companies::query()
            ->where(Companies::FIELD_NAME, 'like', '%' . $search . '%')
            ->select([
                Companies::FIELD_ID,
                Companies::FIELD_NAME . " AS text"
            ])
            ->get()
            ->toArray();
    }

    /**
     * @param $pagination
     * @return array
     */
    public function getListWithPaginate($pagination): array
    {
        $query = Companies::query();

        $count = $query->count();

        /**
         * Применяем пагинацию
         */
        $offset = ($pagination['page'] - 1) * $pagination['page_size'];

        if ($offset > 0) {
            $query->offset($offset);
        }

        $query->limit($pagination['page_size']);

        return [
            'count'     => $count,
            'companies' => $query->get(),
        ];
    }
}
