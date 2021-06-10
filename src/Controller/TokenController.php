<?php

declare(strict_types=1);

namespace ISAAC\GazeSymfonyBundle\Controller;

use ISAAC\GazePublisher\GazePublisher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class TokenController extends AbstractController
{
    /**
     * @var GazePublisher
     */
    private $gaze;

    public function __construct(GazePublisher $gaze)
    {
        $this->gaze = $gaze;
    }

    public function index(): Response
    {
        $roles = [];
        $user = $this->getUser();
        if ($user !== null && $user instanceof UserInterface) {
            $roles = $user->getRoles();
        }
        return new JsonResponse([
            'token' => $this->gaze->generateClientToken($roles),
        ]);
    }
}
