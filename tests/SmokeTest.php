<?php

declare(strict_types=1);

namespace Rudak\DisclaimerBundle\Tests;

use PHPUnit\Framework\TestCase;
use Rudak\DisclaimerBundle\Controller\DisclaimerController;
use Rudak\DisclaimerBundle\DependencyInjection\Configuration;
use Rudak\DisclaimerBundle\DependencyInjection\RudakDisclaimerExtension;
use Rudak\DisclaimerBundle\RudakDisclaimerBundle;
use Rudak\DisclaimerBundle\Twig\DisclaimerExtension;

/**
 * Basic smoke tests to ensure bundle classes can be loaded.
 */
class SmokeTest extends TestCase
{
    public function testBundleClassExists(): void
    {
        $this->assertTrue(class_exists(RudakDisclaimerBundle::class));
    }

    public function testBundleCanBeInstantiated(): void
    {
        $bundle = new RudakDisclaimerBundle();
        $this->assertInstanceOf(RudakDisclaimerBundle::class, $bundle);
    }

    public function testControllerClassExists(): void
    {
        $this->assertTrue(class_exists(DisclaimerController::class));
    }

    public function testExtensionClassExists(): void
    {
        $this->assertTrue(class_exists(RudakDisclaimerExtension::class));
    }

    public function testExtensionCanBeInstantiated(): void
    {
        $extension = new RudakDisclaimerExtension();
        $this->assertInstanceOf(RudakDisclaimerExtension::class, $extension);
    }

    public function testConfigurationClassExists(): void
    {
        $this->assertTrue(class_exists(Configuration::class));
    }

    public function testConfigurationCanBeInstantiated(): void
    {
        $configuration = new Configuration();
        $this->assertInstanceOf(Configuration::class, $configuration);
    }

    public function testConfigurationTreeBuilderWorks(): void
    {
        $configuration = new Configuration();
        $treeBuilder = $configuration->getConfigTreeBuilder();
        
        $this->assertInstanceOf(\Symfony\Component\Config\Definition\Builder\TreeBuilder::class, $treeBuilder);
    }

    public function testTwigExtensionClassExists(): void
    {
        $this->assertTrue(class_exists(DisclaimerExtension::class));
    }

    public function testTwigExtensionCanBeInstantiated(): void
    {
        $extension = new DisclaimerExtension();
        $this->assertInstanceOf(DisclaimerExtension::class, $extension);
    }

    public function testTwigExtensionHasFunctions(): void
    {
        $extension = new DisclaimerExtension();
        $functions = $extension->getFunctions();
        
        $this->assertIsArray($functions);
        $this->assertNotEmpty($functions);
        $this->assertContainsOnlyInstancesOf(\Twig\TwigFunction::class, $functions);
    }

    public function testTwigExtensionGetDisclaimerLink(): void
    {
        $extension = new DisclaimerExtension();
        $link = $extension->getDisclaimerLink();
        
        $this->assertIsString($link);
        $this->assertStringContainsString('href="/disclaimer"', $link);
        $this->assertStringContainsString('Mentions légales', $link);
    }

    public function testTwigExtensionGetDisclaimerLinkWithCustomText(): void
    {
        $extension = new DisclaimerExtension();
        $link = $extension->getDisclaimerLink('Custom Text');
        
        $this->assertStringContainsString('Custom Text', $link);
        $this->assertStringNotContainsString('Mentions légales', $link);
    }

    public function testTwigExtensionGetDisclaimerLinkWithAttributes(): void
    {
        $extension = new DisclaimerExtension();
        $link = $extension->getDisclaimerLink('Link', ['class' => 'test-class', 'target' => '_blank']);
        
        $this->assertStringContainsString('class="test-class"', $link);
        $this->assertStringContainsString('target="_blank"', $link);
    }

    public function testTwigExtensionGetName(): void
    {
        $extension = new DisclaimerExtension();
        $this->assertSame('rudak_disclaimer', $extension->getName());
    }
}
