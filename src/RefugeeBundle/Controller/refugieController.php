<?php

namespace RefugeeBundle\Controller;

use RefugeeBundle\Entity\refugie;
use RefugeeBundle\Form\refugieType;
use RefugeeBundle\RefugeeBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Component\HttpFoundation\Response;
use RefugeeBundle\Repository\campRepository;

//require_once 'Dompdf/autoload.inc.php';

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
            $this->getDoctrine()->getRepository("RefugeeBundle:camp")->updateCapacityMinus($refugie->getCamp());

            $em->persist($refugie);
            $em->flush();
            return $this->redirectToRoute("volunteer_association_profile");
        }

        return $this->render("@volunteer/Association/ajoutR.html.twig", array('form' => $form->createView()));
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
            $this->getDoctrine()->getRepository("RefugeeBundle:camp")->updateCapacityPlus($refugie->getCamp());
            $em->remove($refugie);
            $em->flush();
            return $this->redirectToRoute("refugee_afficherRefugee");
        }
    }

    public function afficherDetailleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $refugee = $em->getRepository("RefugeeBundle:refugie")->find($id);

        $snappy = $this->get('knp_snappy.pdf');
        $snappy->setOption('no-outline', true);
        $snappy->setOption('page-size','LETTER');
        $snappy->setOption('encoding', 'UTF-8');
        $snappy->setOption('images' , true);

        $html= $this->renderView("@volunteer/Association/ficheR.html.twig", array('refugee' => $refugee));

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );



    }


   /* public function index($html)
    {



        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        //$pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true);

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file


        // Load HTML to Dompdf

        $dompdf->loadHtml($html);







        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');
       // $dompdf->output();

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
    }*/



}
