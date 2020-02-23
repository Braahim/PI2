<?php

namespace SanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class medecinController extends Controller
{
    public function indexAction()
    {
        return $this->render('SanteBundle:Default:index.html.twig');
    }
    public function afficherMedecinnAction()
    {
        $em = $this->getDoctrine()->getManager();                           // clubs==essm l entity
        $medecin = $em->getRepository('SanteBundle:Medecin')            //  clubss==obj de type clubs
        ->findAll();
        return $this->render('@Sante/Gestion_medecin/medecin.html.twig',array(        //  essm l view elli feha partie html
            'medecin'=>$medecin
        ));
    }
}
