<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Events
 *
 * @property int $id
 * @property int $entity_id
 * @property int|null $venue_id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $scheduled_start
 * @property \Illuminate\Support\Carbon|null $scheduled_end
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property string|null $registration_note
 * @property bool $pre-approval
 * @property int|null $max_capacity
 * @property int|null $type 0: on-site, 1: online, 2: hybrid
 * @property int|null $status 0: draft, 1: available, 2: closed, 3: cancelled, 4: finished
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Entity $entity
 * @property-read string $status_label
 * @property-read \App\Models\Venue|null $venue
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereMaxCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePreApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereRegistrationNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereScheduledEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereScheduledStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereVenueId($value)
 * @mixin \Eloquent
 */
class Event extends Model implements Auditable
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

    public $table = 'events';

    public $fillable = [
        'entity_id',
        'venue_id',
        'name',
        'slug',
        'description',
        'scheduled_start',
        'scheduled_end',
        'start_date',
        'end_date',
        'registration_note',
        'pre-approval',
        'max_capacity',
        'type',
        'status'
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'scheduled_start' => 'datetime',
        'scheduled_end' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'registration_note' => 'string',
        'pre-approval' => 'boolean'
    ];

    public static function rules(): array
    {
        return [
            'entity_id' => 'required',
        'venue_id' => 'nullable',
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'description' => 'nullable|string|max:65535',
        'scheduled_start' => 'nullable',
        'scheduled_end' => 'nullable',
        'start_date' => 'nullable',
        'end_date' => 'nullable',
        'registration_note' => 'nullable|string|max:65535',
        'pre-approval' => 'required|boolean',
        'max_capacity' => 'nullable',
        'type' => 'nullable',
        'status' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
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
            'entity' => __('Entity'),
        'entity_id' => __('Entity Id'),
        'venue_id' => __('Venue Id'),
        'name' => __('Name'),
        'slug' => __('Slug'),
        'description' => __('Description'),
        'scheduled_start' => __('Scheduled Start'),
        'scheduled_end' => __('Scheduled End'),
        'start_date' => __('Start Date'),
        'end_date' => __('End Date'),
        'registration_note' => __('Registration Note'),
        'pre-approval' => __('Pre-Approval'),
        'max_capacity' => __('Max Capacity'),
        'type' => __('Type'),
        'status' => __('Status'),
        'created_at' => __('Created At'),
        'updated_at' => __('Updated At'),
        'deleted_at' => __('Deleted At')
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

    public function venue(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Venue::class, 'venue_id');
    }

    public function eventSessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EventSession::class, 'event_id');
    }

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Tickets::class, 'event_id');
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

}
