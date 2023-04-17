<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int user_id
 * @property string hash_reset
 * @property int is_used
 * @property-read User user
 */
class UserEmailHash extends Model
{
    protected $table = 'user_email_reset';

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
