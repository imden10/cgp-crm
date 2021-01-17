<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Companies
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $website
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Clients[] $clients
 */
class Companies extends Model
{
    use HasFactory;

    public const FIELD_ID = 'id',
        FIELD_NAME = 'name',
        FIELD_PHONE = 'phone',
        FIELD_ADDRESS = 'address',
        FIELD_EMAIL = 'email',
        FIELD_WEBSITE = 'website',
        FIELD_DESCRIPTION = 'description',
        FIELD_CREATED_AT = 'created_at',
        FIELD_UPDATED_AT = 'updated_at';

    protected $table = 'companies';

    protected $guarded = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getAttribute(self::FIELD_ID);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute(self::FIELD_NAME);
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->getAttribute(self::FIELD_PHONE);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->getAttribute(self::FIELD_ADDRESS);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getAttribute(self::FIELD_EMAIL);
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->getAttribute(self::FIELD_WEBSITE);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute(self::FIELD_DESCRIPTION);
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt()
    {
        return $this->getAttribute(self::FIELD_CREATED_AT);
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt()
    {
        return $this->getAttribute(self::FIELD_UPDATED_AT);
    }

    /**
     * @return BelongsToMany
     */
    public function clients()
    {
        return $this->belongsToMany(Clients::class)->using(ClientsCompanies::class);
    }
}
