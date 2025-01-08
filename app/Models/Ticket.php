<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'image',
        'title',
        'message',
        'status',
        'category_id',
        'priority_id',
        'labels_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function priority(){
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function labels(){
        return $this->belongsTo(Labels::class, 'labels_id');
    }
}
