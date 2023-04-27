<?php

namespace App\Security;

use App\entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;



class UserProvider implements UserProviderInterface
{
    private $UtilisateurRepository;

    public function __construct(UtilisateurRepository $UtilisateurRepository)
    {
        $this->UtilisateurRepository = $UtilisateurRepository;
    }
    /**
     * Symfony calls this method if you use features like switch_user
     * or remember_me.
     *
     * If you're not using these features, you do not need to implement
     * this method.
     *
     * @throws UserNotFoundException if the user is not found
     */
    public function loadUserByIdentifier($identifier): UserInterface
    {
        
       $user = $this->UtilisateurRepository->findOneBy(['mailuser' => $identifier]);
       if (!$user) {
        throw new \Symfony\Component\Security\Core\Exception\AuthenticationException('User not found');
    }

        // ici, nous utilisons la classe User fournie par Symfony pour instancier l'utilisateur
        return new \App\Entity\Utilisateur(
            $user->getMailUser(),
            $user->getPassword(),
            $user->getRoles()
        );
    }

    /**
     * Refreshes the user after being reloaded from the session.
     *
     * When a user is logged in, at the beginning of each request, the
     * User object is loaded from the session and then this method is
     * called. Your job is to make sure the user's data is still fresh by,
     * for example, re-querying for fresh User data.
     *
     * If your firewall is "stateless: true" (for a pure API), this
     * method is not called.
     */
    public function refreshUser(UserInterface $user): UserInterface
    {
        if (!$user instanceof Utilisateur) {
            throw new UnsupportedUserException(sprintf('Invalid user class "%s".', get_class($user)));
        }

        // Return a User object after making sure its data is "fresh".
        // Or throw a UsernameNotFoundException if the user no longer exists.
        throw new \Exception('TODO: fill in refreshUser()');
    }

    /**
     * Tells Symfony to use this provider for this User class.
     */
    public function supportsClass(string $class): bool
    {
        return Utilisateur::class === $class || is_subclass_of($class, Utilisateur::class);
    }

    /**
     * Upgrades the hashed password of a user, typically for using a better hash algorithm.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof Utilisateur) {
            throw new UnsupportedUserException(sprintf('Invalid user class "%s".', get_class($user)));
        }

        // Set the new hashed password for the user
        $user->setPassword($newHashedPassword);

        // Update the user in the database
        $this->UtilisateurRepository->persist($user);
        $this->UtilisateurRepository->flush();
    }
}
