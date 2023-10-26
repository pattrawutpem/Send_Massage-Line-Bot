<!DOCTYPE html>
<html>
<head>
    <title>Line-Bot</title>
</head>
<body>
    <h1>Message</h1>
    <form action="api-line-bot.php" method="post">
        <label for="message">Message:</label>
        <input type="text" name="message" id="message" required>
        <br><br>
        <input type="submit" value="Send Push Message">
    </form>
</body>
</html>