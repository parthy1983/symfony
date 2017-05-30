<?php

namespace Thami\Bundle\ExerciseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $doctrine = $this->getDoctrine();
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Posts');
        $result_posts = $entityRepository->findAll();
        
        
        
        return $this->render('ThamiExerciseBundle:Default:index.html.twig', array(
                                                                            'result_posts' => $result_posts,
        ));
    }
    
    public function userAction()
    {
        $doctrine = $this->getDoctrine();
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Users');
        $result_users = $entityRepository->findAll();
        
        
        
        return $this->render('ThamiExerciseBundle:Default:index.html.twig', array(
                                                                            'users' => $result_users,
        ));
    }
      
       
    public function addAction()
    {
        // on cree un artile
        
        $post = new \Thami\Bundle\ExerciseBundle\Entity\Posts();
        
        $post->setTitle('title3');
        $post->setBody('bla bla added the body');
        $post->setCreated(new \DateTime);
        $post->setUpdated(new \DateTime);
        
          // Pour l'auteur
        // 1. On utilise doctrine;
        $doctrine = $this->getDoctrine();

        // 2. On récupére le dêpot des utilisateurs
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Users');

        // 3. On récupére l'utilisateur avec l'id 1
        $user = $entityRepository->find(1);

        // 4. On renseigne la propriété concernant l'auteur
        $post->setUser($user);

        // Enfin, on récupére le gestionnaire d'entités de doctrine
        $entityManager = $doctrine->getManager();
        // Voir : http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityManager.html

        // On ajouter cet article à la liste des entités à créer/modifier
        $entityManager->persist($post);


        // On "demande" à doctrine de repércuter sur la base de données
        $entityManager->flush();


        //return $this->render('SamisoftExercice1Bundle:Default:add.html.twig');
        
        return $this->render('ThamiExerciseBundle:Default:add.html.twig');
    }
    
    public function editAction()
    {
        $doctrine = $this->getDoctrine();

        //On récupére le dêpot des articles
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Posts');

        // On récupére un article, ici celui avec l'id 101
        $post = $entityRepository->find(3);

        // On modifie l'article en question
        $post->setBody('Content ou Pas lorem Pas ipsum Pas Content !!!');
        $post->setUpdated(new \DateTime());

        // On récupére le gestionnaire d'entités
        $entityManager = $doctrine->getManager();
        // Voir : http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityManager.html

        // On ajoute l'article à la liste des objets à sauvegarder (facultatif)
        // $entityManager->persist($post);

        // On répércute sur la base de données
        $entityManager->flush();
        
        return $this->render('ThamiExerciseBundle:Default:edit.html.twig');
    }
    
     public function deleteAction()
    {
          // On utilise doctrine;
        $doctrine = $this->getDoctrine();

        //On récupére le dêpot des articles
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Posts');

        // On récupére un article, ici celui avec l'id 101
        $post = $entityRepository->find(2);

        // On récupére le gestionnaire d'entités
        $entityManager = $doctrine->getManager();
        // Voir : http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityManager.html

        // On retire l'article à la liste des objets à sauvegarder (facultatif)
        $entityManager->remove($post);

        // On répércute sur la base de données
        $entityManager->flush();

        return $this->render('ThamiExerciseBundle:Default:delete.html.twig');
    }
}
