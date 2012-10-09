<?php

namespace Aga\DocumentorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

/**
 * Dependancy Injection
 * 
 * DocumentorBundle's extension class to fetch services
 * 
 * @author Artur Gajewski
 */
class DocumentorExtension extends Extension
{
    /**
     * Service loader
     * 
     * This function loads the configs and the container builder and loads the
     * given xml file to fetch services from.
     * 
     * @param array $configs
     * @param ContainerBuilder $container 
     */
    public function load(array $configs, ContainerBuilder $container)
    {
    }

    /**
     * Return alias of the bundle
     * 
     * @return string 
     */
    public function getAlias()
    {
        return 'documentor';
    }
}