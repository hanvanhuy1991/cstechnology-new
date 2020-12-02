<?php

namespace App\Support;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\PathGenerator\BasePathGenerator;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;
use Vinkla\Hashids\Facades\Hashids;

class HashidPathGenerator extends BasePathGenerator implements PathGenerator
{
    /**
     * @inheritDoc
     */
    protected function getBasePath(Media $media): string
    {
        return Hashids::connection(\App\Media::class)->encode($media->getKey());
    }
}
