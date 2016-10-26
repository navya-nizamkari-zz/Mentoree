<?php

namespace Prac\MentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserSkill
 */
class UserSkill
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Prac\MentBundle\Entity\User
     */
    private $user;

    /**
     * @var \Prac\MentBundle\Entity\Skill
     */
    private $skill;


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
     * Set user
     *
     * @param \Prac\MentBundle\Entity\User $user
     * @return UserSkill
     */
    public function setUser(\Prac\MentBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Prac\MentBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set skill
     *
     * @param \Prac\MentBundle\Entity\Skill $skill
     * @return UserSkill
     */
    public function setSkill(\Prac\MentBundle\Entity\Skill $skill = null)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \Prac\MentBundle\Entity\Skill 
     */
    public function getSkill()
    {
        return $this->skill;
    }
    
    public function __toString()
    {
    	return $this->getName();
    }
}
