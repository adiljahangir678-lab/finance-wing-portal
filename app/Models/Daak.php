<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daak extends Model
{
    //
    use HasFactory;
    protected $fillable = [
            'user_id',
            'branch_name',
            'received_from',
            'category',
            'received_date',
            'subject',
            'pdf_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }    
}
