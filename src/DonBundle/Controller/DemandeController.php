<?php

namespace DonBundle\Controller;

use DonBundle\DonBundle;
use DonBundle\Form\DemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DonBundle\Entity\Demande;
use Symfony\Component\HttpFoundation\Request;

class DemandeController extends Controller
{
    public function afficheDemandeAction()
    {
        $em = $this->getDoctrine()->getManager();                           // clubs==essm l entity
        $demande = $em->getRepository("DonBundle:Demande")              //  clubss==obj de type clubs
        ->findAll();
        return $this->render('@Don/Demande/afficheDemande.html.twig',array(        //  essm l view elli feha partie html
            'demande'=>$demande
        ));
    }
}
