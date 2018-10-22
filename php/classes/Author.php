<?php
/**
 * Author class for ArsTechnica
 *
 * This Author Class is an example of data collected and stored about an author for a web publication.
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
	 * author constructor.
	 * @param uuid $newAuthorId
	 * @param string $newAuthorEmail
	 * @param string $newAuthorHash
	 * @param string $newAuthorName
	 * @param string $newAuthorProfile
	 * @param string $newAuthorProfilePicture
	 * @param string $newAuthorTitle
	 * @param string $newAuthorTwitterLink
	 **/
	public function __construct(Uuid $newAuthorId, string $newAuthorEmail, string $newAuthorHash, string $newAuthorName, string $newAuthorProfile, string $newAuthorProfilePicture, string $newAuthorTitle, string $newAuthorTwitterLink) {
		try{
			$this->setAuthorId($newAuthorId);
			$this->setAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorName($newAuthorName);
			$this->authorProfile($newAuthorProfile);
			$this->authorProfilePicture($newAuthorProfilePicture);
			$this->authorTitle($newAuthorTitle);
			$this->authorTwitterLink($newAuthorTwitterLink);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for author id
	 *
	 * @return uuid value of author id
	 **/
	public function getAuthorId() : Uuid {
		return($this->authorId);
	}

	/**
	 * mutator method for author id
	 *
	 * @param Uuud| string $newAuthorId value of new author id
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
	**/
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
	 * @param string $newAuthorName new value of author name
	 * @throws \InvalidArgumentException if $newAuthorName is not a string or insecure
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

		// store the author name
		$this->authorName = $newAuthorName;
	}
	/**
	 * accessor method for authorProfile
	 * @return string value of author profile
	 **/
	public function getAuthorProfile(): string {
		return $this->authorProfile;
	}
	/**
	 * mutator method for author profile
	 *
	 * @param string $newAuthorProfile new value of author profile
	 * @throws \InvalidArgumentException if $newAuthorProfile is not a string or insecure
	 * @throws \RangeException if $newAuthorProfile is > 220 characters
	 * @throws \TypeError if $newAuthorProfile is not a string
	 **/
	public function setAuthorProfile(string $newAuthorProfile) : void {
		// verify the author profile is secure
		$newAuthorProfile = trim($newAuthorProfile);
		$newAuthorProfile = filter_var($newAuthorProfile, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorProfile) === true) {
			throw(new \InvalidArgumentException("author profile is empty or insecure"));
		}

		// verify the author profile content will fit in the database
		if(strlen($newAuthorProfile) > 220) {
			throw(new \RangeException("author profile is too long. limit 220 characters"));
		}

		// store the author profile
		$this->authorProfile = $newAuthorProfile;
	}
	/**
	 * accessor method for authorProfilePicture
	 * @return string value of author profile picture link
	 **/
	public function getAuthorProfilePicture(): string {
		return $this->authorProfilePicture;
	}
	/**
	 * mutator method for author profile
	 *
	 * @param string $newAuthorProfilePicture new value of author profile picture
	 * @throws \InvalidArgumentException if $newAuthorProfilePicture is not a string or insecure
	 * @throws \RangeException if $newAuthorProfile is > 256 characters
	 * @throws \TypeError if $newAuthorProfilePicture is not a string
	 **/
	public function setAuthorProfilePicture(string $newAuthorProfilePicture) : void {
		// verify the author profile picture link is secure
		$newAuthorProfilePicture = trim($newAuthorProfilePicture);
		$newAuthorProfilePicture = filter_var($newAuthorProfilePicture, FILTER_SANITIZE_URL);
		if(empty($newAuthorProfilePicture) === true) {
			throw(new \InvalidArgumentException("author profile picture link is empty or insecure"));
		}

		// verify the author profile content will fit in the database
		if(strlen($newAuthorProfilePicture) > 256) {
			throw(new \RangeException("author profile picture link is too long. limit 256 characters"));
		}

		// store the author profile picture link
		$this->authorProfilePicture = $newAuthorProfilePicture;
	}
	/**
	 * accessor method for authorTitle
	 * @return string value of author title
	 **/
	public function getAuthorTitle(): string {
		return $this->authorTitle;
	}
	/**
	 * mutator method for author title
	 *
	 * @param string $newAuthorTitle new value of author title
	 * @throws \InvalidArgumentException if $newAuthorTitle is not a string or insecure
	 * @throws \RangeException if $newAuthorTitle is > 20 characters
	 * @throws \TypeError if $newAuthorTitle is not a string
	 **/
	public function setAuthorTitle(string $newAuthorTitle) : void {
		// verify the author title string is secure
		$newAuthorTitle = trim($newAuthorTitle);
		$newAuthorTitle = filter_var($newAuthorTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorTitle) === true) {
			throw(new \InvalidArgumentException("author title is empty or insecure"));
		}

		// verify the author title content will fit in the database
		if(strlen($newAuthorTitle) > 20) {
			throw(new \RangeException("author title is too long"));
		}

		// store the author name
		$this->authorTitle = $newAuthorTitle;
	}
	/**
	 * accessor method for authorTwitterLink
	 * @return string value of author twitter link
	 **/
	public function getAuthorTwitterLink(): string {
		return $this->authorTwitterLink;
	}
	/**
	 * mutator method for author profile
	 *
	 * @param string $newAuthorTwitterLink new value of author twitter link
	 * @throws \InvalidArgumentException if $newAuthorTwitterLink is not a string or insecure
	 * @throws \RangeException if $newAuthorTwitterLink is > 32 characters
	 * @throws \TypeError if $newAuthorTwitterLink is not a string
	 **/
	public function setAuthorTwitterLink(string $newAuthorTwitterLink) : void {
		// verify the author twitter link is secure
		$newAuthorTwitterLink = trim($newAuthorTwitterLink);
		$newAuthorTwitterLink = filter_var($newAuthorTwitterLink, FILTER_SANITIZE_URL);
		if(empty($newAuthorTwitterLink) === true) {
			throw(new \InvalidArgumentException("author twitter link is empty or insecure"));
		}

		// verify the author profile content will fit in the database
		if(strlen($newAuthorTwitterLink) > 32) {
			throw(new \RangeException("author twitter link is too long. limit 32 characters"));
		}

		// store the author profile picture link
		$this->authorTwitterLink = $newAuthorTwitterLink;
	}
}

?>