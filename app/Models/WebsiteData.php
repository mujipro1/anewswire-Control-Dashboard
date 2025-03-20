<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteData extends Model
{
    use HasFactory;

    protected $table = 'website_data'; // Explicitly define table name

    protected $primaryKey = 'dataid'; // Define primary key

    protected $fillable = [
        'header_links','name', 'description'
    ];

    protected $casts = [
        'header_links' => 'array', // Auto-cast JSON to an array
    ];

    /**
     * Define the relationship to websites.
     */
    public function websites()
    {
        return $this->hasMany(Website::class, 'data_id', 'dataid');
    }

}
