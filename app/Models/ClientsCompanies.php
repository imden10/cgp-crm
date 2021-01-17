<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class ClientCompanies
 *
 * @property integer $id
 * @property integer $clients_id
 * @property integer $companies_id
 */
class ClientsCompanies extends Pivot
{
    use HasFactory;

    public const FIELD_ID = 'id',
        FIELD_CLIENTS_ID = 'clients_id',
        FIELD_COMPANIES_ID = 'companies_id';


    protected $table = 'clients_companies';

    protected $guarded = [];

    public $timestamps = false;
}
