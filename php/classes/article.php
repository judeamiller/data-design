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