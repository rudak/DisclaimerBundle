<?php

declare(strict_types=1);

namespace Rudak\DisclaimerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Modern Symfony Bundle for French Legal Notices (Mentions Légales).
 * 
 * @author Kadur Arnaud <contact@kadur-arnaud.fr>
 */
class RudakDisclaimerBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
