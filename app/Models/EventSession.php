<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\EventSessions
 *
 * @property int $id
 * @property int $event_id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int|null $max_capacity
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property string|null $rrule
 * @property int|null $type 0: on-site, 1: online, 2: hybrid
 * @property int|null $status 0: draft, 1: available, 2: closed, 3: cancelled, 4: finished
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read string $status_label
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereMaxCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereRrule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSession whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventSession extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    const STATUS_DISABLE = 0;
    const STATUS_ACTIVE = 1;

    public $table = 'event_sessions';

    public $fillable = [
        'event_id',
        'name',
        'slug',
        'description',
        'max_capacity',
        'start_date',
        'end_date',
        'rrule',
        'type',
        'status'
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'rrule' => 'string'
    ];

    public static function rules(): array
    {
        return [
            'event_id' => 'required',
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'description' => 'nullable|string|max:65535',
        'max_capacity' => 'nullable',
        'start_date' => 'nullable',
        'end_date' => 'nullable',
        'rrule' => 'nullable|string|max:65535',
        'type' => 'nullable',
        'status' => 'nullable',
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
        'name' => __('Name'),
        'slug' => __('Slug'),
        'description' => __('Description'),
        'max_capacity' => __('Max Capacity'),
        'start_date' => __('Start Date'),
        'end_date' => __('End Date'),
        'rrule' => __('Rrule'),
        'type' => __('Type'),
        'status' => __('Status'),
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

    public function eventSessionTickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EventSessionTicket::class, 'event_session_id');
    }

    /**
    * Return an array with the values of status field
    * @return array
    */
    public static function getStatusArray() : array
    {
        return [
            self::STATUS_ACTIVE =>  __('Active'),
            self::STATUS_DISABLE =>  __('Disable'),
        ];
    }

    /**
    * Return the status label
    * @return string
    */
    public function getStatusLabelAttribute() : string
    {
        $array = static::getStatusArray();
        return $array[$this->status] ?? "";
    }

    /**
     * Tickets relationship
     */
    public function ticket() {
        return $this->hasMany(Ticket::class)->withTimestamps();
    }

}
