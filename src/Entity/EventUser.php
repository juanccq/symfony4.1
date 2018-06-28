<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="event_user")
 * @ORM\Entity(repositoryClass="App\Repository\EventUserRepository")
 */
class EventUser implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;
    
    public function __contruct() {
        $this -> isActive = true;
        $this -> email = 'adf@asdf.om';
    }
    
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }
    
    public function getSalt() {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getRoles() {
        return [ 'ROLE_USER_EVENT' ];
    }
    
    public function eraseCredentials() {
        
    }
    
    public function serialize() {
        return serialize([
            $this -> id,
            $this -> email,
            $this -> password
        ]);
    }
    
    public function unserialize( $serialized ) {
        list(
            $this -> id,
            $this -> email,
            $this -> password
        ) = unserialize( $serialized, [ 'allowed_classes' => false ] );
    }

    public function getUsername(): ?string
    {
        return $this->email;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }


    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
