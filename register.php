<?php
    include("connect.php");

    // for collecting
    $Fname=$_POST["Fname"];
    $Lname=$_POST["Lname"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $address=$_POST["address"];
    $image=$_FILES["img"]["name"];
    $temp_name=$_FILES["img"]["tmp_name"];
    $role=$_POST["role"];


    //checking password and confirm password are same 
    if($password==$cpassword)
    {
        move_uploaded_file($temp_name,"uploads/$image");
        $insert = mysqli_query($connect, "INSERT INTO user(Fname, Lname, email, mobile, password,address,photo,role,status,votes) VALUES ('$Fname','$Lname','$email','$mobile','$password','$address','$image','$role',0,0) ");

        //check
        if($insert)
        {
            echo '
                <script>
                    alert("insert sucuss");
                    window.location = "indexpage.html";
                </script>
            ';
        }
        else
        {
            echo '
                <script>
                    alert("not inserted");
                    window.location = "newUserRegister.html";
                </script>
            ';
        }
    }
    else
    {
        echo '
            <script>
                alert("password is not as confirm password");
                window.location = "newUserRegister.html";
            </script>
        ';
    }

?>