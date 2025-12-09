<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Rudak\DisclaimerBundle\Controller\DisclaimerController;
use Rudak\DisclaimerBundle\Twig\DisclaimerExtension;

return static function (ContainerConfigurator $container): void {
    $services = $container->services()
        ->defaults()
            ->autowire()
            ->autoconfigure()
    ;

    // Controller
    $services->set(DisclaimerController::class)
        ->tag('controller.service_arguments')
    ;

    // Twig Extension
    $services->set(DisclaimerExtension::class)
        ->tag('twig.extension')
    ;
};
