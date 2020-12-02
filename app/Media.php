<?php

namespace App;

use App\Support\Traits\Hashidable;
use Spatie\MediaLibrary\Models\Media as SpatieMedia;

class Media extends SpatieMedia
{
    use Hashidable;
}
