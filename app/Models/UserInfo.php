<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = "user_info";
    protected $primaryKey = "id";
    protected $fillable = ['ip', 'device_name', 'user_name', 'browser_name', 'os', 'country', 'state', 'city', 'zip', 'lat', 'lon', 'timezone', 'isp', 'info_json'];
}
