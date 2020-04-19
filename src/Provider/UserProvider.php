<?php

namespace App\Provider;

use App\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\EntityUserProvider;
use Doctrine\Common\Persistence\ManagerRegistry;

class UserProvider extends EntityUserProvider
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class, ['google' => 'googleId']);
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        /** @var User $user */
        $user = $this->findUser([$this->properties[$response->getResourceOwner()->getName()] => $response->getUsername()]);

        if (null === $user) {
            $user = new User();
            $user->setGoogleId($response->getUsername());
        }

        $user->setEmail($response->getEmail());
        $user->setFirstname($response->getFirstName());
        $user->setLastname($response->getLastName());

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }
}
