<?php

namespace Dhome\Bundle\MediaBundle\EventListener;

use Dhome\Bundle\AdminBundle\Model\ProjectInterface;
use Dhome\Bundle\AdminBundle\Model\VisionInterface;
use Dhome\Bundle\MediaBundle\Uploader\ImageUploaderInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Webmozart\Assert\Assert;

class ImageUploadListener
{
    /**
     * @var ImageUploaderInterface
     */
    protected $uploader;

    /**
     * @param ImageUploaderInterface $uploader
     */
    public function __construct(ImageUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * @param GenericEvent $event
     */
    public function uploadVisionImage(GenericEvent $event)
    {
        $subject = $event->getSubject();
        Assert::isInstanceOf($subject, VisionInterface::class);

        $this->uploadVisionImages($subject);
    }

    /**
     * @param GenericEvent $event
     */
    public function uploadProjectImage(GenericEvent $event)
    {
        $subject = $event->getSubject();
        Assert::isInstanceOf($subject, ProjectInterface::class);

        $this->uploadProjectImages($subject);
    }

    /**
     * @param VisionInterface $vision
     */
    private function uploadVisionImages(VisionInterface $vision)
    {
        $images = $vision->getImages();
        foreach ($images as $image) {
            if ($image->hasFile()) {
                $this->uploader->upload($image);
            }

            // Upload failed? Let's remove that image.
            if (null === $image->getPath()) {
                $images->removeElement($image);
            }
        }
    }

    /**
     * @param ProjectInterface $project
     */
    private function uploadProjectImages(ProjectInterface $project)
    {
        $images = $project->getImages();
        foreach ($images as $image) {
            if ($image->hasFile()) {
                $this->uploader->upload($image);
            }

            // Upload failed? Let's remove that image.
            if (null === $image->getPath()) {
                $images->removeElement($image);
            }
        }
    }
}
