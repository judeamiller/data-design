
ALTER DATABASE datadesign CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS article;
DROP TABLE IF EXISTS  author;

CREATE TABLE author(
	authorId BINARY(16) NOT NULL,
	authorEmail VARCHAR(128) NOT NULL,
	authorHash CHAR(97) NOT NULL,
	authorName VARCHAR(32) NOT NULL,
	authorProfile VARCHAR(220) NOT NULL,
	authorProfilePicture VARCHAR(2083),
	authorTitle VARCHAR(20),
	authorTwitterLink VARCHAR(32),
	UNIQUE(authorEmail),
	UNIQUE(authorName),
	UNIQUE(authorTwitterLink),
	PRIMARY KEY(authorId)
);

CREATE TABLE article(
	articleId BINARY(16) NOT NULL,
	articleAuthorId BINARY(16) NOT NULL,
	articleCategory VARCHAR(32) NOT NULL,
	articleDate DATETIME(6) NOT NULL,
	articleTitle VARCHAR(100)NOT NULL,
	INDEX(articleAuthorId),
	FOREIGN KEY(articleAuthorId) REFERENCES author(authorId),
	PRIMARY KEY(articleId)
);