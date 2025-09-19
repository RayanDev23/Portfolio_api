<?php

namespace App\Controller\Api;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/projects', name: 'api_projects_')]
class ProjectController extends AbstractController
{
    private ProjectRepository $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    #[Route('', name: 'list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        $projects = $this->projectRepository->findAll();

        $data = [];
        foreach ($projects as $project) {
            $data[] = [
                'id' => $project->getId(),
                'title' => $project->getTitle(),
                'description' => $project->getDescription(),
                'image' => $project->getImage(),
                'link' => $project->getLink(),
            ];
        }

        return $this->json($data);
    }
}
