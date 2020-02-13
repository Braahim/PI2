<?php

namespace volunteerBundle\Controller;

use FOS\UserBundle\Model\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use volunteerBundle\Entity\Member;
use RefugeeBundle\Entity\refugie;
use volunteerBundle\Form\MemberType;
use volunteerBundle\volunteerBundle;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class VolunteerController extends Controller
{
    public function indexAction()
    {
        return $this->render('@volunteer/Default/index.html.twig');
    }

    public function volunteerAction()
    {
        return $this->render('@volunteer/Volunteer/volunteer.html.twig');
    }

    public function associationAction()
    {
        return $this->render('@volunteer/Association/Association_profile.html.twig');
    }

    public function read_memberAction()
    {
        $member=$this->getDoctrine()->getRepository(Member::class)->findAll();
        $em = $this->getDoctrine()->getManager();
        $refugee = $em->getRepository("RefugeeBundle:refugie")->findAll();
        return $this->render('@volunteer/Association/Association_profile.html.twig',array('member'=>$member , 'refugee'=>$refugee));
    }

    public function delete_memberAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $member=$em->getRepository(Member::class)->find($id);
        $em->remove($member);
        $em->flush();
        return $this->redirectToRoute('volunteer_association_profile');
    }

    public function add_memberAction(Request $request){
        $member=new Member();
        $form=$this->createForm(MemberType::class,$member);
        $form =$form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();
            return $this->redirectToRoute('volunteer_association_profile');
        }
        return $this->render('@volunteer/Association/add_member.html.twig',array('form'=>$form->createView()));
    }




    function  update_memberAction(Request $request,$id){
        $member =new Member();
        $em=$this->getDoctrine()->getManager();
        $member=$em->getRepository(Member::class)->find($id);

        $Form=$this->createForm(MemberType::class,$member) ;
        $Form->handleRequest($request);

        $submittedToken = $request->request->get('token');

        if ($this->isCsrfTokenValid('some-name', $submittedToken)) {
            // ... do something,
            if($Form->isSubmitted() && $Form->isValid()){
                $em->flush();
                return $this->redirectToRoute('volunteer_association_profile');

            }}

        return $this->render('@volunteer/Association/update_member.html.twig',array('form'=>$Form->createView()));
    }
   //Refugee
    public function ajoutRefugieAction(Request $request)
    {
        $refugie = new refugie();
        $form = $this->createForm(refugieType::class, $refugie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var UploadedFile $file
             *
             */
            $file=$refugie->getImg();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $refugie->setImg($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($refugie);
            $em->flush();
            return $this->redirectToRoute("volunteer_association_profile");
        }

        return $this->render("@volunteer/Association/ajoutR.html.twig", array('form' => $form->createView()));
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
            return $this->redirectToRoute("volunteer_association_profile");
        }
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
            return $this->redirectToRoute("volunteer_association_profile");
        }
        return $this->render("@volunteer/Association/modifierR.html.twig", array('form' => $form->createView()));
    }


}
