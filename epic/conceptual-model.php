<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title> Conceptual Model</title>
	</head>
	<body>
		<h1>Conceptual Model</h1>
		<h2>Author</h2>
			<ul>
				<li>authorId (primary key)</li>
				<li>authorEmail</li>
				<li>authorHash (password)</li>
				<li>authorName</li>
				<li>authorProfile</li>
				<li>authorProfilePicture</li>
				<li>authorTitle</li>
				<li>authorTwitterLink</li>
			</ul>
		<h2>Article</h2>
			<ul>
				<li>articleId (primary key)</li>
				<li>articleAuthorId (foreign key)</li>
				<li>articleCategory</li>
				<li>articleContent</li>
				<li>articleDate</li>
				<li>articleTitle</li>
			</ul>
		<h2>Relationship</h2>
			<ul>
				<li>One Author can write many articles (1 to n)</li>
			</ul>
		<hr/>
		<h2>Entity Relationship Diagram</h2>
		<img src="./entityrelationshipdiagram.svg" alt="entity relationship diagram">
		<hr/>
		<h2>Navigation</h2>
		<ul>
			<li><a href="./index.php">Return to Home</a></li>
			<li><a  href="./timothylee.php">Persona</a></li>
			<li><a href="./use-case.php">Use Case</a></li>
		</ul>
	</body>
</html>