<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('logo', 'favicon', 'meta_desicription', 'meta_keywords', 'contact_email', 'contact_phone', 'og_title', 'og_description', 'og_image', 'canonical_url', 'robots', 'maintenance_mode', 'enable_comments')]
class Setting extends Model
{
    //
}
