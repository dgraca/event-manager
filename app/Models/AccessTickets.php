<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\AccessTickets
 *
 * @property int $id
 * @property int $event_session_ticket_id
 * @property int|null $user_id
 * @property int|null $payment_option_id
 * @property string $code
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string|null $description
 * @property int $tickets_count
 * @property bool $approved
 * @property int|null $status 0: available, 1: used, 2: cancelled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read string $status_label
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereEventSessionTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets wherePaymentOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereTicketsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessTickets whereUserId($value)
 * @mixin \Eloquent
 */
class AccessTickets extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    const STATUS_DISABLE = 0;
    const STATUS_ACTIVE = 1;

    public $table = 'access_tickets';

    public $fillable = [
        'event_session_ticket_id',
        'user_id',
        'payment_option_id',
        'code',
        'name',
        'email',
        'phone',
        'description',
        'tickets_count',
        'approved',
        'status'
    ];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'description' => 'string',
        'approved' => 'boolean'
    ];

    public static function rules(): array
    {
        return [
            'event_session_ticket_id' => 'required',
        'user_id' => 'nullable',
        'payment_option_id' => 'nullable',
        'code' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'phone' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:65535',
        'tickets_count' => 'required',
        'approved' => 'required|boolean',
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
        'event_session_ticket_id' => __('Event Session Ticket Id'),
        'user_id' => __('User Id'),
        'payment_option_id' => __('Payment Option Id'),
        'code' => __('Code'),
        'name' => __('Name'),
        'email' => __('Email'),
        'phone' => __('Phone'),
        'description' => __('Description'),
        'tickets_count' => __('Tickets Count'),
        'approved' => __('Approved'),
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

    public function eventSessionTicket(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\EventSessionTicket::class, 'event_session_ticket_id');
    }

    public function paymentOption(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\PaymentOption::class, 'payment_option_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
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
