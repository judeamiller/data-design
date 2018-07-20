
INSERT INTO author
(authorId, authorEmail, authorHash, authorName, authorProfile, authorProfilePicture, authorTitle, authorTwitterLink)
VALUES
	(UNHEX(REPLACE("8b38082e-2a87-4e93-b00f-bb0a7434ff2d","-", "")), "timlee@arstechnica.com", "f1a7ed9c76ee59d16a69c377e1018058262c6c3eaf363ddc1ad16129d19256d345dc29d8d48b3161ad60acdbcd93c5f59", "Tim Lee", "Tim is a writer for Ars. Tim only eats circuit boards for lunch.", "http://timothyblee.com/wp-content/uploads/2010/07/timothy_b_lee_portrait.jpg", "Policy Reporter", "twitter.com/binarybits" );

UPDATE author SET authorTitle = "CEO" WHERE authorEmail="timlee@arstechnica.com";

DELETE FROM author WHERE authorEmail = "timlee@arstechnica.com";

SELECT authorTwitterLink, authorHash, authorName FROM author WHERE authorEmail="timlee@arstechnica.com";

INSERT INTO author
(authorId, authorEmail, authorHash, authorName, authorProfile, authorProfilePicture, authorTitle, authorTwitterLink)
VALUES
	(UNHEX(REPLACE("76ca33ee-c0b6-49d2-b551-ebae33071257","-", "")), "valentina_p@arstechnica.com", "afada45beafffd45c04d61e89066c279a69a9fd92815ad709017a27616985dd5d2838d60a36adcd21c0300b3444ef868f", "Valentina Palladino", "Valentina is associate reviewer for Ars. Valentina only eats apple products for lunch.", "http://arstechnica.com/writerphotos/vpalladino.jpg", "Associate Reviewer", "twitter.com/valentinalucia" );


DELETE FROM author WHERE authorId = UNHEX(REPLACE("76ca33ee-c0b6-49d2-b551-ebae33071257","-", ""));


INSERT INTO article (articleId, articleAuthorId, articleCategory, articleContent, articleDate, articleTitle)
	VALUES (UNHEX(REPLACE("ce89910d-c13e-4f05-8ced-56b7c4ff5d12","-", "")), UNHEX(REPLACE("8b38082e-2a87-4e93-b00f-bb0a7434ff2d","-", "")),"Tech Policy", "null", "2018-07-18 12:15:03", "Someone Stole Ajit Pai's Stupid Novelty Coffe Mug");

DELETE FROM article WHERE articleId = UNHEX(REPLACE("ce89910d-c13e-4f05-8ced-56b7c4ff5d12","-", ""));