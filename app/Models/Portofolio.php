<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $fillable = ['title', 'kategori','description', 'image', 'pdf_path'];

    public function additionalImages()
    {
        return $this->hasMany(PortofolioImage::class);
    }
    
}
