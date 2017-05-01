<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemRepository")
 */
class Item
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var decimal
     *
     * @ORM\Column(name="price", type="decimal" , precision=8, scale=2)
     */
    protected $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=10)
     */
    protected $category;

    /**
     * @var int
     *
     * @ORM\Column(name="userId", type="integer")
     */
    protected $userId;

    /**
     * @Assert\DateTime()
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    protected $dateCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="condition", type="string")
     */
    protected $condition;

    /**
     * @var string
     *
     * @ORM\Column(name="imageUrl", type="string")
     */
    protected $imageUrl;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

