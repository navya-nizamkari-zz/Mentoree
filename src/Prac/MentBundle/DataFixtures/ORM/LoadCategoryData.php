<?php
namespace Prac\MentBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Prac\MentBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		$mentor = new Category();
		$mentor->setName('Mentor');

		$mentee = new Category();
		$mentee->setName('Mentee');

		$mentor_mentee = new Category();
		$mentor_mentee->setName('Mentor/Mentee');

		$em->persist($mentor);
		$em->persist($mentee);
		$em->persist($mentor_mentee);
		
		$em->flush();

		$this->addReference('category-mentor', $mentor);
		$this->addReference('category-mentee', $mentee);
		$this->addReference('category-mentor_mentee', $mentor_mentee);
	}

	public function getOrder()
	{
		return 1; // the order in which fixtures will be loaded
	}
}