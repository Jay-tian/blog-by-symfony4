<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;

class BaseService implements BaseInterface
{
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function createDao()
    {

    }
}