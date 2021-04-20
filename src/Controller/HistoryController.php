<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Partie;
use App\Repository\ClientRepository;
use App\Repository\PartieRepository;
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
    public function index(PartieRepository $partieRepository): Response
    {
        $myclient = $this->getUser()->getId();
        $history = $partieRepository->findBy(array('client' => $myclient));
        return $this->render('history/index.html.twig', [
            'controller_name' => 'HistoryController',
            'historys' => $history,

        ]);
    }
}
