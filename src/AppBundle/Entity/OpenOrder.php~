<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpenOrder
 *
 * @ORM\Table(name="open_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OpenOrderRepository")
 */
class OpenOrder
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
     * @var int
     *
     * @ORM\Column(name="listingId", type="integer")
     */
    private $listingId;


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
     * Set listingId
     *
     * @param integer $listingId
     *
     * @return OpenOrder
     */
    public function setListingId($listingId)
    {
        $this->listingId = $listingId;

        return $this;
    }

    /**
     * Get listingId
     *
     * @return int
     */
    public function getListingId()
    {
        return $this->listingId;
    }
}
