<?php
/**
<html>
<head>
    <title>Show All Topics</title>
</head>
<body>
<h2><?php echo $_SESSION['user']; ?></h2>
<?php foreach ($topics as $topic){ ?><br>
    <a  href="../../Controllers/topic/topicRead.php?topicId=<?php echo $topic['topic_id'] ?>"><?php echo $topic['name']; ?></a>
<?php } ?>
</body>
</html>
*/
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>White Edition</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
</head>
<body>
<header>
    <nav class="main-nav">
        <ul>
            <li>
                <ul>
                    <li><a href="index.html" class="active">about</a></li>
                    <li><a href="projets.html">works</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<section id="video" class="home">
    <h1>Enjoy our forum</h1>
</section>
<section id="main-content">
    <div class="text-intro">
        <h2>All Topics</h2>
    </div>
    <?php foreach ($topics as $value){ ?>
    <div class="columns features">
        <?php foreach($value as $topic){ ?>
            <div class="one-third">
                <h3><?php echo $topic['name']; ?></h3>
                <p><?php echo substr($topic['body'], 0, 200); ?></p>
                <p><a  href="../../Controllers/topic/topicRead.php?topicId=<?php echo $topic['topic_id'] ?>" class="more">Watch all topic</a></p>
            </div>
        <?php } ?>
    </div>
    <?php } ?>
    <footer>
<div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>
