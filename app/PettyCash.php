<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PettyCash extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'description',
        'receipt_date',
        'status',
        'requested_by',
        'approved_by',
        'received_by',
        'created_at',
        'updated_at',
    ];

    public function approvedBy()
    {
        return $this->belongsTo(User::class,'approved_by','id');
    }

    public function receivedBy()
    {
        return $this->belongsTo(User::class,'received_by','id');
    }

    public function requestedBy()
    {
        return $this->belongsTo(User::class,'requested_by','id');
    }
}
