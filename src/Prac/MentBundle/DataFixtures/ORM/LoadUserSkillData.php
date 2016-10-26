<?php
/*namespace Prac\MentBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Prac\MentBundle\Entity\UserSkill;

class LoadUserSkillData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		$userSkill = new UserSkill();
		$userSkill->setUser(5);
		$userSkill->setSkill(5);

		$userSkill2 = new UserSkill();
		$userSkill2->setUser(6);
		$userSkill2->setSkill(6);

		$userSkill3 = new UserSkill();
		$userSkill3->setUser(6);
		$userSkill3->setSkill(5);

		$em->persist($userSkill);
		$em->persist($userSkill2);
		$em->persist($userSkill3);

		$em->flush();

		$this->addReference('navyaSkill-html', $userSkill);
		$this->addReference('navyaSkill-css', $userSkill2);
		$this->addReference('satyaSkill-html', $userSkill3);
	}

	public function getOrder()
	{
		return 1; // the order in which fixtures will be loaded
	}
}*/