<?php

namespace DashboardBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Dashboard_gestion_associationController extends Controller
{

    public function read_associationAction()
    {
        $association=$this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('@Dashboard/Gestion_association/gestion_association_read.html.twig',array('association'=>$association));
    }


}
