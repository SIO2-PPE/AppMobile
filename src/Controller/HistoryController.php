<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Partie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
/**
 *
 * @IsGranted("ROLE_USER")
 */
class HistoryController extends AbstractController
{

    /**
     * @Route("/history", name="history")
     */
    public function index(): Response
    {
        $myclient = $this->getUser();
        $history = array($myclient->getParties());
        return $this->render('history/index.html.twig', [
            'controller_name' => 'HistoryController',
            'historys' => $history,

        ]);
    }
}
