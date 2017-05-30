<?php

namespace Thami\Bundle\ExerciseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{

    public function userAction()
    {
        $doctrine = $this->getDoctrine();
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Users');
        $result_users = $entityRepository->findAll();
        
        
        
        return $this->render('ThamiExerciseBundle:User:user.html.twig', array(
                                                                            'result_users' => $result_users,
        ));
    }
    
    
           
      public function addAction()
    {
        // on cree un artile
        
        $user = new \Thami\Bundle\ExerciseBundle\Entity\Users();
        
        $user->setUsername('admin1');
        $user->setPassword('admin123');
        $user->setEmail('admin11@gmail.com');
        
        
          // Pour l'auteur
        // 1. On utilise doctrine;
        $doctrine = $this->getDoctrine();

        // 2. On récupére le dêpot des utilisateurs
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Users');

        // 3. On récupére l'utilisateur avec l'id 1
       

        // 4. On renseigne la propriété concernant l'auteur
        //$post->setUser($user);

        // Enfin, on récupére le gestionnaire d'entités de doctrine
        $entityManager = $doctrine->getManager();
        // Voir : http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityManager.html

        // On ajouter cet article à la liste des entités à créer/modifier
        $entityManager->persist($user);


        // On "demande" à doctrine de repércuter sur la base de données
        $entityManager->flush();


        //return $this->render('SamisoftExercice1Bundle:Default:add.html.twig');
        
        return $this->render('ThamiExerciseBundle:User:add.html.twig');
    }
     public function editAction()
    {
        $doctrine = $this->getDoctrine();

        //On récupére le dêpot des users
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Users');

        // On récupére un article, ici celui avec l'id 101
        $user = $entityRepository->find(3);

        // On modifie l'article en question
        $user->setUsername('superadmin');
        

        // On récupére le gestionnaire d'entités
        $entityManager = $doctrine->getManager();
        // Voir : http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityManager.html

        // On ajoute l'article à la liste des objets à sauvegarder (facultatif)
        // $entityManager->persist($post);

        // On répércute sur la base de données
        $entityManager->flush();
        
        return $this->render('ThamiExerciseBundle:User:edit.html.twig');
    }
    
     public function deleteAction()
    {
          // On utilise doctrine;
        $doctrine = $this->getDoctrine();

        //On récupére le dêpot des articles
        $entityRepository = $doctrine->getRepository('ThamiExerciseBundle:Users');

        // On récupére un article, ici celui avec l'id 101
        $user = $entityRepository->find(5);

        // On récupére le gestionnaire d'entités
        $entityManager = $doctrine->getManager();
        // Voir : http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityManager.html

        // On retire l'article à la liste des objets à sauvegarder (facultatif)
        $entityManager->remove($user);

        // On répércute sur la base de données
        $entityManager->flush();

        return $this->render('ThamiExerciseBundle:User:delete.html.twig');
    }
}
