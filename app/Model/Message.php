<?php
declare(strict_types = 1);

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Maksi\TypeHinting\Database\Eloquent\Model;

/**
 * Class Message
 *
 * @package App\Model
 */
class Message extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['message'];
    
    /**
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
