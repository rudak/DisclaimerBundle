<?php

declare(strict_types=1);

namespace Symfony\Component\Routing\Loader\Configurator;

use Rudak\DisclaimerBundle\Controller\DisclaimerController;

return static function (RoutingConfigurator $routes): void {
    $routes->add('rudak_disclaimer_show', '/disclaimer')
        ->controller([DisclaimerController::class, 'show'])
        ->methods(['GET'])
    ;
};
