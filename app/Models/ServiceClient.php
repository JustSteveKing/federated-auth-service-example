<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class ServiceClient extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'slug',
        'secret_key',
    ];

    protected $casts = [
        'secret_key' => 'encrypted',
    ];
}
