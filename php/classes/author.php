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
	 */
	private $authorTitle;
	/**
	 * link to author's twitter page
	 */
	private $authorTwitterLink;
}



?>