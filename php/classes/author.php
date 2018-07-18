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
	 **/
	private $authorId;
	/**
	 * author's email address
	 **/
	private $authorEmail;
	/**
	 * hashed password for this author
	 **/
	private $authorHash;
	/**
	 * author's first and last name
	 **/
	private $authorName;
	/**
	 * author profile, a short bio on the author
	 **/
	private $authorProfile;
	/**
	 * link to author profile picture
	 **/
	private $authorProfilePicture;
	/**
	 * author's position title at ArsTechnica
	 **/
	private $authorTitle;
	/**
	 * link to author's twitter page
	 **/
	private $authorTwitterLink;

	/**
	 * accessor method for author id
	 *
	 * @return int value of author id
	 **/
	public function getAuthorId() {
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
			throw(new UnexpectedValueException("profile ide is not a valid integer"));
		}

		// convert and store the author id
		$this->authorId = intval($newAuthorId);

	}


}



?>