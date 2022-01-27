<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting for mysql server
    $mysqli = mysqli_connect('localhost', 'root', '1234', 'dbUtenti');

    $table = "userdata";

    if ($result = $mysqli->query("SHOW TABLES LIKE '".$table."'")) {
        if($result->num_rows == 0) {
            $mysqli->query("CREATE TABLE userdata (
                            id int(11) AUTO_INCREMENT,
                            firstname varchar(255) NOT NULL,
                            lastname varchar(255) NOT NULL,
                            email varchar(255) NOT NULL,
                            passwordd varchar(255) NOT NULL,
                            bio varchar(150) not NULL,
                            img varchar(255) not NULL,
                            newsletter boolean not NULL,
                            PRIMARY KEY (ID) 
                            )");
        }
    }

    $cyphpasswd = password_hash($_POST['pass'], PASSWORD_DEFAULT);		


    $result = $mysqli->prepare("SELECT * FROM userdata WHERE email LIKE ?");
    $result->bind_param('s', $_POST['email']);
    $result->execute();
    $result->store_result();

    if ($result->num_rows > 0) {
        echo "user already exist";
        $mysqli->close();
        $result->close();
        header("Location: registration.php");
    } else {
        $init_img = "https://e7.pngegg.com/pngimages/355/848/png-clipart-computer-icons-user-profile-google-account-s-icon-account-miscellaneous-sphere-thumbnail.png";
        $init_bio = "nessuna bio inserita";
        $init_newsletter = true;
        $result = $mysqli->prepare("INSERT INTO userdata (firstname, lastname, email, passwordd, bio, img, newsletter) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $result->bind_param('ssssssi', $_POST['firstname'], $_POST['lastname'], $_POST['email'], $cyphpasswd, $init_bio, $init_img, $init_newsletter);
        $result->execute();
        $mysqli->close();
        $result->close();
        header("Location: homepage.php");
    }

?>