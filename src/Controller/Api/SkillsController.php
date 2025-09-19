<?php
// src/Controller/Api/SkillsController.php
namespace App\Controller\Api;

use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/skills', name: 'api_skills_')]
class SkillsController extends AbstractController
{
    private SkillRepository $skillRepository;

    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    #[Route('', name: 'list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        $skills = $this->skillRepository->findAll();

        $data = [];
        foreach ($skills as $skill) {
            $data[] = [
                'id' => $skill->getId(),
                'name' => $skill->getName(),
                'level' => $skill->getLevel(),
                'description' => $skill->getDescription(),
            ];
        }

        return $this->json($data);
    }
}
