<?php

# http://stackoverflow.com/questions/17538890/how-can-i-make-routing-case-insensitive-in-symfony2
class Request extends \Symfony\Component\HttpFoundation\Request
{
    public function getPathInfo()
    {
        $info = parent::getPathInfo();

        // DO NOT lower some path
        // image routing with cache sign check (cache key, cache folder name)
        if (preg_match('#^/m/c/r/#', $info)) {
            return $info;
        }

        if (preg_match('#^/(staff|admin|editor|author)/#', $info)) {
            return $info;
        }

        return strtolower(parent::getPathInfo());
    }
}
