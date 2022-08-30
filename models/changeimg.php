<?php

session_start();
if (isset($_REQUEST['btnChange'])) {


    include "../config/connection.php";
    include "functions.php";

    $user = $_SESSION['user'];
    $file = $_FILES['formFile'];
    $fileName = $file['name'];
    $tmpFile = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $erroeFile = $file['error'];


    if ($file["full_path"] != "") {
        $tfile = substr($fileType, 6);
        if ($erroeFile == 0) {
            $errors  = 0;


            $aprovedTypes = ["image/jpg", "image/jpeg", "image/png"];

            if (!in_array($fileType, $aprovedTypes)) {
                $errors++;
                $_SESSION['error-type'] = "Illegal file type.";
            }

            if ($fileSize > 200000) {
                $errors++;
                $_SESSION['error-size'] = "File too large.";
            }

            if ($errors != 0) {
                header("Location: ../profile.php");
            } else {
                $newName = time() . "_" . $user->User_ID;
                $path = "../images/userimage/" . $newName . "." . $tfile;



                if (move_uploaded_file($tmpFile, $path)) {




                    $changeImg = changeImg(substr($path, 3), $user->User_ID);

                    if ($changeImg) {
                        $user = returnUser($user->User_Username);
                        $_SESSION['user'] = $user;
                        header("Location: ../profile.php");
                    }
                }
            }
        }
    } else {

        $_SESSION['error-file'] = "Enter file.";
        header("Location: ../profile.php");
    }
} else {
    header("Location: ../404.php");
}
