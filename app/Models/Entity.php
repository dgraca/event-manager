<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entity extends Model implements Auditable
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

    public $table = 'entities';

    public $fillable = [
        'name',
        'slug'
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string'
    ];

    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
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
        'name' => __('Name'),
        'slug' => __('Slug'),
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

    /**
     * Return the attribute label as static function
     * @param string $attribute
     * @return string
     */
    public static function getStaticAttributeLabel($attribute) : string
    {
        $attributeLabels = static::attributeLabels();
        return isset($attributeLabels[$attribute]) ? $attributeLabels[$attribute] : __($attribute);
    }

    public function entityUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EntityUser::class, 'entity_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class)->withTimestamps();
    }

    public function events(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Event::class, 'entity_id');
    }

    public function paymentOptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\PaymentOption::class, 'entity_id');
    }

    public function venues(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Venue::class, 'entity_id');
    }


}
