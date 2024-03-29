<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Event extends Model
{
    use HasFactory;
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    protected $fillable = [
        'title', 'start', 'end', 'room', 'userid',
    ];
    
}