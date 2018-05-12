<?php
declare(strict_types = 1);

namespace App\Model;

use Illuminate\Support\Carbon;
use Laravel\Passport\Token as TokenBase;

/**
 * Class Token
 *
 * @property int $id
 * @property Carbon $expires_at
 *
 * @package App\Model
 */
class Token extends TokenBase
{

}