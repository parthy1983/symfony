<?php

namespace Thami\Bundle\ExerciseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentaireController extends Controller
{
    public function commentaireAction()
    {
        $doctrine = $this->getDoctrine();
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Commentaires');
        $result_commentaires = $entityRepository->findAll();
        
        
        
        return $this->render('ThamiExerciseBundle:Commentaire:commentaire.html.twig', array(
                                                                            'result_commmentaires' => $result_commentaires,
        ));
    }
    
 
       
    public function addAction()
    {
        // on cree un artile
        
        $commentaire = new \Thami\Bundle\ExerciseBundle\Entity\Commentaires();
        
        $commentaire->setCommentaire('very great!!!');
        $commentaire->setCreated(new \DateTime);
        $commentaire->setUpdated(new \DateTime);
        
          // Pour l'auteur
        // 1. On utilise doctrine;
        $doctrine = $this->getDoctrine();

        // 2. On récupére le dêpot des utilisateurs
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Users');

        // 3. On récupére l'utilisateur avec l'id 1
        $user = $entityRepository->find(1);

        // 4. On renseigne la propriété concernant l'auteur
        $commentaire->setUsers($user);
        
         // 2. On récupére le dêpot des utilisateurs
        $entityRepository_post = $doctrine->getRepository('ThamiExerciseBundle:Posts');

        // 3. On récupére l'utilisateur avec l'id 1
        $post = $entityRepository_post->find(1);

        // 4. On renseigne la propriété concernant l'auteur
        $commentaire->setPosts($post);

        // Enfin, on récupére le gestionnaire d'entités de doctrine
        $entityManager = $doctrine->getManager();
        // Voir : http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityManager.html

        // On ajouter cet article à la liste des entités à créer/modifier
        $entityManager->persist($commentaire);


        // On "demande" à doctrine de repércuter sur la base de données
        $entityManager->flush();


        //return $this->render('SamisoftExercice1Bundle:Default:add.html.twig');
        
        return $this->render('ThamiExerciseBundle:Commentaire:add.html.twig');
    }
    
    public function editAction()
    {
        $doctrine = $this->getDoctrine();

        //On récupére le dêpot des articles
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Commentaires');

        // On récupére un article, ici celui avec l'id 101
        $post = $entityRepository->find(2);

        // On modifie l'article en question
        $post->setCommentaire('Content ou Pas lorem Pas ipsum Pas Content !!!');
        $post->setUpdated(new \DateTime());

        // On récupére le gestionnaire d'entités
        $entityManager = $doctrine->getManager();
        // Voir : http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityManager.html

        // On ajoute l'article à la liste des objets à sauvegarder (facultatif)
        // $entityManager->persist($post);

        // On répércute sur la base de données
        $entityManager->flush();
        
        return $this->render('ThamiExerciseBundle:Commentaire:edit.html.twig');
    }
    
     public function deleteAction()
    {
          // On utilise doctrine;
        $doctrine = $this->getDoctrine();

        //On récupére le dêpot des articles
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Commentaires');

        // On récupére un article, ici celui avec l'id 101
        $post = $entityRepository->find(3);

        // On récupére le gestionnaire d'entités
        $entityManager = $doctrine->getManager();
        // Voir : http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityManager.html

        // On retire l'article à la liste des objets à sauvegarder (facultatif)
        $entityManager->remove($post);

        // On répércute sur la base de données
        $entityManager->flush();

        return $this->render('ThamiExerciseBundle:Commentaire:delete.html.twig');
    }
}
