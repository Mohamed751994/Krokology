<?php

namespace App\Models;

use App\Observers\TodoObserver;
use App\Traits\AttachmentTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([TodoObserver::class])]
class Todo extends Model
{
    use HasFactory,AttachmentTrait;
    protected $guarded = [''];

    /**************Relation with user (belongsTo)*****************/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**************End Relation with todos (HasMany)*****************/

}
