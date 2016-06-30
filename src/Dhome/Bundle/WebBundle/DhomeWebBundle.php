<?php

namespace Dhome\Bundle\WebBundle;

use Dhome\Bundle\WebBundle\DependencyInjection\DhomeWebExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DhomeWebBundle extends Bundle
{
//    protected $name = 'ui';

    public function __construct()
    {
        $this->extension = new DhomeWebExtension();
    }
}
