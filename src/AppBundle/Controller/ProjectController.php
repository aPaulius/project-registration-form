<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
     * @Route("/", name="project_register")
     * @Template()
     */
    public function registerAction(Request $request, EntityManagerInterface $em)
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $project = $form->getData();

            $em->persist($project);
            $em->flush();

            return $this->redirectToRoute('project_show', [
                'project' => $project->getId(),
            ]);
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/show/{project}", name="project_show")
     * @Template()
     */
    public function showAction(Project $project): array
    {
        return [
            'project' => $project,
        ];
    }

    /**
     * @Route("/details/{project}", name="project_details")
     * @Template()
     */
    public function detailsAction(Project $project): array
    {
        return [
            'project' => $project,
        ];
    }

    /**
     * @Route("/{project}/pdf", name="project_pdf")
     */
    public function pdfAction(
        Project $project,
        Pdf $pdfGenerator
    ): PdfResponse {
        $html = $this->render('@App/project/pdf.html.twig', ['project' => $project,]);

        return new PdfResponse(
            $pdfGenerator->getOutputFromHtml($html),
            'project.pdf'
        );
    }
}
