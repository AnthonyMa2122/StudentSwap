<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
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
     * @ORM\Column(name="password", type="string", length=20)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=20)
     */
    private $phoneNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="userGroupId", type="integer")
     */
    private $userGroupId;

    /**
     * @var int
     *
     * @ORM\Column(name="openOrderId", type="integer")
     */
    private $openOrderId;

    /**
     * @var int
     *
     * @ORM\Column(name="flagCount", type="integer")
     */
    private $flagCount;


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
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
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
     * Set userGroupId
     *
     * @param integer $userGroupId
     *
     * @return User
     */
    public function setUserGroupId($userGroupId)
    {
        $this->userGroupId = $userGroupId;

        return $this;
    }

    /**
     * Get userGroupId
     *
     * @return int
     */
    public function getUserGroupId()
    {
        return $this->userGroupId;
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
     * @return int
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
     * @return int
     */
    public function getFlagCount()
    {
        return $this->flagCount;
    }
}
