<?php

namespace Prac\MentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
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
     * @var string
     */
    private $email_id;

    /**
     * @var string
     */
    private $occupation;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $intro;

    /**
     * @var integer
     */
    private $rating;

    /**
     * @var integer
     */
    private $experience;

    /**
     * @var string
     */
    private $github;

    /**
     * @var string
     */
    private $linkedin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user_skills;

    /**
     * @var \Prac\MentBundle\Entity\Category
     */
    private $category;

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
     * @return User
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
     * Set email_id
     *
     * @param string $emailId
     * @return User
     */
    public function setEmailId($emailId)
    {
        $this->email_id = $emailId;

        return $this;
    }

    /**
     * Get email_id
     *
     * @return string 
     */
    public function getEmailId()
    {
        return $this->email_id;
    }

    /**
     * Set occupation
     *
     * @param string $occupation
     * @return User
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get occupation
     *
     * @return string 
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return User
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set intro
     *
     * @param string $intro
     * @return User
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string 
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return User
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set experience
     *
     * @param integer $experience
     * @return User
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return integer 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set github
     *
     * @param string $github
     * @return User
     */
    public function setGithub($github)
    {
        $this->github = $github;

        return $this;
    }

    /**
     * Get github
     *
     * @return string 
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     * @return User
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string 
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Add user_skills
     *
     * @param \Prac\MentBundle\Entity\UserSkill $userSkills
     * @return User
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
     * Set category
     *
     * @param \Prac\MentBundle\Entity\Category $category
     * @return User
     */
    public function setCategory(\Prac\MentBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Prac\MentBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }
    
    public function __toString()
    {
    	return $this->getName();
    }
}
