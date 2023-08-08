<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccessToken extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'token',
        'scopes',
        'user_identity_id',
        'expires_at',
    ];

    protected $casts = [
        'scopes' => AsArrayObject::class,
        'expires_at' => 'datetime',
    ];

    public function identity(): BelongsTo
    {
        return $this->belongsTo(
            related: UserIdentity::class,
            foreignKey: 'user_identity_id',
        );
    }
}
