<html>
    <head>
        <style>
            .error{color:#ffoooo;}
        </style>
    </head>
    <body>
    <?php
        $namearr=$emailarr=$genderarr=$websitearr="";
        $name=$email=$gender=$comment=$website;
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(empty($_POST["name"]))
            {
                $namearr = "Name is required";
            }
            else
            {
                $name=test_input($_POST["name"]);
                if(!preg_match("/^[a-zA-z-']*$/",$name))
                {
                    $namearr="Only letters and white space allowed";
                }
            }
        }
        if(empty($_POST["email"]))
        {
            $emailrr = "Email is required";
        }
        else
        {
            $email=test_input($_POST["email"]);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $emailrr="Invalid email format";
            }
        }
        if(empty($_POST["website"]))
        {
            $website="";
        }
        else
        {
            $website=test_input($_POST["website"]);
            $website="";
        }
        if(empty($_POST["comment"]))
        {
            $comment="";
        }
        else
        {
            $comment=test_input($_POST["comment"]);
        }
        if(empty($_POST["gender"]))
        {
            $genderarr="Gender is required";
        }
        else
        {
            $gender=test_input($_POST["gender"]);
        }
        function test_input ($data)
        {
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
    ?>
    <h2>PHP FROM VALIDATION EXAMPLE</h2>
    <p><span class="error">* required field </span></p>
    <form method="POST" action="<?php echo HTML_SPECIALCHARS($_SERVER["PHP_SELF"]);?>">
    name:<input type="text" name="name">
    <span class="error">* <?php echo $namearr ?></span><br><br>
    website:<input type="text" name="website">
    <span class="error"><?php echo $websitearr ?></span><br><br>
    comment:<textarea name="comment" rows="5" cols="40"></textarea><br><br>
    gender:<input type="radio" name="gender" value="male">
    <input type="radio" name="gender" value="female">
    <input type="radio" name="gender" value="other">
    <span class="error">* <?php echo $genderarr ?></span><br><br>
    <input type="submit" name="submit" value="submit"></form>
    <?php
    echo "<h2>Your Input :<h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    ?>
    </body>
</html>
