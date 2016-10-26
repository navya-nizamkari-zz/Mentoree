<?php

namespace Prac\MentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skill
 */
class Skill
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user_skills;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user_skills = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Skill
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add user_skills
     *
     * @param \Prac\MentBundle\Entity\UserSkill $userSkills
     * @return Skill
     */
    public function addUserSkill(\Prac\MentBundle\Entity\UserSkill $userSkills)
    {
        $this->user_skills[] = $userSkills;

        return $this;
    }

    /**
     * Remove user_skills
     *
     * @param \Prac\MentBundle\Entity\UserSkill $userSkills
     */
    public function removeUserSkill(\Prac\MentBundle\Entity\UserSkill $userSkills)
    {
        $this->user_skills->removeElement($userSkills);
    }

    /**
     * Get user_skills
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserSkills()
    {
        return $this->user_skills;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }
    
    public function __toString()
    {
    	return $this->getName();
    }
}
