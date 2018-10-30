<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table()
 * @UniqueEntity("houseNumber", message="Šis namo numeris yra užimtas")
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Įveskite vardą")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Įveskite pavardę")
     */
    private $lastName;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Įveskite adresą")
     */
    private $address;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Įveskite el. pašto adresą")
     * @Assert\Email(message="Įveskite validų el. pašto adresą")
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Įveskite telefono numerį")
     */
    private $phone;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Įveskite namo numerį")
     */
    private $houseNumber;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasCompensation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function getHouseNumber(): ?int
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(int $houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }

    public function getHasCompensation(): ?bool
    {
        return $this->hasCompensation;
    }

    public function setHasCompensation(bool $hasCompensation)
    {
        $this->hasCompensation = $hasCompensation;
    }
}