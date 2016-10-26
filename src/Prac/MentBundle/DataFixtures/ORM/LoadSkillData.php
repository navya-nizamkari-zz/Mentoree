<?php
namespace Prac\MentBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Prac\MentBundle\Entity\Skill;

class LoadSkillData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		$skill = new Skill();
		$skill->setName('HTML');

		$skill2 = new Skill();
		$skill2->setName('CSS');
		
		$skill3 = new Skill();
		$skill3->setName('JAVA');

		$em->persist($skill);
		$em->persist($skill2);
		$em->persist($skill3);

		$em->flush();

		$this->addReference('skill-html', $skill);
		$this->addReference('skill-css', $skill2);
		$this->addReference('skill-java', $skill3);
	}

	public function getOrder()
	{
		return 1; // the order in which fixtures will be loaded
	}
}