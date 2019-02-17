<?php ?>

<html>
<head>
    <title>Show All Topics</title>
</head>
<body>
<?php foreach ($topics as $topic){ ?>
    <?php echo $topic['name']; ?><br>
<?php } ?>
</body>
</html>
