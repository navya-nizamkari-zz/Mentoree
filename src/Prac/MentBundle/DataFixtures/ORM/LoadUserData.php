<?php
namespace Prac\MentBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Prac\MentBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		$user1 = new User();
		$user1->setName('Navya');
		$user1->setEmailId('navyasri.tech@gmail.com');
		$user1->setOccupation('working');
		$user1->setCompany('Practo');
		$user1->setIntro('Im a recent graduate');
		$user1->setRating(0);
		$user1->setExperience(0);
		$user1->setGithub('http://github.com/navya-nizamkari');
		$user1->setLinkedin('www.linkedin.com');
		
		$user2 = new User();
		$user2->setName('Satya');
		$user2->setEmailId('satyapriya.g@gmail.com');
		$user2->setOccupation('working');
		$user2->setCompany('Practo');
		$user2->setIntro('Im a recent graduate');
		$user2->setRating(0);
		$user2->setExperience(0);
		$user2->setGithub('http://github.com/satyapriyag');
		$user2->setLinkedin('www.linkedin.com/2');
		
		$em->persist($user1);
		$em->persist($user2);
		
		$em->flush();
	}
	
	
	
	public function getOrder()
	{
		return 2; // the order in which fixtures will be loaded
	}
}