<?php

namespace App\Controller;

use App\Entity\ArgonauteTeam;
use App\Form\ArgonauteType;
use App\Repository\ArgonauteTeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArgonauteController extends AbstractController
{
    // route via annotations : une route nommée index qui est liée à l’URL /.
    /**
     * @Route("/", name="index")
     */
    public function create(Request $request, ArgonauteTeamRepository $repo): Response
    {
        // création du nouvel objet de l'entité ArgonauteTeam (instanciation de l'objet)
        $argonaute = new ArgonauteTeam();
        
        // actions dans la bdd
        $entityManager = $this->getDoctrine()->getManager();

        // utilisation du formulaire
        $form = $this->createForm(ArgonauteType::class, $argonaute);

        // analyse de la requête http par le formulaire, il va analyser s'il y a bien un l'input (récup et renvoit les infos du formulaire)
        $form->handleRequest($request);
        
        // dd($argonaute);
        // $safeData = htmlentities($argonaute->getName(), ENT_DISALLOWED);
        // dd($safeData);

        // condition : vérif si formulaire valide + si bouton cliqué alors...
        if($form->isSubmitted() && $form->isValid()) {
            
            // préparation à l'enregistrement en bdd
            $entityManager->persist($argonaute);

            // confirmation de l'enregistrement en bdd
            $entityManager->flush(); 

            // redirection de page
            return $this->redirectToRoute('index');

        }

        // on fais appel à notre objet (en cours ?) on récupère toutes les données/valeurs de l'entité ArgonauteTeam avec le $repo
        // $repo = injection de dépendances c'est une déclaration des dépendances dont on a besoin 
        $argonaute = $repo->findAll();

        // vue : afficher un modèle
            return $this->render('argonaute/index.html.twig', [
                'form' => $form->createView(),
                'argonaute' =>$argonaute
               
            ]);
    }

}
