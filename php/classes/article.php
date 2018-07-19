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
	 * the text content of the article.
	 * @var string $articleContent
	 */
	private $articleContent;
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
	 * accessor method for article id
	 *
	 * @return int value of article id
	 **/
	public function getArticleId() : Uuid {
		return($this->articleId);
	}

	/**
	 * mutator method for article id
	 *
	 * @param Uuud| sting $newArticleId value of new article id
	 * @throws \rangeException if $newAuthorId  is not positive
	 * @throws \TypeError if article id is not
	 **/
	public function  setArticleId($newArticleId) : void {
		try {
			$uuid = self::validateUuid($newArticleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the profile id
		$this->articleId = $uuid;
		}
	/**
	 * accessor method for article author id
	 *
	 * @return int value of article author id
	 **/
	public function getArticleAuthorId() : Uuid {
		return($this->articleAuthorId);
	}

	/**
	 * mutator method for article article author id
	 *
	 * @param Uuud| sting $newArticleAuthorId value of new article id
	 * @throws \rangeException if $newArticleAuthorId  is not positive
	 * @throws \TypeError if article id is not
	 **/
	public function  setArticleAuthorId($newArticleAuthorId) : void {
		try {
			$uuid = self::validateUuid($newArticleAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the profile id
		$this->articleAuthorId = $uuid;
	}
	/**
	 * accessor method for articleCategory
	 * @return string value of author title
	 **/
	public function getArticleCategory(): string {
		return $this->articleCategory;
	}

	/**
	 * mutator method for article category
	 *
	 * @param string $newArticleCategory new value of author title
	 * @throws \InvalidArgumentException if $newArticleCategory is not a string or insecure
	 * @throws \RangeException if $newArticleCategory is > 32 characters
	 * @throws \TypeError if $newArticleCategory is not a string
	 **/
	public function setArticleCategory(string $newArticleCategory) : void {
			// verify the article category string is secure
			$newArticleCategory = trim($newArticleCategory);
			$newArticleCategory = filter_var($newArticleCategory, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
			if(empty($newArticleCategory) === true) {
				throw(new \InvalidArgumentException("article category is empty or insecure"));
			}

			// verify the article category content will fit in the database
			if(strlen($newArticleCategory) > 32) {
				throw(new \RangeException("article category is too long"));
			}

			// store the author name
			$this->articleCategory = $newArticleCategory;
		}

	/**
	 * accessor method for article content
	 * @return string value of article content
	 **/
	public function getArticleContent(): string {
		return $this->articleContent ;
	}
	/**
	 * mutator method for article content
	 *
	 * @param string $newArticleContent new value of article content
	 * @throws \InvalidArgumentException if $newArticleContent is not a string or insecure
	 * @throws \RangeException if $newArticleContent is > 8192 characters
	 * @throws \TypeError if $newArticleContent is not a string
	 **/
	public function setArticleContent(string $newArticleContent) : void {
		// verify the article content is secure
		$newArticleContent = trim($newArticleContent);
		$newArticleContent = filter_var($newArticleContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleContent) === true) {
			throw(new \InvalidArgumentException("article content is empty or insecure"));
		}

		// verify the article content content will fit in the database
		if(strlen($newArticleContent) > 8192) {
			throw(new \RangeException("Article content is too long. Limit 8192 characters"));
		}

		// store the article content
		$this->articleContent = $newArticleContent;
	}

	/**
	 * accessor method for article date
	 *
	 * @return \DateTime value of article date
	 **/
	public function getArticleDate() : \DateTime {
		return($this->articleDate);
	}

	/**
	 * mutator method for article date
	 *
	 * @param \DateTime|string|null $newArticleDate tweet date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newArticleDate is not a valid object or string
	 * @throws \RangeException if $newArticleDate is a date that does not exist
	 **/
	public function setArticleDate($newArticleDate = null) : void {
		// base case: if the date is null, use the current date and time
		if($newArticleDate === null) {
			$this->articleDate = new \DateTime();
			return;
		}

		// store the like date using the ValidateDate trait
		try {
			$newArticleDate = self::validateDateTime($newArticleDate);
		} catch(\InvalidArgumentException | \RangeException $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->articleDate = $newArticleDate;
	}

	/**
	 * accessor method for articleTitle
	 * @return string value of article title
	 **/
	public function getArticleTitle(): string {
		return $this->articleTitle;
	}
	/**
	 * mutator method for article title
	 *
	 * @param string $newArticleTitle new value of article title
	 * @throws \InvalidArgumentException if $newArticleTitle is not a string or insecure
	 * @throws \RangeException if $newArticleTitle is > 100 characters
	 * @throws \TypeError if $newArticleTitle is not a string
	 **/
	public function setArticleTitle(string $newArticleTitle) : void {
		// verify the article title string is secure
		$newArticleTitle = trim($newArticleTitle);
		$newArticleTitle = filter_var($newArticleTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleTitle) === true) {
			throw(new \InvalidArgumentException("article title is empty or insecure"));
		}

		// verify the article title content will fit in the database
		if(strlen($newArticleTitle) > 100) {
			throw(new \RangeException("article title is more than 100 characters"));
		}

		// store the article name
		$this->articleTitle = $newArticleTitle;
	}

}
