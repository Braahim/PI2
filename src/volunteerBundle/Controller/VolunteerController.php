<?php

namespace volunteerBundle\Controller;

use FOS\UserBundle\Model\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use volunteerBundle\Entity\Member;
use volunteerBundle\Form\MemberType;
use volunteerBundle\volunteerBundle;

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
        return $this->render('@volunteer/Association/Association_profile.html.twig',array('member'=>$member));
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


}
