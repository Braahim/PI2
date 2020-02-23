<?php

namespace StockBundle\Controller;
use StockBundle\Entity\Don;
use StockBundle\Entity\Stock;
use StockBundle\Form\DonType;
use StockBundle\Form\RechercheType;
use StockBundle\Form\StockType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;




class StockController extends Controller
{

    public function AfficherStockAction()
    {

        $em = $this->getDoctrine()->getManager();
        $Dons= $em->getRepository("StockBundle:Don")->findAll();
        return $this->render('@Stock/Stock/afficheStock.html.twig',array('Dons'=>$Dons));
    }
    public function rechercheLibelleAction(Request $request){
        $Dons=new Don();
        $form=$this->createForm(RechercheType::class,$Dons);
        $form =$form->handleRequest($request);
        if($form->isSubmitted()){
            $Dons=$this->getDoctrine()
                ->getRepository(Don::class)
                ->findBy(array('libelle'=>$Dons->getLibelle()));

        }
        else{
            $Dons=$this->getDoctrine()
                ->getRepository(Don::class)
                ->findAll();
        }
        return $this->render('@Stock/Stock/afficheStock.html.twig',
            array('form'=>$form->createView(),'Dons'=>$Dons));
    }

}