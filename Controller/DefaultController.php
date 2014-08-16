<?php
namespace Rudak\Bundle\DisclaimerBundle\Controller;

use Rudak\Bundle\DisclaimerBundle\RudakDisclaimerBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function showAction()
    {
        $DisclaimerData = $this->getTheDisclaimerObject();

        return $this->render('RudakDisclaimerBundle:Default:disclaimer.html.twig', array(
            'DisclaimerData' => $DisclaimerData
        ));
    }

    private function getTheDisclaimerObject()
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('RudakDisclaimerBundle:DisclaimerData')->find(1);
    }
} 