<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Tickets
 *
 * @property int $id
 * @property int $event_id
 * @property int|null $zone_id
 * @property string $name
 * @property string|null $description
 * @property int|null $max_check_in
 * @property int|null $max_tickets_per_order
 * @property string|null $price
 * @property string $currency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Zone|null $zone
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereMaxCheckIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereMaxTicketsPerOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tickets whereZoneId($value)
 * @mixin \Eloquent
 */
class Tickets extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'tickets';

    public $fillable = [
        'event_id',
        'zone_id',
        'name',
        'description',
        'max_check_in',
        'max_tickets_per_order',
        'price',
        'currency'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'price' => 'decimal:2',
        'currency' => 'string'
    ];

    public static function rules(): array
    {
        return [
            'event_id' => 'required',
        'zone_id' => 'nullable',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:65535',
        'max_check_in' => 'nullable',
        'max_tickets_per_order' => 'nullable',
        'price' => 'nullable|numeric',
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
        'event_id' => __('Event Id'),
        'zone_id' => __('Zone Id'),
        'name' => __('Name'),
        'description' => __('Description'),
        'max_check_in' => __('Max Check In'),
        'max_tickets_per_order' => __('Max Tickets Per Order'),
        'price' => __('Price'),
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

    public function event(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Event::class, 'event_id');
    }

    public function zone(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Zone::class, 'zone_id');
    }

    public function eventSessionTickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EventSessionTicket::class, 'ticket_id');
    }


}