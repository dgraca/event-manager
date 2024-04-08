<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\EventSessionTicket
 *
 * @property int $id
 * @property int $event_session_id
 * @property int $ticket_id
 * @property int|null $limit
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $scheduled_start
 * @property \Illuminate\Support\Carbon|null $scheduled_end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket whereEventSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket whereLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket whereScheduledEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket whereScheduledStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSessionTicket whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventSessionTicket extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'event_session_ticket';

    public $fillable = [
        'event_session_id',
        'ticket_id',
        'limit',
        'count',
        'scheduled_start',
        'scheduled_end'
    ];

    protected $casts = [
        'scheduled_start' => 'datetime',
        'scheduled_end' => 'datetime'
    ];

    public static function rules(): array
    {
        return [
            'event_session_id' => 'required',
        'ticket_id' => 'required',
        'limit' => 'nullable',
        'count' => 'required',
        'scheduled_start' => 'nullable',
        'scheduled_end' => 'nullable',
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
        'event_session_id' => __('Event Session Id'),
        'ticket_id' => __('Ticket Id'),
        'limit' => __('Limit'),
        'count' => __('Count'),
        'scheduled_start' => __('Scheduled Start'),
        'scheduled_end' => __('Scheduled End'),
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

    public function eventSession(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\EventSession::class, 'event_session_id');
    }

    public function ticket(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Ticket::class, 'ticket_id');
    }

    public function accessTickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\AccessTicket::class, 'event_session_ticket_id');
    }


}
