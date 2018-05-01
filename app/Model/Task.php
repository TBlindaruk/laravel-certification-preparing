<?php
declare(strict_types = 1);

namespace App\Model;

use Maksi\TypeHinting\Database\Eloquent\Model;

/**
 * Class Task
 *
 * @property-read int|null $id
 * @property string        $title
 * @property string        $description
 *
 * @package App\Model
 */
class Task extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    /**
     * @var array
     */
    protected $hidden = ['created_at'];
}
