<?php

namespace Dhome\Bundle\WebBundle\Pagerfanta\View;

use WhiteOctober\PagerfantaBundle\View\TwitterBootstrapTranslatedView;

/**
 * TwitterBootstrap4TranslatedView
 *
 * This view renders the twitter bootstrap4 view with the text translated.
 */
class TwitterBootstrap4TranslatedView extends TwitterBootstrapTranslatedView
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'twitter_bootstrap_translated';
    }

    protected function buildPreviousMessage($text)
    {
        return '&laquo;';
    }

    protected function buildNextMessage($text)
    {
        return '&raquo;';
    }
}