<?php

declare(strict_types=1);

namespace Rudak\DisclaimerBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Twig extension for disclaimer functionality.
 */
class DisclaimerExtension extends AbstractExtension
{
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

        return sprintf(
            '<a href="/disclaimer"%s>%s</a>',
            $attrs,
            htmlspecialchars($text)
        );
    }

    public function getName(): string
    {
        return 'rudak_disclaimer';
    }
}
