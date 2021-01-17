<?php


namespace App\Repositories;

use App\Models\Clients;
use Illuminate\Support\Facades\DB;

/**
 * Class ClientsRepositories
 * @package App\Repositories
 */
class ClientsRepositories
{
    /**
     * @param $search
     * @return array
     */
    public function searchByName($search): array
    {
        return Clients::query()
            ->where(Clients::FIELD_LASTNAME,'like','%' . $search . '%')
            ->orWhere(Clients::FIELD_FIRSTNAME,'like','%' . $search . '%')
            ->select([
                Clients::FIELD_ID,
                DB::raw('CONCAT(lastname,\' \',firstname) AS text')
            ])
            ->get()
            ->toArray();
    }
}
