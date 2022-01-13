<html>

<body>
    <form action="test.php" method="get">
        <button type="submit" name="on" value="on">On</button>
        <button type="submit" name="off" value="off">OFF</button>
    </form>
</body>

</html>
<?php
if (isset($_GET['on'])) {
    onFunc();
}
if (isset($_GET['off'])) {
    offFunc();
}

function onFunc()
{
}
function offFunc()
{
    echo "Button off clicked";
}
?>