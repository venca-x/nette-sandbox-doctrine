<?php

namespace App;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @property $name
 */
class Author extends \Kdyby\Doctrine\Entities\BaseEntity
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
     * @ORM\OneToMany(targetEntity="\App\Article", mappedBy="author", cascade={"persist"})
     * @var Article[]|\Doctrine\Common\Collections\ArrayCollection
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