<?php

declare(strict_types=1);

/*
 * This file is part of the NucleosGDPRBundle package.
 *
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nucleos\GDPRBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('nucleos_gdpr');

        $rootNode = $treeBuilder->getRootNode();

        $this->addBlockCookiesSection($rootNode);

        return $treeBuilder;
    }

    private function addBlockCookiesSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('block_cookies')
                    ->children()
                        ->arrayNode('keep')
                             ->defaultValue(['PHPSESSID'])
                             ->prototype('scalar')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
