<?php

namespace Dhome\Bundle\MediaBundle\EventListener;

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

//    /**
//     * @param GenericEvent $event
//     */
//    public function uploadProductVariantImage(GenericEvent $event)
//    {
//        $subject = $event->getSubject();
//        Assert::isInstanceOf($subject, ProductVariantInterface::class);
//
//        $this->uploadProductVariantImages($subject);
//    }
//
//    /**
//     * @param GenericEvent $event
//     */
//    public function uploadProductImage(GenericEvent $event)
//    {
//        $subject = $event->getSubject();
//        Assert::isInstanceOf($subject, ProductInterface::class);
//
//        if ($subject->isSimple()) {
//            $this->uploadProductVariantImages($subject->getFirstVariant());
//        }
//    }

    /**
     * @param GenericEvent $event
     */
//    public function uploadTaxonImage(GenericEvent $event)
//    {
//        $subject = $event->getSubject();
//        Assert::isInstanceOf($subject, TaxonInterface::class);
//
//        if ($subject->hasFile()) {
//            $this->uploader->upload($subject);
//        }
//    }

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
}
