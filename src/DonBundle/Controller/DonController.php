<?php

namespace DonBundle\Controller;

use DonBundle\DonBundle;
use DonBundle\Entity\Don;
use DonBundle\Form\DonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DonController extends Controller
{
    public function ajoutDonAction(Request $request)
    {
        $Don = new Don();
        $form = $this->createForm(DonType::class,$Don);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($Don);
            $em->flush();
            return $this->redirectToRoute('afficheDon');
        }
        return $this->render('@Don/Don/ajoutDon.html.twig', array("Form"=>$form->createView()));
    }

    public function modifDonAction(Request $request,$idDon)
    {
        $Don =new Don();
        $em=$this->getDoctrine()->getManager();
        $Don=$em->getRepository("DonBundle:Don")->find($idDon);

        $Form=$this->createForm(DonType::class,$Don) ;
        $Form->handleRequest($request);
        if($Form->isSubmitted() && $Form->isValid()){

            $em->flush();

            return $this->redirectToRoute('afficheDon');

        }
        return $this->render('@Don/Don/modifDon.html.twig',array('form'=>$Form->createView()));
    }

    public function afficheDonAction()
    {
        $em = $this->getDoctrine()->getManager();
        $don = $em->getRepository("DonBundle:Don")
        ->findAll();
        return $this->render('@Don/Don/afficheDon.html.twig',array(
            'don'=>$don
        ));
    }

    public function supprimerDonAction($idDon)
    {
        $em=$this->getDoctrine()->getManager();
        $Don=$em->getRepository(Don::class)->find($idDon);
        $em->remove($Don);
        $em->flush();

        return $this->redirectToRoute('afficheDon');
    }
}
