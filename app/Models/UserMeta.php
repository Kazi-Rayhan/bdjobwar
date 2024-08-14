<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = [];
    protected $casts = [
        'expired_at' => 'datetime',
    ];
    public $incrementing = false;

    public function getId($value)
    {
        return $value ?? 'N/A';
    }
    /**
     * Defines one to one relation between user_metas table and pacakages table
     *
     * @return void
     */
    

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Defines one to one relation between user_metas table and users table
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
