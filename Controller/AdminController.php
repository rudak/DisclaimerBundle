<?php
namespace Rudak\Bundle\DisclaimerBundle\Controller;

use Rudak\Bundle\DisclaimerBundle\RudakDisclaimerBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Rudak\Bundle\DisclaimerBundle\Form\DisclaimerDataType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{

    public function showAction()
    {
        $DisclaimerData = $this->getTheDisclaimerObject();

        return $this->render('RudakDisclaimerBundle:Admin:show.html.twig', array(
            'DisclaimerData' => $DisclaimerData
        ));
    }

    public function editAction()
    {
        $DisclaimerData = $this->getTheDisclaimerObject();
        $form           = $this->getEditForm($DisclaimerData);
        return $this->render('RudakDisclaimerBundle:Admin:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function updateAction(Request $request)
    {
        $DisclaimerData = $this->getTheDisclaimerObject();
        $form           = $this->getEditForm($DisclaimerData);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirect($this->generateUrl('Admin_Disclaimer_data_show'));
        }

        return $this->render('RudakDisclaimerBundle:Admin:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    private function getEditForm($DisclaimerData)
    {
        return $this->createForm(new DisclaimerDataType(), $DisclaimerData, array(
            'action' => $this->generateUrl('Admin_Disclaimer_data_update'),
            'method' => 'POST',
        ));
    }

    private function getTheDisclaimerObject()
    {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('RudakDisclaimerBundle:DisclaimerData')->find(1);
    }
} 