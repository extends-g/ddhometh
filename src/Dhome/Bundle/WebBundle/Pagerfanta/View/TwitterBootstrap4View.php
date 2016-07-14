<?php

namespace Dhome\Bundle\WebBundle\Pagerfanta\View;

use Dhome\Bundle\WebBundle\Pagerfanta\View\Template\TwitterBootstrap4Template;
use Pagerfanta\View\TwitterBootstrapView;

/**
 * TwitterBootstrap3View.
 *
 * View that can be used with the pagination module
 * from the Twitter Bootstrap3 CSS Toolkit
 * http://getbootstrap.com/
 *
 */
class TwitterBootstrap4View extends TwitterBootstrapView
{
    protected function createDefaultTemplate()
    {
        return new TwitterBootstrap4Template();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'twitter_bootstrap4';
    }
}
