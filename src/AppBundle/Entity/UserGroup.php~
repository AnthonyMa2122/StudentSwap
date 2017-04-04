<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserGroup
 *
 * @ORM\Table(name="user_group")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserGroupRepository")
 */
class UserGroup
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
     * @ORM\Column(name="userGroupName", type="string", length=20)
     */
    private $userGroupName;


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
     * Set userGroupName
     *
     * @param string $userGroupName
     *
     * @return UserGroup
     */
    public function setUserGroupName($userGroupName)
    {
        $this->userGroupName = $userGroupName;

        return $this;
    }

    /**
     * Get userGroupName
     *
     * @return string
     */
    public function getUserGroupName()
    {
        return $this->userGroupName;
    }
}
