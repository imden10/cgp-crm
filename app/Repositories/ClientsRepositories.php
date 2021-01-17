<?php


namespace App\Repositories;

use App\Models\Clients;
use App\Models\ClientsCompanies;
use App\Models\Companies;
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
            ->where(Clients::FIELD_LASTNAME, 'like', '%' . $search . '%')
            ->orWhere(Clients::FIELD_FIRSTNAME, 'like', '%' . $search . '%')
            ->select([
                Clients::FIELD_ID,
                DB::raw('CONCAT(lastname,\' \',firstname) AS text')
            ])
            ->get()
            ->toArray();
    }

    /**
     * @param $company_id
     * @param $pagination
     * @return array
     */
    public function getListByCompanyIdWithPaginate($company_id, $pagination): array
    {
        $query = Clients::query();

        $clientIds = ClientsCompanies::query()
            ->where(ClientsCompanies::FIELD_COMPANIES_ID, $company_id)
            ->pluck(ClientsCompanies::FIELD_CLIENTS_ID)
            ->toArray();

        $query->whereIn(Clients::FIELD_ID, $clientIds);

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
            'clients' => $query->get(),
        ];
    }

    /**
     * @param $client_id
     * @param $pagination
     * @return array
     */
    public function getListCompaniesByClientId($client_id, $pagination): array
    {
        $query = Companies::query();

        $companiesIds = ClientsCompanies::query()
            ->where(ClientsCompanies::FIELD_CLIENTS_ID, $client_id)
            ->pluck(ClientsCompanies::FIELD_COMPANIES_ID)
            ->toArray();

        $query->whereIn(Companies::FIELD_ID, $companiesIds);

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
