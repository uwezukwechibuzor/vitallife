<?php
      
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

//connecting to the database
    require_once 'dbconnection.php';



//Create Admin Users by the Super Admin
function CreateAdmin($request)
{
    global $db, $email_error, $email, $password, $password_err, $confirmpassword_err, $fullname, $fullname_err, $success, $role, $role_err;

             
    if (empty(trim($request['email']))) {
        $email_error= "the email field is required";
    } elseif (filter_var($request['email'], FILTER_VALIDATE_EMAIL) ===false) {
        $email_error= "please enter a valid email address";
    } else {
        $email= $request['email'];
    }


    if (empty(trim($request['password']))) {
        $password_err = "The password field is required";
    } elseif (strlen($request['password']) < 15 || !preg_match("@[A-Z]@", $request['password']) || !preg_match("@[a-z]@", $request['password']) || !preg_match("@[0-9]@", $request['password']) || !preg_match("@[^\w]@", $request['password'])) {
        $password_err = "Password must be at least 15 characters long and must have uppercase, lowercase, number or special characters";
    } 


    if(!empty($request['confirm_password']) && $request['confirm_password'] !== $request['password']){
        $confirmpassword_err = "Password does not match";
      }

    if (empty(trim($request['fullname']))) {
        $fullname_err = "the full name field is required";
    } else {
        $fullname = $request['fullname'];
    }
    if (empty(trim($request['role']))) {
        $role_err = "the role field is required";
    } else {
        $role = $request['role'];
    }

   //hashing of password and using salt 
    $options = [
        'cost' => 12,
    ];
    $password_hashed = password_hash($request['password'], PASSWORD_BCRYPT, $options);
    

    //if no error is found
    if (empty($email_error) && empty($password_err)  && empty($confirmpassword_err) && empty($fullname_err) && empty($role_err)) {
        //check if email exist already
        $sql = "SELECT email FROM admin_users WHERE email =?";
     
        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $email);
            // Attempt to execute the prepared statement
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if ($resultcheck > 0) {
                $email_error = "Email in use Already";
            } else {
                
                //insert details into the detabase
                $sql = "INSERT INTO admin_users (full_name, email, password, role) VALUES (?,?,?,?)";
                
                if($stmt = mysqli_prepare($db, $sql)){
                    
                //bind param
             mysqli_stmt_bind_param($stmt, "ssss", $fullname, $email,  $password_hashed, $role);
               
                //execute
               if(mysqli_stmt_execute($stmt)){
                $success = "Admin Created Successfully";
                 if($success === true){
                    //header("location: index.php", true, 301);
                    header( "Refresh:1; url=index.php", true, 303);
                exit();
                 }
                
               }

            }
        }
    }
}

}

//Login system for all Admin
//Admin Login
function admin_Login($request)
{
    global $db, $email, $email_error, $password_hashed, $password, $password_err, $success, $pass, $result, $row, $id;

    if (empty(trim($request['email']))) {
        $email_error= "the email field is required";
    } elseif (filter_var($request['email'], FILTER_VALIDATE_EMAIL) ===false) {
        $email_error= "please enter a valid email address";
    } else {
        $email= $request['email'];
    }


    if (empty(trim($request['password']))) {
        $password_err = "The password field is required";
    } elseif (strlen($request['password']) < 15 || !preg_match("@[A-Z]@", $request['password']) || !preg_match("@[a-z]@", $request['password']) || !preg_match("@[0-9]@", $request['password']) || !preg_match("@[^\w]@", $request['password'])) {
        $password_err = "Password must be at least 15 characters long and must have uppercase, lowercase, number or special characters";
    } else {
        $password = $request['password'];
    }
               
    if (empty($email_error) && empty($password_err)) {
        $sql = "SELECT * FROM admin_users WHERE email=?";
        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $email);
             
            // Set parameters
 
             
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
               $result =  mysqli_stmt_get_result($stmt);
                 
                // Check if username exists, if yes then verify password
                if (mysqli_num_rows($result)) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $pass = $row['password'];
                    $id = $row['id'];
                    $fullname = $row['full_name'];
                    $email = $row['email'];
                    $role = $row['role'];
                    if(password_verify($password, $pass)){
                        header("location:index.php?id=$id");
                        ini_set('session.cookie_httponly', 1);
                        ini_set('session.use_only_cookies', 1);
                    ini_set('session.cookie_secure', 1);
                    define('COOKIE_HTTPONLY', TRUE);
                    define('COOKIE_SSL', TRUE);
                          session_start();
                          $_SESSION['loggedInAdmin'] = true;
                          $_SESSION['fullname'] = $fullname;
                          $_SESSION['email'] = $email;
                          $_SESSION['role'] = $role;
                          $_SESSION['password'] = $password;
                          $_SESSION['id'] = $id;
                          $_SESSION['time'] = date('l jS \of F Y h:i:s A');
                            $_SESSION['key'] = bin2hex(random_bytes(10));
                           
                    }
                    }
                }
            }
        }
    }


    function logOut($request){
    global $db;
        session_start();
        // Unset all of the session variables
        $_SESSION = array();
         unset( $_SESSION['loggedInAdmin']);
         unset( $_SESSION['fullname']);
         unset( $_SESSION['email']);
         unset( $_SESSION['role']);
         unset( $_SESSION['time']);
         unset( $_SESSION['key']);
              
        // Destroy the session.
        session_destroy();
     
        // Redirect to login page
        header("location:login.php");
        exit;    
}




//displaying all registered Admin
function displayAdmin(){
    
    global $db,  $rows, $role_;
      $role__ = 'admin';
      $role_ = 'superadmin';
        $sql = "SELECT  * FROM admin_users WHERE role = ? || role = ? ORDER BY id ASC";
        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $role_, $role__);
  
            // Set parameters
              
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                $result =  mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result)) {
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                   
                }
            }
        }
    }




//delete registered admin users
function deleteAdmin($request){
    global $db, $id, $role;
     $role = 'admin';
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE  FROM admin_users WHERE id =? && role =?";
        if($stmt = mysqli_prepare($db, $sql)){
             mysqli_stmt_bind_param($stmt, "is", $id, $role);
             if(mysqli_stmt_execute($stmt)){
                 header("location:index.php");
             }
        }
    }
}


 
         //Reset Password
         function resetPassword($request)
         {
             global $db, $id, $emaill, $email_errr, $check, $code, $time, $mailsent;
            
             if (empty(trim($request['email']))) {
                 $email_errr= "the email field is required";
             } elseif (filter_var($request['email'], FILTER_VALIDATE_EMAIL) ===false) {
                 $email_errr= "Wrong Email";
             } else {
                 $emaill= $request['email'];
             }
            
;
             if (empty($email_errr)) {
                 $sql = "SELECT id, email  FROM admin_users WHERE email=?";
                 if ($stmt = mysqli_prepare($db, $sql)) {
                     // Bind variables to the prepared statement as parameters
                     mysqli_stmt_bind_param($stmt, "s", $emaill);
                 
                     // Set parameters
     
                 
                     // Attempt to execute the prepared statement
                     if (mysqli_stmt_execute($stmt)) {
                         // Store result
                         mysqli_stmt_store_result($stmt);
                     
                         // Check if username exists
                         if (mysqli_stmt_num_rows($stmt) == 1) {
                             // Bind result variables
                             mysqli_stmt_bind_result($stmt, $request['id'], $emaill);
                             if (mysqli_stmt_fetch($stmt)) {
                                 $id = $request['id'];
                                  $time = time() + ( 5 * 60);
                                 $code = bin2hex(random_bytes(10));
                              
               //insert details into the detabase
                $sql = "INSERT INTO forgotpassword (email, code, created_at) VALUES (?,?,?)";
                
                if ($stmt = mysqli_prepare($db, $sql)) {
                //bind param
                    mysqli_stmt_bind_param($stmt, "ssi", $emaill, $code, $time);
               
                    //execute
                    if (mysqli_stmt_execute($stmt)) {
                       // $code = "success";
                    }
                }                     

                      //sent the user an email
                                 require 'vendor/autoload.php';
                                 $mail = new PHPMailer(true);
                           
                                 try {
                                     $mail->SMTPDebug = 0;
                                     $mail->isSMTP();
                                     $mail->Host       = 'mail.vitalifefoundation.ng';
                                     $mail->SMTPAuth   = true;
                                     $mail->Username   = 'info@vitalifefoundation.ng';
                                     $mail->Password   = 'CHI389221261518chi//';
                                     $mail->SMTPSecure = 'tls';
                                     $mail->Port       = 587;
                                     $mail->setFrom('info@vitalifefoundation.ng');
                                     $mail->addAddress($emaill);
                                     $mail->addAddress($emaill);
                                
                                     $mail->isHTML(true);
                                     $mail->Subject = 'Reset Password';
                                     $mail->Body    = 'Use the Code to change Your Password'.' '.'<b>'.$code.'</b><br>'.'It Expires after 5minutes';
                                     $mail->AltBody = 'Body in plain text for non-HTML mail clients';
                                     $mail->send();
                                     $mailsent = "Mail has been sent successfully!";
                                 } catch (Exception $e) {
                                     $error1 =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                 }      
                         
                                 //use check to diplay the next form
                                 $check = true;
                                 $co= bin2hex(random_bytes(30));
                                 header("location: forgotpassword.php?check=$code&check=$co&mailsent=$mailsent");

                                                      
                             }
                         } else {
                             $email_errr = 'your email is not registered!';
                         }
                     }
                 }
             }
         }
                 

         


         function setPassword($request)
         {
             global $code_err, $db, $rows, $code, $row, $email, $code, $time, $created_at, $passcode;
             if (isset($_GET['check'])) {
                 $code = $_GET['check'];

                 if (empty($_POST['code'])) {
                     $code_err = "Cannot be empty";
                 } else {
                     $code = $request['code'];
                     $sql = "SELECT  email, code, created_at FROM forgotpassword WHERE code =?";
                     if ($stmt = mysqli_prepare($db, $sql)) {
                         // Bind variables to the prepared statement as parameters
                         mysqli_stmt_bind_param($stmt, "s", $code);
     
                         // Set parameters
                         mysqli_stmt_execute($stmt);
                         mysqli_stmt_store_result($stmt);
                         $resultcheck = mysqli_stmt_num_rows($stmt);
                         mysqli_stmt_bind_result($stmt, $request['email'], $code, $request['created_at']);
                         if (mysqli_stmt_fetch($stmt)) {
                             $email = $request['email'];
                             $created_at = $request['created_at'];
                             $code = $code;
                         }
                         if ($resultcheck > 0) {
                             $time = time();
                             if ($time <= $created_at) {
                                 $passcode = true;
                                 header("location: forgotpassword.php?passcode=$code&email=$email");
                                 $email = $request['email'];
                             } else {
                                 $code_err = "time has expired";
                             }
                         } else {
                             $code_err = "Wrong Pass code";
                         }
                     }
                 }
             }
         }
 
               //new password
             function newPassword($request)
             {
                 global $db, $failed, $email,  $update, $newPassword,  $newPassword_error, $updatefailed, $code, $coding, $emailing, $link;
               
                 if (isset($_GET['passcode'])  || isset($_GET['email'])) {
                     $code = $_GET['passcode'];
                     $email = $_GET['email'];
                 }
                
                 if (empty(trim($request['newpassword'])) || !isset($_GET['passcode']) ||  !isset($_GET['email'])) {
                     // header("location: forgotpassword.php?passcode=$code&email=$email");
                     $newPassword_error = "Password cannot be empty";
                 } elseif (strlen($request['newpassword']) < 8 || !preg_match("@[A-Z]@", $request['newpassword']) || !preg_match("@[a-z]@", $request['newpassword']) || !preg_match("@[0-9]@", $request['newpassword']) || !preg_match("@[^\w]@", $request['newpassword'])) {
                     $newPassword_error = "Password must be at least 8 characters long and must have uppercase, lowercase, number or special characters";
                 }
                 $options = [
                                'cost' => 12,
                            ];
                 $newPassword = password_hash($request["newpassword"], PASSWORD_BCRYPT, $options);
                     

                 if (empty($newPassword_error)) {
                     $sql = "SELECT email, code, created_at FROM forgotpassword WHERE email=? ORDER BY id DESC LIMIT 1";
                     if ($stmt = mysqli_prepare($db, $sql)) {
                         // Bind variables to the prepared statement as parameters
                         mysqli_stmt_bind_param($stmt, "s", $email);
                                
                         // Attempt to execute the prepared statement
                         if (mysqli_stmt_execute($stmt)) {
                             // Store result
                             $result =  mysqli_stmt_get_result($stmt);
                                 
                             // Check if username exists, if yes then verify password
                             if (mysqli_num_rows($result)) {
                                 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                 $emailing = $row['email'];
                                 $coding = $row['code'];
                             $created_at = $row['created_at'];


                                 if ($coding != $code || $emailing != $email) {
                                     $newPassword_error = "something went wrong";
                                 } else {
                                     $time = time();
                                     if ($time <= $created_at) {
                                         $sql ="UPDATE admin_users SET password = ? WHERE email =?";
                                         if ($stmt = mysqli_prepare($db, $sql)) {
                                             mysqli_stmt_bind_param($stmt, "ss", $newPassword, $email);
                                            
                                             if (mysqli_stmt_execute($stmt)) {
                                                 $update = "Password changed Successfully!";
                                                 header("location: login.php?resetpassword=$update");
                                             } else {
                                                 $updatefailed = "Failed";
                                             }
                                         }
                                     } else {
                                         $newPassword_error = "time has expired";
                                         $link = '<a href="forgotpassword.php">click here</a>';
                                     }
                                 }
                             }
                         }
                     }
                 }
             }


             //meet our team
             //twitter was replaced with department
             function meet_our_team($request)
             {
                 global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $fullname, $position, $success, $facebook, $twitter;
                              
                 if (empty($request['fullname']) || empty($request['position'])) {
                     $error = "Field cannot be empty";
                 } else {
                     $fullname = $request['fullname'];
                     $position = $request['position'];
                     $facebook = $request['facebook'];
                     $twitter = $request['twitter'];

                     //file upload file name
                     $file = $_FILES['file'];
                     $fileName = $_FILES['file']['name'];
                     $fileTmpName = $_FILES['file']['tmp_name'];
                     $fileSize = $_FILES['file']['size'];
                     $fileError = $_FILES['file']['error'];
                     $fileType = $_FILES['file']['type'];
             
                     $fileExt = explode('.', $fileName);
                     $fileActualExt = strtolower(end($fileExt));
             
                     $allowed = array('jpg', 'jpeg', 'png');
                 
                     if (in_array($fileActualExt, $allowed)) {
                         if ($fileError === 0) {
                             if ($fileSize < 10000000) {
                                 $fileNameNew = uniqid('', true).".".$fileActualExt;
                                 $fileDestination = 'admin/img/'.$fileNameNew;
                                 move_uploaded_file($fileTmpName, $fileNameNew);
                             
                                 if (empty($fileNameNew)) {
                                     $error = "No file Was choosen";
                                        } else {
                        
                                 //Insert to database
                             $sql = "INSERT INTO meet_our_team (full_name, position, pic, facebook, department) VALUES (?,?,?,?,?)";
                     
                             if ($stmt = mysqli_prepare($db, $sql)) {
                              
                                //bind values to the prepared statement
                                 mysqli_stmt_bind_param($stmt, "sssss", $fullname, $position, $fileNameNew, $facebook, $twitter);
                                 if (mysqli_stmt_execute($stmt)) {
                                      $success = " Team Added Successfully";            
                      
                                       }                      
                                     }
                                 }

                                }
                            }
                        }
                    }
                }
                   

//teams
function displayteams(){
    global $db, $row, $rows, $row, $status;
    $status = "true";
        $sql = "SELECT  * FROM meet_our_team  WHERE status =? ORDER BY id DESC";
        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $status);
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                $result =  mysqli_stmt_get_result($stmt);
                // Check if data exists, if yes display data
                if (mysqli_num_rows($result)) {
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
                }
            }
        }
    }


//delete team
function deleteTeam($request){
    global $db, $id;
   if(isset($_GET['id'])){
       $id = $_GET['id'];

       $sql = "DELETE  FROM meet_our_team WHERE id =?";
       if($stmt = mysqli_prepare($db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                header("location:teams.php");
            }
       }
   }

}



             //meet our team
             function bible_reading($request)
             {
                 global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error,  $fileNameNew, $fileDestination, $fullname, $position, $success;
              
                     //file upload file name
                     $file = $_FILES['file'];
                     $fileName = $_FILES['file']['name'];
                     $fileTmpName = $_FILES['file']['tmp_name'];
                     $fileSize = $_FILES['file']['size'];
                     $fileError = $_FILES['file']['error'];
                     $fileType = $_FILES['file']['type'];
             
                     $fileExt = explode('.', $fileName);
                     $fileActualExt = strtolower(end($fileExt));
             
                     $allowed = array('jpg', 'jpeg', 'png');
                 
                     if (in_array($fileActualExt, $allowed)) {
                         if ($fileError === 0) {
                             if ($fileSize < 10000000) {
                                 $fileNameNew = uniqid('', true).".".$fileActualExt;
                                 $fileDestination = 'admin/img/'.$fileNameNew;
                                 move_uploaded_file($fileTmpName, $fileNameNew);
                             
                                 if (empty($fileNameNew)) {
                                     $error = "No file Was choosen";
                                        } else {
                        
                                 //Insert to database
                             $sql = "INSERT INTO bible_verse (pic) VALUES (?)";
                     
                             if ($stmt = mysqli_prepare($db, $sql)) {
                              
                                //bind values to the prepared statement
                                 mysqli_stmt_bind_param($stmt, "s", $fileNameNew);
                                 if (mysqli_stmt_execute($stmt)) {
                                      $success = "Added Successfully";            
                      
                                       }                      
                                     }
                                 }

                                }
                            }
                        }
                    }
            
 //bible verse
function displayBible(){
    global $db, $row, $rows, $row, $status;
    $status = "true";
        $sql = "SELECT  * FROM bible_verse WHERE status =? ORDER BY id DESC LIMIT 3";
        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $status);
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                $result =  mysqli_stmt_get_result($stmt);
                // Check if data exists, if yes display data
                if (mysqli_num_rows($result)) {
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
                }
            }
        }
    }


   //delete verse
function delete_verse($request){
    global $db, $id;
   if(isset($_GET['id'])){
       $id = $_GET['id'];

       $sql = "DELETE  FROM bible_verse WHERE id =?";
       if($stmt = mysqli_prepare($db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                header("location:bible_verse.php");
            }
       }
   }

}


             //galleries
             function galleries($request)
             {
                 global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error,  $fileNameNew, $fileDestination, $success, $key, $image, $links;

                     $links = $request['links'];
                 //file upload file name
                 foreach ($_FILES['file']['tmp_name'] as $key => $image) {
                     $file = $_FILES['file'];
                     $fileName = $_FILES['file']['name'][$key];
                     $fileTmpName = $_FILES['file']['tmp_name'][$key];
                     $fileSize = $_FILES['file']['size'][$key];
                     $fileError = $_FILES['file']['error'][$key];
                     $fileType = $_FILES['file']['type'][$key];
                     
                     $fileExt = explode('.', $fileName);
                     $fileActualExt = strtolower(end($fileExt));
                     
                     $allowed = array('jpg', 'jpeg', 'png');
                 
                     if (in_array($fileActualExt, $allowed)) {
                         if ($fileError === 0) {
                             if ($fileSize < 10000000) {
                                 $fileDestination = 'admin/img/'.$fileName;
                                 move_uploaded_file($fileTmpName, $fileName);
                             
                                 if (empty($fileName)) {
                                     $error = "No file Was choosen";
                                 } else {
                        
                                 //Insert to database
                                     $sql = "INSERT INTO galleries (pic, links) VALUES (?,?)";
                     
                                     if ($stmt = mysqli_prepare($db, $sql)) {
                              
                                //bind values to the prepared statement
                                         mysqli_stmt_bind_param($stmt, "ss", $fileName, $links);
                                         if (mysqli_stmt_execute($stmt)) {
                                             $success = "Added Successfully";
                                         }
                                     }
                                 }
                             }
                         }
                     }
                 }
             }
          
                     //galleries
function display_galleries(){
    global $db, $row, $gallery_rows, $row, $status;
    $status = "true";
        $sql = "SELECT  * FROM galleries WHERE status =? ORDER BY id Desc LIMIT 20";
        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $status);
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                $result =  mysqli_stmt_get_result($stmt);
                // Check if data exists, if yes display data
                if (mysqli_num_rows($result)) {
                    $gallery_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
                }
            }
        }
    }
function display_galleries_index(){
    global $db, $row, $gallery_rows, $row, $status;
    $status = "true";
        $sql = "SELECT  * FROM galleries WHERE status =? ORDER BY id Desc LIMIT 10";
        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $status);
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                $result =  mysqli_stmt_get_result($stmt);
                // Check if data exists, if yes display data
                if (mysqli_num_rows($result)) {
                    $gallery_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
                }
            }
        }
    }


   //delete verse
function delete_gallery($request){
    global $db, $id;
   if(isset($_GET['id'])){
       $id = $_GET['id'];

       $sql = "DELETE  FROM galleries WHERE id =?";
       if($stmt = mysqli_prepare($db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                header("location:galleries.php");
            }
       }
   }

}




//Create Admin Users by the Super Admin
function member($request)
{
    global $db, $email_error, $email, $phone_err, $fullname, $fullname_err, $success,  $phone, $err, $state, $state_err, $country, $country_err, $city, $city_err, $talent;

             
    if (empty(trim($request['email']))) {
        $email_error= "the email field is required";
    } elseif (filter_var($request['email'], FILTER_VALIDATE_EMAIL) ===false) {
        $email_error= "please enter a valid email address";
    } else {
        $email= $request['email'];
    }

    if (empty(trim($request['full_name']))) {
        $fullname_err = "the full name field is required";
    } else {
        $fullname = $request['full_name'];
    }
    if (empty(trim($request['country']))) {
        $country_err = "the full name field is required";
    } else {
        $country = $request['country'];
    }
    if (empty(trim($request['state']))) {
        $state_err = "the full name field is required";
    } else {
        $state = $request['state'];
    }
    if (empty(trim($request['city']))) {
        $city_err = "the full name field is required";
    } else {
        $city = $request['city'];
    }

    $talent = $request['talents'];

    if (empty(trim($request['phone_no']))) {
        $phone_err = "the Phone Number field is required";
    } else {
        $phone= $request['phone_no'];
    }

    //if no error is found
    if (empty($email_error) && empty($fullname_err) && empty($phone_err) && empty($country_err) && empty($state_err) && empty($city_err)) {
        //check if email exist already
        $sql = "SELECT email, phone_no FROM member WHERE email =? || phone_no =?";
     
        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $email, $phone);
            // Attempt to execute the prepared statement
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if ($resultcheck > 0) {
                $err = "Email/Phone Number in use Already";
            } else {
                
                //insert details into the detabase
                $sql = "INSERT INTO member (full_name, email, phone_no, country, state, city, talents) VALUES (?,?,?,?,?,?,?)";
                
                if($stmt = mysqli_prepare($db, $sql)){
                    
                //bind param
             mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $email,  $phone, $country, $state, $city, $talent);
                //execute
               if(mysqli_stmt_execute($stmt)){
                $success = "Thank you $fullname for choosing to be a member";
                
                 }
                
               }

            }
        }
    }
}



                     //member
                     function display_member(){
                        global $db, $rows, $row, $status;
                        $status = "true";
                            $sql = "SELECT  * FROM member WHERE status =? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $status);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }


         //Contact us
                        function contact_us($request)
                        {
                            global $db, $id, $email, $check, $code, $mailsent, $subject, $message, $err, $fullname, $message_err, $subject_err, $email_err;
                           
                            if (empty(trim($request['email']))) {
                                $email_err= "the email field is required";
                            } elseif (filter_var($request['email'], FILTER_VALIDATE_EMAIL) ===false) {
                                $email_err = "Wrong Email";
                            } else {
                                $email= $request['email'];
                            }

                            if (empty(trim($request['full_name']))) {
                                $err = "the full name field is required";
                            } else {
                                $fullname = $request['full_name'];
                            }
                           
                            if (empty(trim($request['subject']))) {
                                $subject_err = "this field is required";
                            } else {
                                $subject = $request['subject'];
                            }
                           
                            if (empty(trim($request['message']))) {
                                $message_err = "the message field is required";
                            } else {
                                $message = $request['message'];
                            }
               
                            if (empty($err) && empty($email_err) && empty($subject_err) && empty($message_err)) {
                          
               
                                     //sent the user an email
                                require 'vendor/autoload.php';
                                $mail = new PHPMailer(true);
                                          
                                try {
                                    $mail->SMTPDebug = 0;
                                    $mail->isSMTP();
                                    $mail->Host       = 'mail.vitalifefoundation.ng';
                                    $mail->SMTPAuth   = true;
                                    $mail->Username   = 'info@vitalifefoundation.ng';
                                    $mail->Password   = 'CHI389221261518chi//';
                                    $mail->SMTPSecure = 'tls';
                                    $mail->Port       = 587;
                                    $mail->setFrom($email);
                                    $mail->addAddress('info@vitalifefoundation.ng');
                                    $mail->addAddress('info@vitalifefoundation.ng');
                                               
                                    $mail->isHTML(true);
                                    $mail->Subject = $subject;
                                    $mail->Body    = $message;
                                    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
                                    $mail->send();
                                    $mailsent = "Mail has been sent successfully!";
                                } catch (Exception $e) {
                                    $err =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                }
                        
                            }                
                                
                            }
                    
                                
               
                  //events
                  function events($request)
                  {
                      global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $position, $success, $topic, $time, $address, $details, $file_err, $topic_error,  $time_error, $address_error, $details_error, $date, $date_error, $links,$links_error;
                     
                      $topic = $request['topic'];
                      $time = $request['timing'];
                      $address = $request['address'];
                      $details = $request['details'];
                      $date = $request['date'];
                      $links = $request['links'];

                      if (empty($topic)) {
                          $topic_error = "This field is required";
                      }
                            
                      if (empty($time)) {
                          $time_error = "This field is required";
                      }
                            
                      if (empty($address)) {
                          $address_error = "This field is required";
                      }
                            
                      if (empty($date)) {
                          $date_error = "This field is required";
                      }
                            
                            
                      if (empty($links)) {
                          $links_error = "This field is required";
                      }
                            
                      if (empty($details)) {
                          $details_error = "This field is required";
                      } else {
                            
                          //file upload file name
                          $file = $_FILES['file'];
                          $fileName = $_FILES['file']['name'];
                          $fileTmpName = $_FILES['file']['tmp_name'];
                          $fileSize = $_FILES['file']['size'];
                          $fileError = $_FILES['file']['error'];
                          $fileType = $_FILES['file']['type'];
                  
                          $fileExt = explode('.', $fileName);
                          $fileActualExt = strtolower(end($fileExt));
                  
                          $allowed = array('jpg', 'jpeg', 'png');
                      
                          if (in_array($fileActualExt, $allowed)) {
                              if ($fileError === 0) {
                                  if ($fileSize < 10000000) {
                                      $fileNameNew = uniqid('', true).".".$fileActualExt;
                                      $fileDestination = 'admin/img/'.$fileNameNew;
                                      move_uploaded_file($fileTmpName, $fileNameNew);
                                  
                                      if (empty($fileNameNew)) {
                                          $file_err = "No file Was choosen";
                                      } else {
                             
                                      //Insert to database
                                          $sql = "INSERT INTO events (topic, timing, address, details, pic, date, links) VALUES (?,?,?,?,?,?,?)";
                          
                                          if ($stmt = mysqli_prepare($db, $sql)) {
                                   
                                     //bind values to the prepared statement
                                              mysqli_stmt_bind_param($stmt, "sssssss", $topic, $time, $address, $details, $fileNameNew, $date, $links);
                                              if (mysqli_stmt_execute($stmt)) {
                                                  $success = " Events Added Successfully";
                                              }
                                          }
                                      }
                                  }
                              }
                          }
                      }
                  }




                  //display events
                  function display_events(){
                    global $db, $events_rows,  $status;
                    $status = "true";
                        $sql = "SELECT  * FROM events WHERE status =? ORDER BY id DESC";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "s", $status);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $events_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }

                  function display_events_index(){
                    global $db, $events_rows,  $status;
                    $status = "true";
                        $sql = "SELECT  * FROM events WHERE status =? ORDER BY id DESC LIMIT 2";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "s", $status);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $events_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }


                //delete event
function delete_events($request){
    global $db, $id;
   if(isset($_GET['id'])){
       $id = $_GET['id'];

       $sql = "DELETE  FROM events WHERE id =?";
       if($stmt = mysqli_prepare($db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                header("location:events.php");
            }
       }
   }

}






  //downloads
  function downloads($request)
  {
      global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $position, $success, $topic, $time, $speaker, $category, $file_err, $topic_error,  $category_error, $speaker_error, $file1, $fileName1, $fileTmpName1, $fileSize1, $fileError1, $fileType1, $fileExt1, $fileActualExt1, $allowed1, $error1, $image1,  $fileNameNew1, $fileDestination1, $detail, $detail_error;
     
      $topic = $request['topic'];
      $speaker = $request['speaker'];
      $category = $request['category'];
     // $detail = $request['detail'];
    

      if (empty($topic)) {
          $topic_error = "This field is required";
      }
            
      if (empty($speaker)) {
          $speaker_error = "This field is required";
      }
            
      if (empty($category)) {
          $category_error = "This field is required";
      } else {
            
          //file upload file image
          $file = $_FILES['file'];
          $fileName = $_FILES['file']['name'];
          $fileTmpName = $_FILES['file']['tmp_name'];
          $fileSize = $_FILES['file']['size'];
          $fileError = $_FILES['file']['error'];
          $fileType = $_FILES['file']['type'];
  
          $fileExt = explode('.', $fileName);
          $fileActualExt = strtolower(end($fileExt));
  
          $allowed = array('jpg', 'jpeg', 'png');
      
         
                      //file upload file audio
                      $file1 = $_FILES['file1'];
                      $fileName1 = $_FILES['file1']['name'];
                      $fileTmpName1 = $_FILES['file1']['tmp_name'];
                      $fileSize1 = $_FILES['file1']['size'];
                      $fileError1 = $_FILES['file1']['error'];
                      $fileType1 = $_FILES['file1']['type'];
  
                      $fileExt1 = explode('.', $fileName1);
                      $fileActualExt1 = strtolower(end($fileExt1));
  
                      $allowed1 = array('MP3', 'WAV', 'WMA', 'AAC','M4A');


          if (in_array($fileActualExt, $allowed) || in_array($fileActualExt1, $allowed1)) {
              if ($fileError === 0 || $fileError1 === 0) {
                  if ($fileSize < 100000 || $fileSize1 < 1000000000000000000000000000000000 ) {
                      $fileNameNew = uniqid('', true).".".$fileActualExt;
                      $fileNameNew1 = uniqid('', true).".".$fileActualExt1;

                      $fileDestination = 'admin/img/'.$fileNameNew;
                      $fileDestination1 = 'admin/img/'.$fileName1;
                      
                      move_uploaded_file($fileTmpName, $fileNameNew);
                      move_uploaded_file($fileTmpName1, $fileName1);

                                  if (empty($fileNameNew) || empty($fileName1)) {
                                      $file_err = "No file Was choosen";
                                  } else {
             
                      //Insert to database
                                      $sql = "INSERT INTO downloads (topic, speaker, category,pic, audio) VALUES (?,?,?,?,?)";
          
                                      if ($stmt = mysqli_prepare($db, $sql)) {
                   
                     //bind values to the prepared statement
                                          mysqli_stmt_bind_param($stmt, "sssss", $topic, $speaker, $category, $fileNameNew, $fileName1);
                                          if (mysqli_stmt_execute($stmt)) {
                                              $success = " Audio Added Successfully";
                                          }
                                      }
                                  }
                              }
                          }
                      }
                  }
              }

  //Youtube livestreaming
  function liveStreaming($request)
  {
      global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $position, $success, $topic, $time, $speaker, $category, $file_err, $topic_error,  $category_error, $speaker_error, $file1, $fileName1, $fileTmpName1, $fileSize1, $fileError1, $fileType1, $fileExt1, $fileActualExt1, $allowed1, $error1, $image1,  $fileNameNew1, $fileDestination1, $url, $url_error;
     
      $topic = $request['topic'];
      $speaker = $request['speaker'];
      $url = $request['url'];
    

      if (empty($topic)) {
          $topic_error = "This field is required";
      }
            
      if (empty($speaker)) {
          $speaker_error = "This field is required";
      }
            
      if (empty($url)) {
          $url_error = "This field is required";
      } else {

                      //Insert to database
                                      $sql = "INSERT INTO livestreaming (topic, speaker, url) VALUES (?,?,?)";
          
                                      if ($stmt = mysqli_prepare($db, $sql)) {
                   
                     //bind values to the prepared statement
                                          mysqli_stmt_bind_param($stmt, "sss", $topic, $speaker, $url);
                                          if (mysqli_stmt_execute($stmt)) {
                                              $success = " URL Added Successfully";
                                          }
                                      }
                                  }
                              }
                   


         
  function downloads_video($request)
  {
      global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $position, $success, $topic, $time, $speaker, $category, $file_err, $topic_error,  $category_error, $speaker_error, $file2, $fileName2, $fileTmpName2, $fileSize2, $fileError2, $fileType2, $fileExt2, $fileActualExt2, $allowed2, $error2, $image2,  $fileNameNew2, $fileDestination2, $detail, $detail_error;
     
      $topic = $request['topic'];
      $speaker = $request['speaker'];
      $category = $request['category'];
  

      if (empty($topic)) {
          $topic_error = "This field is required";
      }
          
      if (empty($speaker)) {
          $speaker_error = "This field is required";
      }
      
          
      if (empty($category)) {
          $category_error = "This field is required";
      } 
      
                   //file upload file audio
                   $file = $_FILES['file1'];
                   $file1 = $_FILES['file'];
                   $fileName = $_FILES['file1']['name'];
                   $fileName1 = $_FILES['file']['name'];
                   $fileTmpName = $_FILES['file1']['tmp_name'];
                   $fileTmpName1 = $_FILES['file']['tmp_name'];
                   $fileSize= $_FILES['file1']['size'];
                   $fileSize1= $_FILES['file']['size'];
                   $fileError = $_FILES['file1']['error'];
                   $fileError1 = $_FILES['file']['error'];
                   $fileType = $_FILES['file1']['type'];
                   $fileType1 = $_FILES['file']['type'];

                   $fileExt = explode('.', $fileName);
                   $fileExt1 = explode('.', $fileName1);
                   $fileActualExt = strtolower(end($fileExt));
                   $fileActualExt1 = strtolower(end($fileExt1));

                   $allowed = array('MP4','MOV', 'AVI', 'webm');
                   $allowed1 = array('png','jpg', 'jpeg');


                  if($fileName){
                        if ($fileError === 0) {
                            if ($fileSize < 100000000000000000) {
                                move_uploaded_file($fileTmpName, $fileName);
                                move_uploaded_file($fileTmpName1, $fileName1);

                                if (empty($fileName)) {
                                    $file_err = "No file Was choosen";
                                } else {
          
       
           
                    //Insert to database
                                    $sql = "INSERT INTO videos (topic, speaker, category, video, pic) VALUES (?,?,?,?,?)";
        
                                    if ($stmt = mysqli_prepare($db, $sql)) {
                 
                   //bind values to the prepared statement
                                        mysqli_stmt_bind_param($stmt, "sssss", $topic, $speaker, $category, $fileName, $fileName1);
                                        if (mysqli_stmt_execute($stmt)) {
                                            $success = " Video Added Successfully";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
        

         
              //display downloads
                function display_downloads(){
                    global $db, $downloads_rows,  $status, $category;
                    $status = "true";
                    $category = 'music audios';
                        $sql = "SELECT  * FROM downloads WHERE status =? AND category =? ORDER BY id DESC";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "ss", $status, $category);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $downloads_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }
              
                function display_general_audios(){
                    global $db, $general_rows,  $status, $category;
                    $status = "true";
                    $category = 'general message audios';
                        $sql = "SELECT  * FROM downloads WHERE status =? AND category =? ORDER BY id DESC";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "ss", $status, $category);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $general_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }
                function display_vlf_audios(){
                    global $db, $vlf_rows,  $status, $category;
                    $status = "true";
                    $category = 'vlf message audios';
                        $sql = "SELECT  * FROM downloads WHERE status =? AND category =? ORDER BY id DESC";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "ss", $status, $category);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $vlf_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }
              
              //display downloads
                function display_downloads_index(){
                    global $db, $downloads_rows,  $status;
                    $status = "true";
                        $sql = "SELECT  * FROM downloads WHERE status =? ORDER BY id DESC LIMIT 3";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "s", $status);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $downloads_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }
              
                       //for music videos
                function display_downloads_videos(){
                    global $db, $videos_rows,  $status;
                    $status = "true";
                    $category="music videos";
                        $sql = "SELECT  * FROM videos WHERE status =? AND category =? ORDER BY id DESC";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "ss", $status, $category);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $videos_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }
                function display_general_videos(){
                    global $db, $general_videos_rows,  $status;
                    $status = "true";
                    $category = "general message videos";
                        $sql = "SELECT  * FROM videos WHERE status =? AND category=? ORDER BY id DESC";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "ss", $status, $category);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $general_videos_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }

                function display_vlf_videos(){
                    global $db, $vlf_videos_rows,  $status;
                    $status = "true";
                    $category = "vlf message videos";
                        $sql = "SELECT  * FROM videos WHERE status =? AND category=? ORDER BY id DESC";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "ss", $status, $category);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $vlf_videos_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }

                function display_movies_videos(){
                    global $db, $movies_videos_rows,  $status;
                    $status = "true";
                    $category = "movies";
                        $sql = "SELECT  * FROM videos WHERE status =? AND category=? ORDER BY id DESC";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "ss", $status, $category);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $movies_videos_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }


                function display_downloads_videos_index(){
                    global $db, $videos_rows,  $status;
                    $status = "true";
                        $sql = "SELECT  * FROM videos WHERE status =? ORDER BY id DESC LIMIT 3";
                        if ($stmt = mysqli_prepare($db, $sql)) {
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "s", $status);
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                $result =  mysqli_stmt_get_result($stmt);
                                // Check if data exists, if yes display data
                                if (mysqli_num_rows($result)) {
                                    $videos_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        
                                }
                            }
                        }
                    }


                    //displaying youtube videos
                    function display_liveStreaming(){
                        global $db, $livestreaming_rows,  $status;
                        $speaker = "youtube music";
                            $sql = "SELECT  * FROM livestreaming WHERE speaker =? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $speaker);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $livestreaming_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }
                    function display_youtube_vlf(){
                        global $db, $vlf_livestreaming_rows,  $status;
                        $speaker = "youtube vlf messages";
                            $sql = "SELECT  * FROM livestreaming WHERE speaker =? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $speaker);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $vlf_livestreaming_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }
                    function display_youtube_talkshow(){
                        global $db, $talkshow_livestreaming_rows,  $status;
                        $speaker = "Youtube Talkshow";
                            $sql = "SELECT  * FROM livestreaming WHERE speaker =? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $speaker);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $talkshow_livestreaming_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }
                    function display_youtube_movies(){
                        global $db, $movies_livestreaming_rows,  $status;
                        $speaker = "Youtube movies";
                            $sql = "SELECT  * FROM livestreaming WHERE speaker =? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $speaker);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $movies_livestreaming_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }

                    //displaying youtube videos on the row column on the single page
                    function display_liveStreaming_single_loops(){
                        global $db, $livestreaming_rows,  $status;
                        $status = "true";
                            $sql = "SELECT  * FROM livestreaming WHERE status =? ORDER BY id DESC LIMIT 13";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $status);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $livestreaming_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }
                    //displaying youtube videos
                    function display_liveStreaming_single(){
                        global $db, $livestreaming_row,  $id;
                        $status = "true";
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];

                            $sql = "SELECT  * FROM livestreaming WHERE id =? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "i", $id);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $livestreaming_row = mysqli_fetch_assoc($result);
                            
                                    }
                                }
                            }
                        }
                    }

                    //displaying youtube videos
                    function display_liveStreaming_index(){
                        global $db, $livestreaming_rows,  $status;
                        $status = "true";
                            $sql = "SELECT  * FROM livestreaming WHERE status =? ORDER BY id DESC LIMIT 3";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $status);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $livestreaming_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }









            //delete audio
            function delete_audio($request){
                global $db, $id;
               if(isset($_GET['id'])){
                   $id = $_GET['id'];
            
                   $sql = "DELETE  FROM downloads WHERE id =?";
                   if($stmt = mysqli_prepare($db, $sql)){
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        if(mysqli_stmt_execute($stmt)){
                            header("location:downloads.php");
                        }
                   }
               }
            
            }
            

            //delete livstreaming
            function delete_livestreaming($request){
                global $db, $id;
               if(isset($_GET['id'])){
                   $id = $_GET['id'];
            
                   $sql = "DELETE  FROM livestreaming WHERE id =?";
                   if($stmt = mysqli_prepare($db, $sql)){
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        if(mysqli_stmt_execute($stmt)){
                            header("location:youtubevideos.php");
                        }
                   }
               }
            
            }
            
            function delete_video($request)
            {
                global $db, $id;
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
            
                    $sql = "DELETE  FROM videos WHERE id =?";
                    if ($stmt = mysqli_prepare($db, $sql)) {
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        if (mysqli_stmt_execute($stmt)) {
                            header("location:downloads.php");
                        }
                    }
                }
            }


            function video_downloads()
            {
                global $db, $id, $rows, $row;

                // Downloads files
 if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM videos WHERE id=?";
    if ($stmt = mysqli_prepare($db, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $result =  mysqli_stmt_get_result($stmt);
            // Check if data exists, if yes display data
            if (mysqli_num_rows($result)) {
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach($rows as $row){

                }
            }  
        
        }
    }
    $filepath = 'admin/' . $row['video'];

if (file_exists($filepath)) {
   header('Content-Description: File Transfer');
   header('Content-Type: application/octet-stream');
   header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
   header('Expires: 0');
   header('Cache-Control: must-revalidate');
   header('Pragma: public');
   header('Content-Length: ' . filesize('admin/' . $row['video']));
   readfile('admin/' . $row['video']);
   exit;
          }
     }

         }

        


            function audio_downloads()
            {
                global $db, $id, $rows, $row;

                // Downloads files
 if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM downloads WHERE id=?";
    if ($stmt = mysqli_prepare($db, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $result =  mysqli_stmt_get_result($stmt);
            // Check if data exists, if yes display data
            if (mysqli_num_rows($result)) {
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach($rows as $row){

                }
            }  
        
        }
    }
    $filepath = 'admin/' . $row['audio'];

if (file_exists($filepath)) {
   header('Content-Description: File Transfer');
   header('Content-Type: application/octet-stream');
   header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
   header('Expires: 0');
   header('Cache-Control: must-revalidate');
   header('Pragma: public');
   header('Content-Length: ' . filesize('admin/' . $row['audio']));
   readfile('admin/' . $row['audio']);
   exit;
          }
     }

         }

        




         //blogs
                  function blog($request)
                  {
                      global $db,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $success, $title, $body, $author, $file_err, $title_error, $body_error;
                     
                      $title = $request['title'];
                      $author = $request['author'];
                      $body = $request['body'];

                      if (empty($title)) {
                          $title_error = "This field is required";
                      }
                            
                            
                      if (empty($body)) {
                          $body_error = "This field is required";
                      }
                            
                          //file upload file name
                          $file = $_FILES['file'];
                          $fileName = $_FILES['file']['name'];
                          $fileTmpName = $_FILES['file']['tmp_name'];
                          $fileSize = $_FILES['file']['size'];
                          $fileError = $_FILES['file']['error'];
                          $fileType = $_FILES['file']['type'];
                  
                          $fileExt = explode('.', $fileName);
                          $fileActualExt = strtolower(end($fileExt));
                  
                          $allowed = array('jpg', 'jpeg', 'png');
                      
                          if (in_array($fileActualExt, $allowed)) {
                              if ($fileError === 0) {
                                  if ($fileSize < 10000000) {
                                      $fileNameNew = uniqid('', true).".".$fileActualExt;
                                      $fileDestination = 'admin/img/'.$fileNameNew;
                                      move_uploaded_file($fileTmpName, $fileNameNew);
                                  
                                      if (empty($fileNameNew)) {
                                          $file_err = "No file Was choosen";
                                      } else {
                             
                                      //Insert to database
                                          $sql = "INSERT INTO blog
                                           (title, body, author,pic) VALUES (?,?,?,?)";
                          
                                          if ($stmt = mysqli_prepare($db, $sql)) {
                                   
                                     //bind values to the prepared statement
                                              mysqli_stmt_bind_param($stmt, "ssss", $title, $body, $author, $fileNameNew);
                                              if (mysqli_stmt_execute($stmt)) {
                                                  $success = " Post Added Successfully";
                                              }
                                          }
                                      }
                                  }
                              }
                          }
                      }
                
             //displaying blog post
                    function display_blogs(){
                        global $db, $blog_rows,  $status;
                        $status = "true";
                            $sql = "SELECT  * FROM blog WHERE status =? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $status);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                    $blog_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }

                    function display_blogs_col(){
                        global $db, $blog_rows_col,  $status;
                        $status = "true";
                            $sql = "SELECT  * FROM blog WHERE status =? ORDER BY id DESC LIMIT 8";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $status);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                    $blog_rows_col = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }

                    function display_blogs_index(){
                        global $db, $blog_rows,  $status;
                        $status = "true";
                            $sql = "SELECT  * FROM blog WHERE status =? ORDER BY id DESC LIMIT 3";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $status);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                    $blog_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }
                  

                           //delete blog
            function delete_blog($request){
                global $db, $id;
               if(isset($_GET['id'])){
                   $id = $_GET['id'];
            
                   $sql = "DELETE  FROM blog WHERE id =?";
                   if($stmt = mysqli_prepare($db, $sql)){
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        if(mysqli_stmt_execute($stmt)){
                            header("location:blog.php");
                        }
                   }
               }
            
            }

    

                          //displaying details to be edited in the blog post
                          function display_blog_edit(){
                            global $db, $blog_row,  $id;
                            $status = "true";
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
    
                                $sql = "SELECT  * FROM blog WHERE id =?";
                                if ($stmt = mysqli_prepare($db, $sql)) {
                                    // Bind variables to the prepared statement as parameters
                                    mysqli_stmt_bind_param($stmt, "i", $id);
                                    // Attempt to execute the prepared statement
                                    if (mysqli_stmt_execute($stmt)) {
                                        // Store result
                                        $result =  mysqli_stmt_get_result($stmt);
                                        // Check if data exists, if yes display data
                                        if (mysqli_num_rows($result)) {
                                            $blog_row = mysqli_fetch_assoc($result);
                                
                                        }
                                    }
                                }
                            }
                        }

                          //updating blog post
                          function update_blog($request){
                            global $db, $blog_row,  $id, $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $success, $title, $body, $author, $file_err, $title_error, $body_error;
                            $status = "true";

                            if(isset($_GET['id'])){
                                $id = $_GET['id'];

                     
                                $title = $request['title'];
                                $author = $request['author'];
                                $body = $request['body'];
          
                                if (empty($title)) {
                                    $title_error = "This field is required";
                                }
                                      
                                      
                                if (empty($body)) {
                                    $body_error = "This field is required";
                                }
                                      
                                    //file upload file name
                                    $file = $_FILES['file'];
                                    $fileName = $_FILES['file']['name'];
                                    $fileTmpName = $_FILES['file']['tmp_name'];
                                    $fileSize = $_FILES['file']['size'];
                                    $fileError = $_FILES['file']['error'];
                                    $fileType = $_FILES['file']['type'];
                            
                                    $fileExt = explode('.', $fileName);
                                    $fileActualExt = strtolower(end($fileExt));
                            
                                    $allowed = array('jpg', 'jpeg', 'png');
                                
                                    if (in_array($fileActualExt, $allowed)) {
                                        if ($fileError === 0) {
                                            if ($fileSize < 10000000) {
                                                $fileNameNew = uniqid('', true).".".$fileActualExt;
                                                $fileDestination = 'admin/img/'.$fileNameNew;
                                                move_uploaded_file($fileTmpName, $fileNameNew);
                                            
                                                if (empty($fileNameNew)) {
                                                    $file_err = "No file Was choosen";
                                                } else {
                                       
    
                                $sql = "UPDATE blog SET title=?, body=?, author=?, pic=? WHERE id =?";
                                if ($stmt = mysqli_prepare($db, $sql)) {
                                    // Bind variables to the prepared statement as parameters
                                    mysqli_stmt_bind_param($stmt, "ssssi",$title, $body, $author, $fileNameNew,  $_GET['id']);
                                    // Attempt to execute the prepared statement
                                    if(mysqli_stmt_execute($stmt)){
                                        $success = 'Post Updated Successfully';
                                        header("location: blog.php?success=$success");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

     
        
         //comments for each blog
         function comment($request)
         {
             global $db,$id,  $file, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $error, $image,  $fileNameNew, $fileDestination, $success, $name, $body, $author, $file_err, $name_error, $body_error;
               
             if(isset($_GET['id'])){
                 $id = $_GET['id'];

             $name = $request['full_name'];
             $body = $request['body'];

             if (empty($name)) {
                 $name_error = "This field is required";
             }
                   
                   
             if (empty($body)) {
                 $body_error = "This field is required";
             }
                   
                 //file upload file name
                 $file = $_FILES['file'];
                 $fileName = $_FILES['file']['name'];
                 $fileTmpName = $_FILES['file']['tmp_name'];
                 $fileSize = $_FILES['file']['size'];
                 $fileError = $_FILES['file']['error'];
                 $fileType = $_FILES['file']['type'];
         
                 $fileExt = explode('.', $fileName);
                 $fileActualExt = strtolower(end($fileExt));
         
                 $allowed = array('jpg', 'jpeg', 'png');
             
                 if (in_array($fileActualExt, $allowed)) {
                     if ($fileError === 0) {
                         if ($fileSize < 1000000) {
                             $fileNameNew = uniqid('', true).".".$fileActualExt;
                             $fileDestination = 'admin/img/'.$fileNameNew;
                             move_uploaded_file($fileTmpName, $fileNameNew);
                        
                    
                             //Insert to database
                                 $sql = "INSERT INTO blog_comments
                                  (full_name, body, pic, blog_id) VALUES (?,?,?,?)";
                 
                                 if ($stmt = mysqli_prepare($db, $sql)) {
                          
                            //bind values to the prepared statement
                                     mysqli_stmt_bind_param($stmt, "sssi", $name, $body,$fileNameNew, $id);
                                     if (mysqli_stmt_execute($stmt)) {
                                         $success = "";
                                     }
                                 }
                             }
                         }
                     }
                 }
             }
               
                     //displaying details to be edited in the blog post
                     function display_comments(){
                        global $db, $comments,  $id;
                        $status = "true";
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];

                            $sql = "SELECT  * FROM blog_comments WHERE blog_id =?";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "i", $id);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }
                    }
            
                     //blog comments
                     function display_comment_admin(){
                        global $db, $rows, $row, $status;
                        $status = "true";
                             $sql = "SELECT  * FROM blog_comments WHERE status =? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $status);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                        }

                     
                                        //delete blog
            function delete_comments($request){
                global $db, $id;
               if(isset($_GET['id'])){
                   $id = $_GET['id'];
            
                   $sql = "DELETE  FROM blog_comments WHERE id =?";
                   if($stmt = mysqli_prepare($db, $sql)){
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        if(mysqli_stmt_execute($stmt)){
                            header("location:comments.php");
                        }
                   }
               }
            
            }



            //facebook Livstreaming
            function liveStreaming_facebook($request)
  {
      global $db, $livestreaming, $livestreaming_error, $success;
     
      $livestreaming = $request['livestreaming'];
            
      if (empty($livestreaming)) {
          $livestreaming_error = "This field is required";
      } else {

                      //Insert to database
                                      $sql = "INSERT INTO livestreaming_facebook (url) VALUES (?)";
          
                                      if ($stmt = mysqli_prepare($db, $sql)) {
                   
                     //bind values to the prepared statement
                                          mysqli_stmt_bind_param($stmt, "s", $livestreaming);
                                          if (mysqli_stmt_execute($stmt)) {
                                              $success = " Facebook URL Added Successfully";
                                          }
                                      }
                                  }
                              }
                   
                            // display live facebook 
                              function display_livestreaming_facebook(){
                                global $db, $facebook_rows, $row, $status;
                                $status = "true";
                                     $sql = "SELECT  * FROM livestreaming_facebook WHERE status =? ORDER BY id DESC";
                                    if ($stmt = mysqli_prepare($db, $sql)) {
                                        // Bind variables to the prepared statement as parameters
                                        mysqli_stmt_bind_param($stmt, "s", $status);
                                        // Attempt to execute the prepared statement
                                        if (mysqli_stmt_execute($stmt)) {
                                            // Store result
                                            $result =  mysqli_stmt_get_result($stmt);
                                            // Check if data exists, if yes display data
                                            if (mysqli_num_rows($result)) {
                                                $facebook_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    
                                            }
                                        }
                                    }
                              }
                            

                              function delete_livestreaming_facebook($request){
                                global $db, $id;
                               if(isset($_GET['id'])){
                                   $id = $_GET['id'];
                            
                                   $sql = "DELETE  FROM livestreaming_facebook WHERE id =?";
                                   if($stmt = mysqli_prepare($db, $sql)){
                                        mysqli_stmt_bind_param($stmt, "i", $id);
                                        if(mysqli_stmt_execute($stmt)){
                                            header("location:livestreaming.php");
                                        }
                                   }
                               }
                            
                            }
                
                      //general search button
                      function general_search($request){
                        global $db, $search_rows, $row, $search;
                        $search = $request['search'].'%';
                             $sql = "SELECT * FROM downloads
                             WHERE topic LIKE  ? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $search);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $search_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                      }
                    
                      function search($request){
                        global $db, $v_rows, $row, $search;
                        $search = $request['search'].'%';
                             $sql = "SELECT * FROM videos
                             WHERE topic LIKE  ? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $search);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $v_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                      }
                      function blog_search($request){
                        global $db, $search_rows, $row, $search;
                        $search = $request['search'].'%';
                             $sql = "SELECT * FROM blog
                             WHERE title LIKE  ? ORDER BY id DESC";
                            if ($stmt = mysqli_prepare($db, $sql)) {
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $search);
                                // Attempt to execute the prepared statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Store result
                                    $result =  mysqli_stmt_get_result($stmt);
                                    // Check if data exists, if yes display data
                                    if (mysqli_num_rows($result)) {
                                        $search_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            
                                    }
                                }
                            }
                      }
                    








?>

