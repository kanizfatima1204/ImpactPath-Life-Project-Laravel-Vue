<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserTest extends Model { protected $fillable=['participant_name','task','manual_minutes','prototype_minutes','success','error_count','comments','is_demo']; protected $casts=['manual_minutes'=>'integer','prototype_minutes'=>'integer','success'=>'boolean','error_count'=>'integer','is_demo'=>'boolean']; }
