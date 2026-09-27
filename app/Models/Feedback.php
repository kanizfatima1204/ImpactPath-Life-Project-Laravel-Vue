<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Feedback extends Model { protected $fillable=['participant_name','role','rating','pain_point','suggestion','would_continue','notes','is_demo']; protected $casts=['rating'=>'integer','would_continue'=>'boolean','is_demo'=>'boolean']; }
