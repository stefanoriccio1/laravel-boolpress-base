<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
  protected $fillable = [
  'path',
  'user_id'

];
}
