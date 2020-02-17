<?php

namespace DashboardBundle\Controller;

use DonBundle\DonBundle;
use DonBundle\Form\DemandeType;
use SanteBundle\Entity\Medecin;
use SanteBundle\Entity\Specialite;
use SanteBundle\Form\MedecinType;
use SanteBundle\Form\SpecialiteType;
use SanteBundle\SanteBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DonBundle\Entity\Demande;
use Symfony\Component\HttpFoundation\Request;

class Dashboard_gestion_specialiteController extends Controller
{
    public function afficheSpecialiteAction()
    {
        $em = $this->getDoctrine()->getManager();                           // clubs==essm l entity
        $specialite = $em->getRepository('SanteBundle:Specialite')            //  clubss==obj de type clubs
        ->findAll();
        return $this->render('@Dashboard/Gestion_specialite/gestion_specialite_read.html.twig',array(        //  essm l view elli feha partie html
            'spec'=>$specialite
        ));
    }
    public function afficherMedecinAction()
    {
        $em = $this->getDoctrine()->getManager();                           // clubs==essm l entity
        $medecin = $em->getRepository('SanteBundle:Medecin')            //  clubss==obj de type clubs
        ->findAll();
        return $this->render('@Dashboard/Gestion_medecin/gestion_medecin_read.html.twig',array(        //  essm l view elli feha partie html
            'medecin'=>$medecin
        ));
    }
    public function supprimerMedecinAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $medecin=$em->getRepository(Medecin::class)->find($id);
        $em->remove($medecin);
        $em->flush();

        return $this->redirectToRoute('dashboard_gestion_medecin_page');
    }

    public function supprimerSpecAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $Specialite=$em->getRepository(Specialite::class)->find($id);
        $em->remove($Specialite);
        $em->flush();

        return $this->redirectToRoute('dashboard_gestion_specialite_page');
    }

    public function modifierSpecAction(Request $request,$id)
    {
        $Specialite =new Specialite();
        $em=$this->getDoctrine()->getManager();
        $Specialite =$em->getRepository('SanteBundle:Specialite')->find($id);

        $Form=$this->createForm(SpecialiteType::class,$Specialite) ;
        $Form->handleRequest($request);
        if($Form->isSubmitted() && $Form->isValid()){

            $em->flush();

            return $this->redirectToRoute('dashboard_gestion_specialite_page');

        }
        return $this->render('@Dashboard/Gestion_specialite/gestion_specialite_update.html.twig',array('form'=>$Form->createView()));
    }



    public function ajouterSpecialiteAction(Request $request)
    {
        $specialite=new Specialite();
        $form=$this->createForm(SpecialiteType::class,$specialite);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($specialite);
            $em->flush();
            return $this->redirectToRoute('dashboard_gestion_specialite_page');
        }
        return $this->render('@Dashboard/Gestion_specialite/gestion_specialite_add.html.twig',array("form"=>$form->createView()));
    }
    public function ajouterMedecinAction(Request $request)
    {
        $medecin=new Medecin();
        $form=$this->createForm(MedecinType::class,$medecin);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($medecin);
            $em->flush();
            return $this->redirectToRoute('dashboard_gestion_medecin_page');
        }
        return $this->render('@Dashboard/Gestion_medecin/gestion_medecin_add.html.twig',array("form"=>$form->createView()));
    }

    public function modifierMedecinAction(Request $request,$id)
    {
        $medecin =new Medecin();
        $em=$this->getDoctrine()->getManager();
        $medecin=$em->getRepository('SanteBundle:Medecin')->find($id);

        $Form=$this->createForm(MedecinType::class,$medecin) ;
        $Form->handleRequest($request);
        if($Form->isSubmitted() && $Form->isValid()){

            $em->flush();

            return $this->redirectToRoute('dashboard_gestion_medecin_page');

        }
        return $this->render('@Dashboard/Gestion_medecin/gestion_medecin_update.html.twig',array('form'=>$Form->createView()));
    }



}
