<?php

namespace Dhome\Bundle\MediaBundle\Uploader;

use Dhome\Bundle\MediaBundle\Model\ImageInterface;

interface ImageUploaderInterface
{
    /**
     * @param ImageInterface $image
     */
    public function upload(ImageInterface $image);

    /**
     * @param string $path
     */
    public function remove($path);
}
