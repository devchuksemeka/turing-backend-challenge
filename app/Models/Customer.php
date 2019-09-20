<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Customer
 * @package App\Models
 *
 * @property int $customer_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $credit_card
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $region
 * @property string $postal_code
 * @property string $country
 * @property int $shipping_region_id
 * @property string $day_phone
 * @property string $eve_phone
 * @property string $mob_phone
 *
 */
class Customer extends Authenticatable implements JWTSubject
{
    public $timestamps = false;

    protected $table = 'customer';
    protected $primaryKey = 'customer_id';

    protected $guarded = ["customer_id"];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}
