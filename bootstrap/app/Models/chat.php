<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $fillable = [
        
       
            'decimal',
            'client_id',
            'worker_id',
            'send_message',
            'receive_message',
            'edit_message',
            
        
    ]; 
}
