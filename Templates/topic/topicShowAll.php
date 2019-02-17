<?php ?>

<html>
<head>
    <title>Show All Topics</title>
</head>
<body>
<?php foreach ($topics as $topic){ ?><br>
    <a  href="../../Controllers/topic/topicRead.php?topicId=<?php echo $topic['topic_id'] ?>"><?php echo $topic['name']; ?></a>
<?php } ?>
</body>
</html>
