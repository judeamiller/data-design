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
	 * @param int $newAuthorId new value of author id
	 * @throws UnexpectedValueException if $newAuthorId is not an integer
	 **/
	public function  setAuthorId($newAuthorId) {
		// verify the author id is valid
		$newAuthorId = filter_var($newAuthorId, FILTER_VALIDATE_INT);
		if($newAuthorId === false) {
			throw(new UnexpectedValueException("profile id is not a valid integer"));
		}

		// convert and store the author id
		$this->authorId = intval($newAuthorId);
	}

	/**
	 * accessor method for author emial
 	*
 	* @return string value of author email
 	**/
	public function getAuthorEmail() {
		return $this->authorEmail;
	}

	/**
	 * mutator method for author email
	 *
	 * @param string new value of author email
	 * @throws UnexpectedValueException if @newAuthorEmail is not a string
	 */
	public function setAuthorEmail(string $newAuthorEmail) : void {
		//verify author email is valid
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
		if($newAuthorEmail === false) {
			throw(new UnexpectedValueException("author email is not valid"));
		}

		//convert and store the author email
		$this->authorEmail = $newAuthorEmail;
	}

/**
 * accessor method for author Hash
 */

}



?>