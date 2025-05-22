<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortofolioImage extends Model
{
    protected $fillable = ['portofolio_id', 'image'];

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class);
    }
}
