<?php

namespace App\Controller;


use App\Entity\Ressource;
use App\Entity\Utilisateur;
use App\Entity\Favoris;
use App\Entity\Commentaire;
use App\Form\AjoutRessourcesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class SiteController extends AbstractController
{
    private $entityManager;
    private $managerRegistry;


    public function __construct(EntityManagerInterface $entityManager,ManagerRegistry $managerRegistry)
    {
        $this->entityManager = $entityManager;
        $this->managerRegistry = $managerRegistry;
    }
  
    
    #[Route('/site', name: 'app_site')]
    public function index(): Response
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }


#[Route('/Affichageprofil', name: 'Affichageprofil')]
public function Affichageprofil(): Response
{
  // Récupération de l'utilisateur connecté
  $user = $this->getUser();

  // Récupération de toutes les ressources de l'utilisateur
  $repository = $this->entityManager->getRepository(Ressource::class);
  $ressources = $repository->createQueryBuilder('r')
      ->where('r.iduserressource = :userid')
      ->setParameter('userid', $user-> getIdUser())
      ->getQuery()
      ->getResult();
    
  // Renvoi de la réponse avec les ressources en paramètres
  return $this->render('site/profil.html.twig', [
      'user' => $user,
      'ressources' => $ressources,
  ]);
}
#[Route('/AfficherFavoris', name: 'AfficherFavoris')]
public function AfficherFavoris(): Response
{
  // Récupération de l'utilisateur connecté
$user = $this->getUser();

// Récupération des ressources favorites de l'utilisateur
$favorisRepository = $this->entityManager->getRepository(Favoris::class);
$favoris = $favorisRepository->createQueryBuilder('f')
    ->where('f.IDuser = :userid')
    ->setParameter('userid', $user->getIdUser())
    ->getQuery()
    ->getResult();

// Création d'un tableau pour stocker les ressources favorites de l'utilisateur
$ressources = array();

// Itération sur les favoris de l'utilisateur pour récupérer les ressources associées
foreach ($favoris as $favori) {
    $ressources[] = $favori->getIdressource();
}

// Renvoi de la réponse avec les ressources en paramètres
return $this->render('site/Affichagefavoris.html.twig', [
    'user' => $user,
    'ressources' => $ressources,
]);
}

    #[Route('/Accueil', name: 'Accueil')]
    public function Accueil(Request $request, ManagerRegistry $doctrine): Response
    { 
      

        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        //Récupération de toutes les ressources
        $repository = $this->entityManager->getRepository(Ressource::class);
        $ressources = $repository->findAll();

        // Récupération des favoris pour chaque ressource
        $ajoute=[];
        foreach ($ressources as $ressource) {
            $favoris = $doctrine->getRepository(Favoris::class)->findOneBy([
            'IDuser' => $user,
            'IDressource' => $ressource,
            ]);

            if (!$favoris) {
               $ajoute[]=false;
            } else {
                $ajoute[]=true;
            }
        }

        // Récupération des commentaires pour chaque ressource
        $commentaires = [];
        foreach ($ressources as $ressource) {
            $comRepository = $this->entityManager->getRepository(Commentaire::class);
            $com = $comRepository->createQueryBuilder('c')
            ->where('c.idrescommentaire = :IDRessource')
            ->setParameter('IDRessource', $ressource->getidressource())
            ->getQuery()
            ->getResult();
            $commentaires[]=$com;       
        }
        // Récupération de l'entité User pour chaque commenatire
        $userscom = [];
        foreach ($commentaires as $commentaires_ressource) {
             foreach ($commentaires_ressource as $commentaire) {
                 $userId = $commentaire->getidusercommentaire();
                 $usercomRepository = $this->managerRegistry->getRepository(Utilisateur::class);
                 $user = $usercomRepository->find($userId);
                 $userscom[] = $user;
            }
        }
       // Récupération de l'entité User pour chaque ressource
       $users = [];
       foreach ($ressources as $ressource) {
           $userId = $ressource->getiduserressource();
           $userRepository = $this->managerRegistry->getRepository(Utilisateur::class);
           $user = $userRepository->find($userId);
           $users[] = $user;
       }
      
       // Renvoi de la réponse avec les ressources et les utilisateurs en paramètres
       return $this->render('site/Accueil.html.twig', [
           'ressources' => $ressources,
           'users' => $users,
           'commentaires'=>$commentaires,
           'userscom' => $userscom,
           'ajoute'=>$ajoute,
       ]);
    }

    #[Route('/AjoutRessource', name: 'AjoutRessource')]
    public function formulaireRessource(?Ressource $ressource,ManagerRegistry $doctrine, Request $request): Response
    { 
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        if (!$ressource) {
            $ressource = new Ressource();
        }
  
        $form = $this->createForm(AjoutRessourcesType::class,$ressource);
        $form->handleRequest($request);

        if($form->isSubmitted()){

            $ressource->setiduserressource($user);

            $fichierTelecharge = $form->get('fichierressource')->getData();
            
            $entityManager= $doctrine->getManager();
            if($fichierTelecharge)
            {


            // Récupération du nom de fichier avec l'extension
            $nom_fichier = basename($fichierTelecharge);


            // Vérifier si le fichier téléchargé est bien un PDF
            if ($fichierTelecharge instanceof UploadedFile && $fichierTelecharge
            ->getClientMimeType() === 'application/pdf') {
            $fichier = $nom_fichier; // Définir le nom de fichier avec l'extension .pdf
            $fichierTelecharge->move($this->getParameter('pdfs_directory'), $fichier); // Enregistrer le fichier
            }
             // Vérifier si le fichier téléchargé est bien une image
            if ($fichierTelecharge instanceof UploadedFile && $fichierTelecharge
            ->getClientMimeType() === 'image/jpeg') {
                $fichier =$nom_fichier; 
                $fichierTelecharge->move($this->getParameter('images_directory'), $fichier); // Enregistrer le fichier
            }
            $ressource->setFichierressource($fichier);
            
            }

            $entityManager->persist($ressource);
            $entityManager->flush();
        }

        return $this->render('site/AjoutRessource.html.twig', [
        'formRessource'=> $form->createView(),
        ]);
    }
   
    #[Route('/Favoris', name: 'Favoris')]
    public function ajouterFavoris(Request $request, ManagerRegistry $doctrine): Response
{
    // Récupère l'utilisateur actuellement authentifié
    $utilisateur = $this->getUser();
    $ressourceId = $request->request->get('ressourceId');

    // Récupère l'objet ressource
    $entityManager = $doctrine->getManager();
    $ressource = $entityManager->getRepository(Ressource::class)->find($ressourceId);
  

    $favoris = $doctrine->getRepository(Favoris::class)->findOneBy([
        'IDuser' => $utilisateur,
        'IDressource' => $ressource,
    ]);

    if (!$favoris) {
        $favoris = new Favoris();
        $favoris->setIDuser($utilisateur);
        $favoris->setIDressource($ressource);
        // Persister l'entité
        $entityManager->persist($favoris);
        $entityManager->flush();
    } else {
        $entityManager->remove($favoris);
        $entityManager->flush();
    }

    return $this->redirectToRoute('home');
}

#[Route('/Commentaire', name: 'Commentaire')]
public function Commentaire(Request $request, ManagerRegistry $doctrine): Response
{
        // Récupère l'utilisateur actuellement authentifié
        $utilisateur = $this->getUser()->getIdUser();

        $ressourceId = $request->request->get('ressourceId');
        $contenu = $request->request->get('commentaire');

         // Récupère l'objet ressource
        $entityManager = $doctrine->getManager();
        $ressource = $entityManager->getRepository(Ressource::class)->find($ressourceId)->getidressource();

        $Date=new \DateTime();
        $now = new \DateTime();
        $heure = $now->format('H:i:s');

        $commentaire = new Commentaire();
        $commentaire->setidusercommentaire($utilisateur);
        $commentaire->setidrescommentaire($ressource);
        $commentaire->setcontenucommentaire($contenu);
        $commentaire->setdatecommentaire($Date);
        $commentaire->setheurecommentaire($heure);

        $entityManager->persist($commentaire);
        $entityManager->flush();
      
   // Renvoi de la réponse avec les ressources et les utilisateurs en paramètres
   return $this->redirectToRoute('home');
}

}
