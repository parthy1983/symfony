<?php

namespace Thami\Bundle\ExerciseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 */
class Commentaires
{
    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Thami\Bundle\ExerciseBundle\Entity\Users
     */
    private $users;

    /**
     * @var \Thami\Bundle\ExerciseBundle\Entity\Posts
     */
    private $posts;


    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Commentaires
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Commentaires
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Commentaires
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Commentaires
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set users
     *
     * @param \Thami\Bundle\ExerciseBundle\Entity\Users $users
     * @return Commentaires
     */
    public function setUsers(\Thami\Bundle\ExerciseBundle\Entity\Users $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \Thami\Bundle\ExerciseBundle\Entity\Users 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set posts
     *
     * @param \Thami\Bundle\ExerciseBundle\Entity\Posts $posts
     * @return Commentaires
     */
    public function setPosts(\Thami\Bundle\ExerciseBundle\Entity\Posts $posts)
    {
        $this->posts = $posts;

        return $this;
    }

    /**
     * Get posts
     *
     * @return \Thami\Bundle\ExerciseBundle\Entity\Posts 
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
