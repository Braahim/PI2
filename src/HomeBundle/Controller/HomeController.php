<?php

namespace HomeBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;

class HomeController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('@Home/Home/home.html.twig');
    }

    public function homeAction()
    {
        $association=$this->getDoctrine()->getRepository(User::class)->findBy(['roles'=>'ROLE_ASSOCIATION']);
        return $this->render('@Home/Home/template.html.twig',array('association'=>$association));
    }

    public function loginAction()
    {
        return $this->render('@Home/Home/login.html.twig');
    }

    public function registerAction()
    {
        return $this->render('@Home/Home/register.html.twig');
    }



}
