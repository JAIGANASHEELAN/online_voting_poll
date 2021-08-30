<?php
    session_start();
    if(!isset($_SESSION['userdata']))
    {
        header("location: indexpage.html");
    }


    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0)
    {
        $status = '<b style="color: red">Not Voted </b>';
    }
    else{
        $status = '<b style="color: green">Voted </b>'; 
    }

?>

<html>
    <head>
        <title>voting pole!</title>
        <link rel="stylesheet" href="CSS\votingStyle.css">
    </head>
    <body>
        <style>
            #but{
                padding: 5px;
                margin: 3px;
                
            }
            button a{
                text-decoration: none;
                color: white;
            }
            .back{
                margin: 5px;
                float: left;
               
            }
            .logout{
                margin: 5px;
                float: right;
                text-decoration: none;
                color: white;
            }
            #Profile{
                float: left;
                background-color: white;
                padding: 30px 20px;
                margin: 5px 20px;
                width: 30%;
                border-radius: 5px;
            }
            input[name="votebtn"]{
                margin: 5px;
                float: left;

            }
            #Group{
                
                height: 330px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;

                float: right;
                background-color: white;
                padding: 30px 20px;
                margin: 5px 20px;
                width: 52%;
                border-radius: 5px;
            }
            .divv{
                float: left;
                padding: 10px;
                
            }
            #notvoted{
                background-color: rgb(157, 157, 206);
                color: white;
            }
            #voted{
                background-color: green;
            }
        </style>
        <div id="mainSec">
            <div id= "but">
                <button class="back"> <a href="indexpage.html"> Back</a></button>
                <button class= "logout"> <a href="logout.php">Logout</a> </button>
            </div>
            <div class="headerSec">
                <h1>Online Voting Pole!</h1>
                <hr>
            </div>
        
        
        <div id="Profile" >
            <center><img src="uploads/<?php echo $userdata['photo'] ?>" height="100" width="100" alt=""></center><br><br>
            <div class="divv">
                <b>Name : </b> <?php echo $userdata['Fname'] ?>&nbsp<?php echo $userdata['Lname'] ?> <br><br>
                <b>Mobile : </b><?php echo $userdata['mobile'] ?> <br><br>
                <b>Address : </b><?php echo $userdata['address'] ?> <br><br>
                <b>Status : </b><?php echo $status ?> <br><br>
            </div>
        </div>
        <div id="Group" >
            <?php
                if($_SESSION['groupsdata'])
                {
                    for($i=0;$i<count($groupsdata);$i++)
                    {
                        ?>
                        <div>
                            <img style= "float: right" src="uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100" alt="">
                            <b>Group Name :</b><?php echo $groupsdata[$i]['Fname'] ?>&nbsp<?php echo $groupsdata[$i]['Lname'] ?><br><br>
                            <b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                            <form action="vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo$groupsdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                <?php 
                                    if($_SESSION['userdata']['status']==0)
                                    {
                                        ?>
                                        <input type="submit" name="votebtn" value="vote" id="notvoted" >
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <button disabled name = "votebtn" id="voted">voted</button>
                                        <?php
                                    }
                                    ?>
                                
                            </form><br><br><hr>
                            
                        </div>
                        

                        <?php
                    }
                }
                else
                {

                }
            
            
            ?>


        </div>
    </div>

    </body>

</html>