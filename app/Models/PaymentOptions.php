<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\PaymentOptions
 *
 * @property int $id
 * @property int $entity_id
 * @property string $business_entity_name
 * @property string|null $vat
 * @property string|null $address
 * @property string|null $location
 * @property string|null $country
 * @property string|null $postcode
 * @property string|null $email
 * @property string|null $data
 * @property string $currency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Entity $entity
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereBusinessEntityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOptions whereVat($value)
 * @mixin \Eloquent
 */
class PaymentOptions extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'payment_options';

    public $fillable = [
        'entity_id',
        'business_entity_name',
        'vat',
        'address',
        'location',
        'country',
        'postcode',
        'email',
        'data',
        'currency'
    ];

    protected $casts = [
        'business_entity_name' => 'string',
        'vat' => 'string',
        'address' => 'string',
        'location' => 'string',
        'country' => 'string',
        'postcode' => 'string',
        'email' => 'string',
        'data' => 'string',
        'currency' => 'string'
    ];

    public static function rules(): array
    {
        return [
            'entity_id' => 'required',
        'business_entity_name' => 'required|string|max:255',
        'vat' => 'nullable|string|max:32',
        'address' => 'nullable|string|max:512',
        'location' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:2',
        'postcode' => 'nullable|string|max:16',
        'email' => 'nullable|string|max:255',
        'data' => 'nullable|string|max:65535',
        'currency' => 'required|string|max:3',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
        ];
    }

    /**
    * Attribute labels
    *
    * @return array
    */
    public static function attributeLabels() : array
    {
        return [
            'id' => __('Id'),
        'entity_id' => __('Entity Id'),
        'business_entity_name' => __('Business Entity Name'),
        'vat' => __('Vat'),
        'address' => __('Address'),
        'location' => __('Location'),
        'country' => __('Country'),
        'postcode' => __('Postcode'),
        'email' => __('Email'),
        'data' => __('Data'),
        'currency' => __('Currency'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }

    /**
    * Return the attribute label
    * @param string $attribute
    * @return string
    */
    public function getAttributeLabel($attribute) : string
    {
        $attributeLabels = static::attributeLabels();
        return isset($attributeLabels[$attribute]) ? $attributeLabels[$attribute] : __($attribute);
    }

    public function entity(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Entity::class, 'entity_id');
    }

    public function accessTickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\AccessTicket::class, 'payment_option_id');
    }


}
