<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Images 
{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
		
	/**
	 * @Assert\NotBlank(message="Please upload a png or jpg.")
	 * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
	 * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName", size="imageSize")
	 */
	private $imageFile;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $imageName;

	/**
	 * @ORM\Column(type="integer", nullable = true)
	 */
	private $postId;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $updatedAt;
	
	/**
	 * @return Images
	 */
	public function setImageFile(File $image = null) 
	{
		$this->imageFile = $image;
		
		if ($image) 
		{
			$this->updatedAt = new \DateTimeImmutable ();
		}
		
		return $this;
	}
	
	/**
	 * @return File|null
	 */
	public function getImageFile() 
	{
		return $this->imageFile;
	}
	
	/**
	 * @return Images
	 */
	public function setImageName($imageName) 
	{
		$this->imageName = $imageName;
		
		return $this;
	}
	
	/**
	 * @return string|null
	 */
	public function getImageName() 
	{
		return $this->imageName;
	}
	
	/**
	 * @return int
	 */
	public function getPostId()
	{
		return $this->postId;
	}

	/**
	 * @return int|null
	 */
	public function setPostId($postId)
	{
		$this->postId = $postId;
	}

}
