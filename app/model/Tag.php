<?php


namespace App;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @property $name
 */
class Tag extends \Kdyby\Doctrine\Entities\BaseEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;


    /**
     * @ORM\ManyToMany(targetEntity="\App\Article", inversedBy="tags", cascade={"persist"})
     * @var \App\Article[]|\Doctrine\Common\Collections\ArrayCollection
     */
    protected $articles;


    function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function addArticle(Article $article)
    {
        $this->articles->add( $article );
    }
}