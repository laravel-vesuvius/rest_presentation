<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Exclude;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation\Timestampable;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Creditor
 *
 * @ORM\Table(name="creditor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CreditorRepository")
 * @UniqueEntity("registrationNumber", message="Registration number number must be unique")
 */
class Creditor
{
    /**
     *
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="registration_number", type="integer")
     * @Assert\NotBlank()
     */
    private $registrationNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_name", type="string", nullable=true)
     * @Assert\NotBlank()
     */
    private $bankName;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_account_number", type="bigint", nullable=true)
     * @Assert\NotBlank()
     */
    private $bankAccountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=255, nullable=true)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity="Deal", mappedBy="creditor")
     * @Exclude()
     */
    private $deals;

    /**
     * @ORM\OneToOne(targetEntity="CreditorContact", mappedBy="creditor", cascade={"all"})
     */
    private $contact;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", columnDefinition="TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP")
     */
    private $createdAt;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    /**
     * @param string $registrationNumber
     *
     * @return Creditor
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Creditor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     *
     * @return Creditor
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param CreditorContact $contact
     *
     * @return Creditor
     */
    public function setContact(CreditorContact $contact)
    {
        $contact->setCreditor($this);

        $this->contact = $contact;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Creditor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return Creditor
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return Creditor
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     *
     * @return Creditor
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     *
     * @return Creditor
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return Creditor
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeals()
    {
        return $this->deals;
    }

    /**
     * @param mixed $deals
     *
     * @return Creditor
     */
    public function setDeals($deals)
    {
        $this->deals = $deals;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Creditor
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Add deal
     *
     * @param \AppBundle\Entity\Deal $deal
     *
     * @return Creditor
     */
    public function addDeal(\AppBundle\Entity\Deal $deal)
    {
        $this->deals[] = $deal;

        return $this;
    }

    /**
     * Remove deal
     *
     * @param \AppBundle\Entity\Deal $deal
     */
    public function removeDeal(\AppBundle\Entity\Deal $deal)
    {
        $this->deals->removeElement($deal);
    }

    /**
     * Set bankName
     *
     * @param string $bankName
     *
     * @return Creditor
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;

        return $this;
    }

    /**
     * Get bankName
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * Set bankAccountNumber
     *
     * @param integer $bankAccountNumber
     *
     * @return Creditor
     */
    public function setBankAccountNumber($bankAccountNumber)
    {
        $this->bankAccountNumber = $bankAccountNumber;

        return $this;
    }

    /**
     * Get bankAccountNumber
     *
     * @return integer
     */
    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
    }
}
