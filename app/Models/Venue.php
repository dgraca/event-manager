<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Venue
 *
 * @property int $id
 * @property int $entity_id
 * @property string $name
 * @property string $slug
 * @property string|null $address
 * @property string|null $location
 * @property string|null $country
 * @property string|null $postcode
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $mobile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Entity $entity
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Zone> $zones
 * @property-read int|null $zones_count
 * @method static \Illuminate\Database\Eloquent\Builder|Venue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue query()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Venue extends Model implements Auditable
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

    public $table = 'venues';

    public $fillable = [
        'entity_id',
        'name',
        'slug',
        'address',
        'location',
        'country',
        'postcode',
        'latitude',
        'longitude',
        'email',
        'phone',
        'mobile'
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'address' => 'string',
        'location' => 'string',
        'country' => 'string',
        'postcode' => 'string',
        'latitude' => 'string',
        'longitude' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'mobile' => 'string'
    ];

    public static function rules(): array
    {
        return [
            //'entity_id' => 'nullable',
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:512',
        'location' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:2',
        'postcode' => 'nullable|string|max:16',
        'latitude' => 'nullable|string|max:255',
        'longitude' => 'nullable|string|max:255',
        'email' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'mobile' => 'nullable|string|max:255',
        //'created_at' => 'nullable',
        //'updated_at' => 'nullable',
        //'deleted_at' => 'nullable'
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
        'name' => __('Name'),
        'slug' => __('Slug'),
        'address' => __('Address'),
        'location' => __('Location'),
        'country' => __('Country'),
        'postcode' => __('Postcode'),
        'latitude' => __('Latitude'),
        'longitude' => __('Longitude'),
        'email' => __('Email'),
        'phone' => __('Phone'),
        'mobile' => __('Mobile'),
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

    public function events(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Event::class, 'venue_id');
    }

    public function zones(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Zone::class, 'venue_id');
    }


}
