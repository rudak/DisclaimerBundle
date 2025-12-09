<?php

declare(strict_types=1);

namespace Rudak\DisclaimerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for displaying the legal disclaimer page.
 */
class DisclaimerController extends AbstractController
{
    public function show(): Response
    {
        return $this->render('@RudakDisclaimer/disclaimer/page.html.twig');
    }
}
