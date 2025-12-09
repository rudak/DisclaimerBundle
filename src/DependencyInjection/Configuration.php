<?php

declare(strict_types=1);

namespace Rudak\DisclaimerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Bundle configuration.
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('rudak_disclaimer');
        $rootNode = $treeBuilder->getRootNode();

        // No configuration needed for now - simple bundle with defaults

        return $treeBuilder;
    }
}
