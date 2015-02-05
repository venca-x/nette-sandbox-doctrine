<?php

namespace App\Presenters;

use App\Author;
use App\Tag;
use Nette,
	App\Model;
use App\Article;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

	/**
	 * @inject
	 * @var \Kdyby\Doctrine\EntityManager
	 */
	public $EntityManager;

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
		$dao = $this->EntityManager->getRepository(Article::getClassName());
		$this->template->articles = $dao->findAll();

	}

	public function actionAdd()
	{

		$daoArticle = $this->EntityManager->getRepository(Article::getClassName());
		$daoAuthor = $this->EntityManager->getRepository(Author::getClassName());

		$author = new Author();
		$author->name = "Božena Němcová";

		//$author = $daoAuthor->findOneBy( array("name" => "Božena Němcová"));

		$article = new Article();
		$article->title = "Nette with Doctrine is cool";
		$article->text = "Nette is cool php framework. Doctrine is object relational mapper (ORM) for PHP";
		$article->author = $author;
		$author->addArticle($article);

		$tag = new Tag();
		$tag->name = "nette";

		$article->addTag($tag);

		$tag = new Tag();
		$tag->name = "doctrine";

		$article->addTag($tag);

		$daoArticle->save($article);

		exit();
	}

}
