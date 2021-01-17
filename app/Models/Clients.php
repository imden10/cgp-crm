<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Clients
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Companies[] $companies
 */
class Clients extends Model
{
    use HasFactory;

    public const FIELD_ID = 'id',
        FIELD_FIRSTNAME = 'firstname',
        FIELD_LASTNAME = 'lastname',
        FIELD_MIDDLENAME = 'middlename',
        FIELD_PHONE = 'phone',
        FIELD_ADDRESS = 'address',
        FIELD_EMAIL = 'email',
        FIELD_CREATED_AT = 'created_at',
        FIELD_UPDATED_AT = 'updated_at';

    protected $table = 'clients';

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
    public function getFirstName()
    {
        return $this->getAttribute(self::FIELD_FIRSTNAME);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getAttribute(self::FIELD_LASTNAME);
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->getAttribute(self::FIELD_MIDDLENAME);
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->getAttribute(self::FIELD_LASTNAME)
            . ' ' . $this->getAttribute(self::FIELD_FIRSTNAME)
            . ($this->getAttribute(self::FIELD_MIDDLENAME) ? (' ' . $this->getAttribute(self::FIELD_MIDDLENAME)) : '');
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
    public function companies()
    {
        return $this->belongsToMany(Companies::class)->using(ClientsCompanies::class);
    }
}
