<?php
/**
 * Article class for ArsTechnica
 *
 * This Article Class is an example of data collected and stored about an article written by and author for a web publication.
 *
 * @author  Jude Baca-Miller <jmiller156@cnm.edu>
 **/

class article {
	/**
	 * id for this article: this is the primary key
	 * @var int $articleId
	 **/
	private $articleId;
	/**
	 * authorId for this article: this is the Foreign key
	 * @var int $articleAuthorId
	 **/
	private $articleAuthorId;
	/**
	 * description of the type of article
	 * @var string $articleCategory
	 **/
	private $articleCategory;
	/**
	 * date this article was published
	 * @var \DateTime $articleDate
	**/
	private $articleDate;
	/**
	 * the title of this article
	 * @var string $articleTitle
	 **/
	private $articleTitle;
	/**
	 * the text content of the article.
	 * @var string $articleContent
	 */
	private $aticleContent;

	/**
	 * accessor method for article id
	 *
	 * @return int value of article id
	 **/
	public function getAuthorId() : Uuid {
		return($this->articleId);
	}

	/**
	 * mutator method for article id
	 *
	 * @param Uuud| sting $newAuthorId value of new article id
	 * @throws \rangeException if $newAuthorId  is not positive
	 * @throws \TypeError if article id is not
	 **/
	public function  setAuthorId($newAuthorId) : void {
		try {
			$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the profile id
		$this->articleId = $uuid;
	}
