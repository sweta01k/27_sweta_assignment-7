<?php
if (isset($_FILES['image'])) {
    $error = array();
}
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$tmp = explode('.', $file_name);
$file_ext = end($tmp);
$extensions = array("jepg", "jpg", "png");
if (in_array($file_ext, $extensions) === false) {
    $error[] = "extensions not allowed,please choose a jpeg or png file";
}
if ($file_size > 2097152) {
    $error[] = "file size must be excately";
}
if (empty($error) == true) {
    move_uploaded_file($file_tmp, "images/" . $file_name);
    echo "success";
} else {
    print_r($error);
}
?>
<html>

<body>
    <form action="method post" enctype="multipart/form-data">
        <input type="file" name="image" />
        <input type="submit" />
        <ul>
            <li>sent file:
                <?php echo $_FILES['image']['name'] ?>
            </li>
            <li>file size:
                <?php echo $_FILES['image']['size'] ?>
            </li>
            <li>file type:
                <?php echo $_FILES['image']['type'] ?>
            </li>
        </ul>
    </form>
</body>

</html>