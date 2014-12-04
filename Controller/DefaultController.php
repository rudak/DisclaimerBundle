<?php
namespace Rudak\Bundle\DisclaimerBundle\Controller;

use Rudak\Bundle\DisclaimerBundle\RudakDisclaimerBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    const ACTIVE_ITEM = null;

    public function showAction()
    {
        $DisclaimerData = $this->getTheDisclaimerObject();
        $this->get('MenuBundle.Handler')->setActiveItem(self::ACTIVE_ITEM);

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