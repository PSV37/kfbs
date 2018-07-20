<?

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
if(!empty($_POST['userName']) || !empty($_POST['userEmail']) || !empty($_FILES['file']['inputContentC'])){

$errors ='';
$validation_errors =false;
//Get the uploaded file information
$name_of_uploaded_file =basename($_FILES['uploaded_file']['name']);

//get the file extension of the file
$type_of_uploaded_file =
    substr($name_of_uploaded_file,
    strrpos($name_of_uploaded_file, '.') + 1);

$size_of_uploaded_file =
 $_FILES["uploaded_file"]["size"]/1024;//size in KBs
//Settings
$max_allowed_file_size = 100; // size in KB
$allowed_extensions = array("doc", "docx", "odt");

//Validations
if($size_of_uploaded_file > $max_allowed_file_size )
{
  $errors .= "\n Size of file should be less than $max_allowed_file_size";
 // $validation_errors =true;
}

//------ Validate the file extension -----
$allowed_ext = false;
for($i=0; $i<sizeof($allowed_extensions); $i++)
{
  if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
  {
    $allowed_ext = true;
  }
}


$upload_folder='./upload_folder/';
//copy the temp. uploaded file to uploads folder
$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
$tmp_path = $_FILES["uploaded_file"]["tmp_name"];

if(is_uploaded_file($tmp_path))
{
  if(!copy($tmp_path,$path_of_uploaded_file))
  {
    $errors .= '\n error  uploaded file';

  }
}

	$message =  new PHPMailer(true);
    //Server settings
                                 // Enable verbose debug output
    $message->isSMTP();                                      // Set mailer to use SMTP
	$message->SMTPSecure = 'tls';
	$message->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $message->SMTPAuth = true;                               // Enable SMTP authentication
    $message->Username = 'balajipastapure@gmail.com';                 // SMTP username
    $message->Password = '9767281145';                           // SMTP password
                           // Enable TLS encryption, `ssl` also accepted
    $message->Port = 587;  
                                      // TCP port to connect to

/*     $message->isSMTP();                                      // Set mailer to use SMTP
    $message->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
    $message->SMTPAuth = true;                               // Enable SMTP authentication
    $message->Username = 'donotreply@kfbs.co.in';                 // SMTP username
    $message->Password = 'L4>/35#PY8rKgPLf';                           // SMTP password
    $message->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $message->Port = 587;    */

  if(!$validation_errors){
      //Recipients
      $message->setFrom('balajipastapure@gmail.com');

      $name= 'sss';
      $email1='balaji.pastapure007@gmail.com';
      $mobile= $_REQUEST["inputmobile"];
      $content= $_REQUEST["inputContentC"];
      $message->Subject = $name.' has applied for a job '.'['.$email1.']';
      $message->ContentType = 'text/plain';
      $message->addAttachment($path_of_uploaded_file);
      $message->isHTML(false);
      $message->Body =  'Hello Team!'."\n".$name." has applied for job, his/her resume is attached with this email ".""."\n\n\n".'Sincerely'."\n"."Team Kfbs.co.in"
                  ."\n\n\n\n\n"."";

      $message->AddAddress ($email1, $name);
      $responce=[];
      if(!$message->Send())
      {
          $error_message = "Mailer Error: " . $message->ErrorInfo;
          $error_message;
          $responce['status']=false;
          $responce['msg']='somthing went wrong ';
              //header('Location: error.php');
      }else{
      	  $responce['status']=true;
          $responce['msg']='Thnank You !!!!';
      }

      echo json_encode($responce);
     //delete files from servers
      //unlink($path_of_uploaded_file);
  }

  }