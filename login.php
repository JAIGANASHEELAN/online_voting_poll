<?php 
    include("connect.php");
    session_start();

    $mobile=$_POST["mobile"];
    $password=$_POST["password"];
    $role=$_POST["role"];

    $check = mysqli_query($connect, "SELECT * FROM user WHERE mobile='$mobile' AND password = '$password' AND role='$role' " );

    // echo 
    // '<script>
    //     alert(`${check}`);
    // </script>';

    // checking how many reocrds match this querry
    if(mysqli_num_rows($check)>0)
    {
        $userdata = mysqli_fetch_array($check);
        $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
        $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
        // $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupsdata'] = $groupsdata;

        echo '
            <script>
                window.location = "votingpolespage.php";
            </script>
        ';
    }
    else{
        echo
            '<script >
                alert("user not found: ");
                window.location = "indexpage.html";
            </script>'
        ;
    }

?>