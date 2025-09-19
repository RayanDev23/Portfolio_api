<?php
// src/Controller/Api/ContactController.php
namespace App\Controller\Api;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/api/contacts', name: 'create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $nom = $data['nom'] ?? null;
        $email = $data['email'] ?? null;
        $message = $data['message'] ?? null;

        if (!$nom || !$email || !$message) {
            return new JsonResponse(['error' => 'Données manquantes'], 400);
        }

        $contact = new Contact();
        $contact->setNom($nom)
        ->setEmail($email)
        ->setMessage($message)
        ->setCreatedAt(new \DateTime());

        $this->em->persist($contact);
        $this->em->flush();

        return new JsonResponse(['success' => 'Message enregistré !'], 201);
    }
}

