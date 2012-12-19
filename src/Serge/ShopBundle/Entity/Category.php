<?php

namespace Serge\ShopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Serge\ShopBundle\Entity\Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Serge\ShopBundle\Entity\CategoryRepository")
 */
class Category
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private  $name;

    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="category")
     * @ORM\JoinTable(name="category_products")
     */
    private $products;

    /**
     * @var
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    private $parent;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    private $children;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->children = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param  $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param  $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param  $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
