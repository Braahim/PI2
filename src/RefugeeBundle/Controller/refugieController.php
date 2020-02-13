<?php

namespace RefugeeBundle\Controller;

use RefugeeBundle\Entity\refugie;
use RefugeeBundle\Form\refugieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Refugie controller.
 *
 * @Route("refugie")
 */
class refugieController extends Controller
{
    /**
     * Lists all refugie entities.
     *
     * @Route("/", name="refugie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $refugies = $em->getRepository('RefugeeBundle:refugie')->findAll();

        return $this->render('refugie/index.html.twig', array(
            'refugies' => $refugies,
        ));
    }

    /**
     * Finds and displays a refugie entity.
     *
     * @Route("/{id}", name="refugie_show")
     * @Method("GET")
     */
    public function showAction(refugie $refugie)
    {

        return $this->render('refugie/show.html.twig', array(
            'refugie' => $refugie,
        ));
    }

    public function ajoutRefugieAction(Request $request)
    {
        $refugie = new refugie();
        $form = $this->createForm(refugieType::class, $refugie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($refugie);
            $em->flush();
            return $this->redirectToRoute("refugee_afficherRefugee");
        }

        return $this->render("@Refugee/Refugie/ajoutR.html.twig", array('form' => $form->createView()));
    }

    public function afficherDetailleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $refugee = $em->getRepository("RefugeeBundle:refugie")->find($id);
        return $this->render("@Refugee/Refugie/ajoutR.html.twig", array('refugee' => $refugee));
    }

    public function afficherRefugeeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $refugee = $em->getRepository("RefugeeBundle:refugie")->findAll();
        return $this->render("@volunteer/Association/Association_profile.html.twig", array('refugee' => $refugee));
    }

    public function  modifierRefugieAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $refugie = $em->getRepository("RefugeeBundle:refugie")->find($id);
        $form = $this->createForm(refugieType::class, $refugie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($refugie);
            $em->flush();
            return $this->redirectToRoute("refugee_afficherRefugee");
        }
        return $this->render("@Refugee/Refugie/modifierR.html.twig", array('form' => $form->createView()));
    }

    public function supprimerRefugieAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $refugie = $em->getRepository("RefugeeBundle:refugie")->find($id);
        if ($refugie == null) return -1;
        else
        {
            $em->remove($refugie);
            $em->flush();
            return $this->redirectToRoute("refugee_afficherRefugee");
        }
    }



}
