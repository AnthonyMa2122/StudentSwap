<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=35)
     *
     * @Assert\NotBlank(message="Please enter first name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=35,
     *     minMessage="The first name is too short.",
     *     maxMessage="The first name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=35)
     *
     * @Assert\NotBlank(message="Please enter last name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=35,
     *     minMessage="The last name is too short.",
     *     maxMessage="The last name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=20)
     */
    protected $phoneNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="openOrderId", type="integer", nullable=true)
     */
    protected $openOrderId;

    /**
     * @var int
     *
     * @ORM\Column(name="flagCount", type="integer", nullable=true)
     */
    protected $flagCount;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        $email = is_null($email) ? '' : $email;
        parent::setEmail($email);
        $this->setUsername($email);

        return $this;
    }


    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set openOrderId
     *
     * @param integer $openOrderId
     *
     * @return User
     */
    public function setOpenOrderId($openOrderId)
    {
        $this->openOrderId = $openOrderId;

        return $this;
    }

    /**
     * Get openOrderId
     *
     * @return integer
     */
    public function getOpenOrderId()
    {
        return $this->openOrderId;
    }

    /**
     * Set flagCount
     *
     * @param integer $flagCount
     *
     * @return User
     */
    public function setFlagCount($flagCount)
    {
        $this->flagCount = $flagCount;

        return $this;
    }

    /**
     * Get flagCount
     *
     * @return integer
     */
    public function getFlagCount()
    {
        return $this->flagCount;
    }
}
