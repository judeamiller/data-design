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
				<li>authorProfile</li>
				<li>authorName</li>
				<li>authorEmail</li>
				<li>authorTitle</li>
				<li>authorTweetId</li>
				<li>authorProfilePicture</li>
			</ul>
		<h2>Article</h2>
			<ul>
				<li>articleId (primary Key)</li>
				<li>articleDate</li>
				<li>articleTitle</li>
			</ul>
		<h2>Relationship</h2>
			<ul>
				<li>One Author can write many articles (1 to n)</li>
				<li>One article can be written by one author (1 to 1)</li>
			</ul>


		<hr/>
		<h2>Navigation</h2>
		<ul>
			<li><a href="./index.php">Return to Home</a></li>
			<li><a  href="./timothylee.php">Persona</a></li>
			<li><a href="./use-case.php">Use Case</a></li>
		</ul>
	</body>

</html>