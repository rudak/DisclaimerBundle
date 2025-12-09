<?php

declare(strict_types=1);

namespace Rudak\DisclaimerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller for displaying the legal disclaimer page.
 */
class DisclaimerController extends AbstractController
{
    #[Route('/disclaimer', name: 'rudak_disclaimer_show', methods: ['GET'])]
    public function show(): Response
    {
        return $this->render('@RudakDisclaimer/disclaimer/page.html.twig');
    }
}
