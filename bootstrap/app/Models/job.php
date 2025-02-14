<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
   protected $fillable=[
     
      'decimal',
      'client_id',
      'worker_id',
      'send_message',
      'receive_message',
      'edit_message',
      'message_status',
   ];
}
