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
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereBusinessEntityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentOption whereVat($value)
 * @mixin \Eloquent
 */
class PaymentOption extends Model implements Auditable
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
        'phone',
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
        'phone' => 'string',
        'data' => 'string',
        'currency' => 'string'
    ];

    public static function rules(): array
    {
        return [
            //'entity_id' => 'required',
        'business_entity_name' => 'required|string|max:255',
        'vat' => 'required|string|max:32',
        'address' => 'required|string|max:512',
        'location' => 'required|string|max:255',
        'country' => 'required|string|max:2',
        'postcode' => 'required|string|max:16',
        'email' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'data' => 'nullable|string|max:65535',
        'currency' => 'required|string|max:3',
        //'created_at' => 'nullable',
        //'updated_at' => 'nullable'
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
        'phone' => __('Phone'),
        'data' => __('Data'),
        'currency' => __('Currency'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At')
        ];
    }

    /**
     * Attribute Non-DB labels
     *
     * @return array
     */
    public static function attributeNonDBLabels() : array
    {
        return [
            'iban' => __('IBAN'),
            'bic_swift' => __('BIC/SWIFT'),
            'account_holder' => __('Account Holder'),
            'bank_entity' => __('Bank Entity'),
            'bank_country' => __('Bank Country'),
            'paypal_email' => __('PayPal Email'),
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

    /**
     * Return the attribute label as static function
     * @param string $attribute
     * @return string
     */
    public static function getAttributeLabelStatic($attribute) : string
    {
        $attributeLabels = static::attributeLabels();
        return isset($attributeLabels[$attribute]) ? $attributeLabels[$attribute] : __($attribute);
    }

    /**
     * Return the non-DB attribute label
     *
     *
     * These attributes will be saved in the DB in JSON format, in the "data" column
     * These will hold the payment data that is not mandatory. For example, IBAN, SWIFT, etc.
     * If the user doesn't want to use bank transfer, but instead wants to use PayPal, then the IBAN and SWIFT are not needed.
     *
     * @param string $attribute
     * @return string
     */
    public static function getNonDBLabelStatic($attribute) : string
    {
        $attributeLabels = static::attributeNonDBLabels();
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
