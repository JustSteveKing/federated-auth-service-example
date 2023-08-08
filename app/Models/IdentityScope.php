<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

final class IdentityScope extends Pivot
{
    public $timestamps = true;
}
