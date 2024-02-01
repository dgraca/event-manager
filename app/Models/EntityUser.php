<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\EntityUser
 *
 * @property int $id
 * @property int $entity_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Entity $entity
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|EntityUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EntityUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EntityUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|EntityUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntityUser whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntityUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntityUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EntityUser whereUserId($value)
 * @mixin \Eloquent
 */
class EntityUser extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'entity_user';

    public $fillable = [
        'entity_id',
        'user_id'
    ];

    protected $casts = [

    ];

    public static function rules(): array
    {
        return [
            'entity_id' => 'required',
        'user_id' => 'required',
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
        'user_id' => __('User Id'),
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

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }


}
