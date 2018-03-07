<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
//use AppBundle\CryptPassword;

class AppFixtures extends Fixture
{

public function load(ObjectManager $manager)
{
	//$pas = new CryptPassword;
	//$pas->setPassword('111');
	//$passwordEncoder = new UserPasswordEncoderInterface();
    // create 20 products! Bam!
    for ($i = 0; $i < 20; $i++) {
        $user = new User();
        $user->setEmail('weaverryan'.$i.'@gmail.com');
		//$password = '$2y$13$czIVnCeV1OF8ItSJgG7qV.3DUXYZuh7BaJwu.bKkmVTFGPf59JNte';
		$password = password_hash('111', PASSWORD_BCRYPT);//$pas->getCryptPassword();;
		$user->setPassword($password);
        $manager->persist($user);
    }

    $manager->flush();
}
}