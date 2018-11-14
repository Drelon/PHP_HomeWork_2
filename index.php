<html>
    <style>
        header {
    background-color: #666;
    padding: 30px;
    text-align: center;
    font-size: 35px;
    color: white;
    }
    /* Style the footer */
    footer {
    background-color: #777;
    padding: 10px;
    text-align: center;
    color: white;
    }


    </style>
    <head>
            <title>My friend book</title>
            <meta charset="utf-8">
    </head>     
    <body>
        <?php 
        include('header.html');
        ?>


        <form action="index.php" method="post">
        Name: <input type="text" name="name">
        <input type="submit" name="Entree" value ="Upload">
        <input type="text" name="nameFilter" value="<?php if(empty($_POST['nameFilter'])) $nameFilter = NULL;?>">
        <input type="submit" name="Filter" value = "Filtre">
        </form>
        
    <?php 
        $filename = 'friends.txt';
        
        $NewName = $_POST['name'];
        $file = fopen( $filename, "a" );
        if("$NewName" != NULL){
            fwrite( $file, "$NewName\n" );
        }
        
        $file = fopen( $filename, "r" );
        $nameFilter = $_POST["nameFilter"];
        $file2 = fopen( $filename, "r" );
        while (!feof($file)) {
        if($nameFilter != NULL){
            if (strstr(fgets($file), "$nameFilter", false) != NULL){
                $ligne = fgets($file2)."<br/>";
                echo $ligne;
            }
            else{
                fgets($file2);
            }
        }
        else {
            echo fgets($file)."<br/>";
            }
        }
        ?>
    <?php
        include('footer.html');
    ?>
    </body>
</html>