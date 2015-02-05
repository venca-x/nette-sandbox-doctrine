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

		//$author = new Author();
		//$author->name = "Pokusne jmeno";

		$author = $daoAuthor->findOneBy( array("name" => "Pokusne jmeno"));

		$article = new Article();
		$article->title = "titulke sntagem";
		$article->text = "text novinky s tagem";
		$article->author = $author;
		$author->addArticle($article);

		$tag = new Tag();
		$tag->name = "kniha";

		$article->addTag($tag);

		$tag = new Tag();
		$tag->name = "kniha dvojita";

		$article->addTag($tag);

		$daoArticle->save($article);

		exit();
	}

}
