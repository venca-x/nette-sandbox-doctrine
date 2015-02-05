<?php

namespace App;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Article extends \Kdyby\Doctrine\Entities\BaseEntity
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
    protected $title;

    /**
     * @ORM\Column(type="string", nullable=TRUE)
     * @var string
     */
    protected $text;

    /**
     * @ORM\ManyToOne(targetEntity="\App\Author", inversedBy="articles", cascade={"persist"})
     * @var Author
     */
    protected $author;

    /**
     * @ORM\ManyToMany(targetEntity="\App\Tag", mappedBy="articles", cascade={"persist"}, orphanRemoval=true)
     * @var \App\Tag[]|\Doctrine\Common\Collections\ArrayCollection
     */
    protected $tags;


    function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function addTag(Tag $tag)
    {
        $tag->addArticle($this);
        $this->tags->add( $tag );
    }

}