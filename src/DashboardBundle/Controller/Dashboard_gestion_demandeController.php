<?php

namespace DashboardBundle\Controller;

use DonBundle\DonBundle;
use DonBundle\Form\DemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DonBundle\Entity\Demande;
use Symfony\Component\HttpFoundation\Request;

class Dashboard_gestion_demandeController extends Controller
{
    public function afficheDemandeAction()
    {
        $em = $this->getDoctrine()->getManager();                           // clubs==essm l entity
        $demande = $em->getRepository("DonBundle:Demande")              //  clubss==obj de type clubs
        ->findAll();
        return $this->render('@Dashboard/Gestion_demande/gestion_demande_read.html.twig',array(        //  essm l view elli feha partie html
            'demande'=>$demande
        ));
    }

    public function supprimerDemAction($idDemande)
    {
        $em=$this->getDoctrine()->getManager();
        $Demande=$em->getRepository(Demande::class)->find($idDemande);
        $em->remove($Demande);
        $em->flush();

        return $this->redirectToRoute('dashboard_gestion_demande_page');
    }

    public function modifierDemAction(Request $request,$idDemande)
    {
        $Demande =new Demande();
        $em=$this->getDoctrine()->getManager();
        $Demande =$em->getRepository("DonBundle:Demande")->find($idDemande);

        $Form=$this->createForm(DemandeType::class,$Demande) ;
        $Form->handleRequest($request);
        if($Form->isSubmitted() && $Form->isValid()){

            $em->flush();

            return $this->redirectToRoute('dashboard_gestion_demande_page');

        }
        return $this->render('@Dashboard/Gestion_demande/gestion_demande_update.html.twig',array('form'=>$Form->createView()));
    }



    public function ajouterDemandeAction(Request $request)
    {
        $demand=new Demande();
        $form=$this->createForm(DemandeType::class,$demand);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($demand);
            $em->flush();
            return $this->redirectToRoute('sms_ru');
        }
        return $this->render('@Dashboard/Gestion_demande/gestion_demande_add.html.twig',array("form"=>$form->createView()));
    }


}
