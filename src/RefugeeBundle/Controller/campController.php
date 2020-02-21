<?php

namespace RefugeeBundle\Controller;

use RefugeeBundle\Entity\camp;
use RefugeeBundle\Form\campType;
use RefugeeBundle\Repository\campRepository;
use RefugeeBundle\Form\campUpdateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Process\Process;


class campController extends Controller
{
    public function ajoutCampAction(Request $request)
    {
        $camp = new camp();
        $form = $this->createForm(campType::class, $camp);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($camp);
            $em->flush();
            return $this->redirectToRoute("refugee_ajoutCamp");
        }
        $camp = $em->getRepository("RefugeeBundle:camp")->findAll();


        return $this->render("@Refugee/Refugie/ajoutC.html.twig", array('form' => $form->createView(), 'camp' => $camp));
    }

    public function afficherCampAction()
    {
        $em = $this->getDoctrine()->getManager();
        $camp = $em->getRepository("RefugeeBundle:camp")->findAll();
        return $this->render("@Refugee/Refugie/ajouterC.html.twig", array('camp' => $camp));
    }

    public function  modifierCAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $camp = $em->getRepository("RefugeeBundle:camp")->find($id);
        $form = $this->createForm(campType::class, $camp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($camp);
            $em->flush();
            return $this->redirectToRoute("refugee_ajoutCamp");
        }
        return $this->render("@Refugee/Refugie/ajoutC1.html.twig", array('update' => $form->createView()));
    }

    public function supprimerCAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $camp = $em->getRepository("RefugeeBundle:camp")->find($id);
        if ($camp == null) return -1;
        else
        {
            $em->remove($camp);
            $em->flush();
            return $this->redirectToRoute("refugee_ajoutCamp");
        }
    }


}
