<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Form\ProjectImportType;
use AppBundle\Service\QrReader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/project-import")
 */
class ProjectImportController extends Controller
{
    /**
     * @Route("/qr-code", name="project_import")
     * @Template()
     */
    public function importAction(
        Request $request,
        QrReader $qrReader,
        EntityManagerInterface $em
    ) {
        $form = $this->createForm(ProjectImportType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fileName = $form->getData()->getFile()->getPathname();

            $projectId = $qrReader->readFromPdf($fileName);

            $project = $em->getRepository(Project::class)->find($projectId);

            if ($project) {
                return $this->redirectToRoute('project_details', [
                    'project' => $project->getId(),
                ]);
            } else {
                $form->get('file')->addError(
                    new FormError('Nepavyko identifikuoti QR kodo')
                );
            }
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/import-example", name="project_import_example")
     */
    public function importExample(): BinaryFileResponse
    {
        return $this->file('../src/AppBundle/Resources/data/project.pdf');
    }
}