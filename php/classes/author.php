<?php
/**
 * Author class for ArsTechnica
 *
 * This Article Class is an example of data collected and stored about an author for a web publication.
 *
 * @author  Jude Baca-Miller <jmiller156@cnm.edu>
 **/

class Author {
	/**
	 * id for this author: this is the primary key
	 * @var int $authorId
	 **/
	private $authorId;
	/**
	 * author's email address
	 * @var string $authorEmail
	 **/
	private $authorEmail;
	/**
	 * hashed password for this author
	 * @var string $authorHash
	 **/
	private $authorHash;
	/**
	 * author's first and last name
	 * @var string $authorName
	 **/
	private $authorName;
	/**
	 * author profile, a short bio on the author
	 * @var string $authorProfile
	 **/
	private $authorProfile;
	/**
	 * link to author profile picture
	 * @var string $authorProfilePicture
	 **/
	private $authorProfilePicture;
	/**
	 * author's position title at ArsTechnica
	 * @var string $authorTitle
	 **/
	private $authorTitle;
	/**
	* link to author's twitter page
	* @var string $authorTwitterLink
	 */
	private $authorTwitterLink;

	/**
	 * accessor method for author id
	 *
	 * @return int value of author id
	 **/
	public function getAuthorId() : Uuid {
		return($this->authorId);
	}

	/**
	 * mutator method for author id
	 *
	 * @param Uuud| sting $newAuthorId value of new author id
	 * @throws \rangeException if $newAuthorId  is not positive
	 * @throws \TypeError if author id is not
	 **/
	public function  setAuthorId($newAuthorId) : void {
		try {
			$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the profile id
		$this->authorId = $uuid;
	}

	/**
	* accessor method for author email
 	* @return string value of author email
 	**/
	public function getAuthorEmail() :string {
		return $this->authorEmail;
	}

	/**
	 * mutator method for author email
	 *
	 * @param string $newAuthorEmail new value of author email
	 * @throws \InvalidArgumentException if $newAuthorEmail  is not a valid email or insecure
	 * @throws  \RangeException if  $newAuthorEmail  is  > 128 characters
	 * @throws \TypeError if $newAuthorEmail is not a string
	 **/
	public function setAuthorEmail(string $newAuthorEmail) : void {
		//verify author email is secure
		$newAuthorEmail = trim($newAuthorEmail);
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL);
		if($newAuthorEmail === true) {
			throw(new \InvalidArgumentException("author email is empty or insecure"));
		}

		//verify that the email will fit in database
		if(strlen($newAuthorEmail) > 128) {
			throw(new \RangeException("profile email is greater than 128 characters"));
		}

		//convert and store the author email
		$this->authorEmail = $newAuthorEmail;
	}

	/**
	* accessor method for author Hash
	* @return string value of hash
	*/
	public function getAuthorHash() :string {
		return $this->authorHash;
	}

	/**
	* mutator method for profile hash password
	*
	* @param string $newAuthorHash
	* @throws \InvalidArgumentExceptionif the hash is not secure
	* @throws \RangeException if the hash is not 128 characters* @throws \TypeError if profilehash is not a string
	**/

	public function setAuthorHash(string $newAuthorHash): void {
		//enforce hash is properly formatted
		$newAuthorHash = trim($newAuthorHash);
		if(empty($newAuthorHash) === true) {
			throw(new \InvalidArgumentException("profile password hash is empty or insecure"));
		}
		//enforce the hash is exactly 97 characters
		if(strlen($newAuthorHash) !== 97) {
			throw(new \RangeException("profile hash must be 97 characters"));
		}
		//store the hash
		$this->authorHash = $newAuthorHash;
	}
	/**
	 * accessor method for authorName
	 * @return string value of author name
	 **/
	public function getAuthorName(): string {
		return $this->authorName;
	}
	/**
	 * mutator method for author name
	 *
	 * @param string $newAuthorName new value of tweet content
	 * @throws \InvalidArgumentException if $newAuthor is not a string or insecure
	 * @throws \RangeException if $newAuthorName is > 32 characters
	 * @throws \TypeError if $newAuthorName is not a string
	 **/
	public function setAuthorName(string $newAuthorName) : void {
		// verify the author name is secure
		$newAuthorName = trim($newAuthorName);
		$newAuthorName = filter_var($newAuthorName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorName) === true) {
			throw(new \InvalidArgumentException("author name is empty or insecure"));
		}

		// verify the author name content will fit in the database
		if(strlen($newAuthorName) > 32) {
			throw(new \RangeException("author name is too long"));
		}

		// store the tweet content
		$this->authorName = $newAuthorName;
	}



}



?>