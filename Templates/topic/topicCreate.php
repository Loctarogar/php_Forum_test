<?php ?>

<html>
<head>
    <title>Create Topic</title>
</head>
<body>
<h2>Create new topic</h2>
<form method="post" action="../../Controllers/topic/topicCreate.php">
    Enter topic's name: <br>
    <input type="text" name="name"><br>
    Enter topic's body: <br>
    <input type="text" name="body"><br>
    <input type="submit">
</form>
</body>
</html>
