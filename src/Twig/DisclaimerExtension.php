<?php

declare(strict_types=1);

namespace Rudak\DisclaimerBundle\Twig;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Twig extension for disclaimer functionality.
 */
class DisclaimerExtension extends AbstractExtension
{
    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('disclaimer_link', [$this, 'getDisclaimerLink'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * Generate a link to the disclaimer page.
     */
    public function getDisclaimerLink(string $text = 'Mentions légales', array $attributes = []): string
    {
        $attrs = '';
        foreach ($attributes as $key => $value) {
            $attrs .= sprintf(' %s="%s"', htmlspecialchars($key), htmlspecialchars($value));
        }

        $url = $this->urlGenerator->generate('rudak_disclaimer_show');

        return sprintf(
            '<a href="%s"%s>%s</a>',
            htmlspecialchars($url),
            $attrs,
            htmlspecialchars($text)
        );
    }
}
