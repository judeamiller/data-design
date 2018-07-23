<?php

namespace Judeamiller\DataDesign;


require_once("autoload.php");
require_once(dirname(__DIR__,2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * Article class for ArsTechnica
 *
 * This Article Class is an example of data collected and stored about an article written by and author for a web publication.
 *
 * @author  Jude Baca-Miller <jmiller156@cnm.edu>
 **/

class Article {
	use ValidateUuid;
	use ValidateDate;
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
	 * article constructor.
	 * @param uuid $newArticleId
	 * @param uuid $newArticleAuthorId
	 * @param string $newArticleCategory
	 * @param string $newArticleContent
	 * @param DateTime $newArticleDate
	 * @param string $newArticleTitle
	 **/
	public function __construct(uuid $newArticleId, uuid $newArticleAuthorId, string $newArticleCategory, string $newArticleContent, DateTime $newArticleDate, string $newArticleTitle) {
		try {
			$this->setArticleId($newArticleId);
			$this->setArticleAuthorId($newArticleAuthorId);
			$this->getArticleCategory($newArticleCategory);
			$this->getArticleContent($newArticleContent);
			$this->getArticleDate($newArticleDate);
			$this->getArticleTitle($newArticleTitle);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}


	/**
	 * accessor method for article id
	 *
	 * @return int value of article id
	 **/
	public function getArticleId(): Uuid {
		return ($this->articleId);
	}

	/**
	 * mutator method for article id
	 *
	 * @param Uuid| string $newArticleId value of new article id
	 * @throws \rangeException if $newArticleId  is not positive
	 * @throws \TypeError if article id is not
	 **/
	public function setArticleId($newArticleId): void {
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
	public function getArticleAuthorId(): Uuid {
		return ($this->articleAuthorId);
	}

	/**
	 * mutator method for article article author id
	 *
	 * @param Uuid| string $newArticleAuthorId value of new article id
	 * @throws \rangeException if $newArticleAuthorId  is not positive
	 * @throws \TypeError if article id is not
	 **/
	public function setArticleAuthorId($newArticleAuthorId): void {
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
	public function setArticleCategory(string $newArticleCategory): void {
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
		return $this->articleContent;
	}

	/**
	 * mutator method for article content
	 *
	 * @param string $newArticleContent new value of article content
	 * @throws \InvalidArgumentException if $newArticleContent is not a string or insecure
	 * @throws \RangeException if $newArticleContent is > 8192 characters
	 * @throws \TypeError if $newArticleContent is not a string
	 **/
	public function setArticleContent(string $newArticleContent): void {
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
	public function getArticleDate(): \DateTime {
		return ($this->articleDate);
	}

	/**
	 * mutator method for article date
	 *
	 * @param \DateTime|string|null $newArticleDate date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newArticleDate is not a valid object or string
	 * @throws \RangeException if $newArticleDate is a date that does not exist
	 **/
	public function setArticleDate($newArticleDate = null): void {
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
	public function setArticleTitle(string $newArticleTitle): void {
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

	/**
	 * inserts article into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws\PDOException when mySQL related errors occur
	 * @throws\TypeError if $pdo is not a PDO connection object.
	 **/
	public function insert(\PDO $pdo): void {
		//create query template
		$query = "INSERT INTO article(articleId, articleAuthorId, articleCategory, articleContent, articleDate, articleTitle) VALUES(:articleId, :articleAuthorId, :articleCategory, :articleContent, :articleDate, :articleTitle)";
		$statement = $pdo->prepare($query);

		//bind the member variables to the placeholders in template
		$formattedDate = $this->articleDate->format("Y-m-d H:i:s.u");
		$parameters = ["articleId" => $this->articleId->getBytes(), "articleAuthorId" => $this->articleAuthorId->getBytes(), "articleCategory" => $this->articleCategory, "articleContent" => $this->articleContent, "articleDate" => $formattedDate, "articleTitle" => $this->articleTitle];
		$statement->execute($parameters);
	}


	/**
	 *updates an article from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws|PDOException when mySQL related errors occur
	 * @throw \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo): void {
		//create query template
		$query = "UPDATE article SET articleAuthorId  = :articleAuthorId, articleContent = :articleContent, articleDate = :articleDate, articleTitle = :articleTitle WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the placeholders in template
		$formattedDate = $this->articleDate->format("Y-m-d H:i:s.u");
		$parameters = ["articleId" => $this->articleId->getBytes(), "articleAuthorId" => $this->articleAuthorId->getBytes(), "articleCategory" => $this->articleCategory, "articleContent" => $this->articleContent, "articleDate" => $formattedDate, "articleTitle" => $this->articleTitle];
		$statement->execute($parameters);
	}

	/**
	 *deletes an article from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws|PDOException when mySQL related errors occur
	 * @throw \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo): void {
		//create query template
		$query = "DELETE FROM article WHERE articleId =  :articleId";
		$statement = $pdo->prepare($query);

		//bind member variables into the placeholders in the template
		$parameters = ["articleId" => $this->articleId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * gets Article by articleId (the primary key)
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid\string $articleId is article id
	 * @retun Article|null Article found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 **/
	public static function getArticleByArticleId(\PDO $pdo, $articleId): ?Article {
		//sanitize articleID before searching
		try {
			$articleId = self::validateUuid($articleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT articleId, articleAuthorId, articleCategory, articleContent, articleDate, articleTitle FROM article WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);

		//bind the article id to the placeholder in the template.
		$parameters = ["articleId" => $articleId->getBytes()];
		$statement->execute($parameters);

		//grab the article from mySQL.
		try {
			$article = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$article = new Article($row["articleId"], $row["articleAuthorId"], $row["articleCategory"], $row["articleContent"], $row["articleDate"], $row["articleTitle"]);
			}
		} catch(\Exception $exception) {
			// if the row could not be converted, rethrow it.
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($article);
	}

	/**
	 * gets Articles by articleAuthorId (the foreign key)
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid\string $articleAuthorId is author id to search by
	 * @return \SplFixedArray of articles found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 **/
	public static function getArticleByArticleAuthorID(\PDO $pdo, $articleAuthorId): \SplFixedArray {
		//sanitize articleAuthorID before searching
		try {
			$articleAuthorId = self::validateUuid($articleAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}

		//create query template
		$query = "SELECT articleId, articleAuthorId, articleCategory, articleContent, articleDate, articleTitle FROM article WHERE articleAuthorId = :articleAuthorId";
		$statement = $pdo->prepare($query);

		//bind the article author id  to the placeholder in template
		$parameters = ["articleAuthorId" => $articleAuthorId->getBytes()];
		$statement->execute($parameters);

		// build an array of articles by author
		$articles = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$article = new Article ($row["articleId"], $row["articleAuthorId"], $row["articleCategory"], $row["articleContent"], $row["articleDate"], $row["articleTitle"]);
				$articles[$articles->key()] = $article;
				$articles->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}

		return ($articles);
	}

	/**
	 * gets Articles by articleCategory
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $articleCategory to search for
	 * @return \SplFixedArray of articles found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable is not the correct data type
	 **/
	public static function getArticleByArticleCategory(\PDO $pdo, string $articleCategory) : \SplFixedArray {
		//Sanitize the article content description before searching
		$articleCategory = trim($articleCategory);
		$articleCategory = filter_var($articleCategory, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($articleCategory) === true) {
			throw(new \PDOException("article content is invalid."));
		}

		//escape any mySQL wildcards
		$articleCategory = str_replace("_", "\\_", str_replace("%", "\\%", $articleCategory));

		//create query template
		$query = "SELECT articleId, articleAuthorId, articleCategory, articleContent, articleDate, articleTitle FROM article WHERE articleCategory LIKE :articleCategory";
		$statement = $pdo->prepare($query);

		//bind the article category  to the placeholder in template
		$articleCategory = "%articleCategory%";
		$parameters = ["articleCategory" => $articleCategory];
		$statement->execute($parameters);

		// build an array of articles by author
		$articles = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$article = new Article ($row["articleId"], $row["articleAuthorId"], $row["articleCategory"], $row["articleContent"], $row["articleDate"], $row["articleTitle"]);
			$articles[$articles->key()] = $article;
				$articles->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($articles);
		}
	}



