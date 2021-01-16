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
            ->where(Companies::FIELD_NAME,'like','%' . $search . '%')
            ->select([
                Companies::FIELD_ID,
                Companies::FIELD_NAME . " AS text"
            ])
            ->get()
            ->toArray();
    }
}
