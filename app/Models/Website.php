<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['site_name', 'link', 'categories', 'gtm', 'logo',
    'about_us','data_id' , 'email', 'phone', 'address'];

    protected $casts = [
        'categories' => 'array', // Auto-cast JSON to an array
    ];

    /**
     * Define the relationship to website_data.
     */
    public function websiteData()
    {
        return $this->belongsTo(WebsiteData::class, 'data_id', 'dataid');
    }
}
