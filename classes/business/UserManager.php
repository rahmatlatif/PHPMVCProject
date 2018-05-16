<?php
namespace classes\business;

use classes\entity\User;
use classes\entity\Job;
use classes\entity\Community;
use classes\entity\Topic;
use classes\data\UserManagerDB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use classes\entity\Thread;
use classes\entity\Message;

class UserManager
{
    public static function getAllUsers(){
        return UserManagerDB::getAllUsers();
    }
    public function getUserByEmailPassword($email,$password){
        return UserManagerDB::getUserByEmailPassword($email,$password);
    }
    public function getUserByEmail($email){
        return UserManagerDB::getUserByEmail($email);
    }
    public function saveUser(User $user){
        UserManagerDB::saveUser($user);
    }
	public function sendMail ($email, $password) {
		//send email
		$mail = new PHPMailer;
		//Enable SMTP debugging.
		$mail->SMTPDebug = 0;
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();
		//Set SMTP host name
		$mail->Host = "smtp.gmail.com";
		//Set this to true if SMTP host requires authentication
		$mail->SMTPAuth = true;
		//Provide username and password
		$mail->Username = "abclearnctr@gmail.com";
		$mail->Password = "RahmatYasin";
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";
		//Set TCP port to connect to
		$mail->Port = 587;
		$mail->From = "abclearnctr@gmail.com";
		$mail->FromName = "ABC Learning Centre Admin";
		$mail->addAddress("$email");
		$mail->isHTML(true);
		$mail->Subject = "Account Details Recovery";
		$mail->Body = "<p>Hi, you or someone else have requested your account details. Here is your account information please keep this as you may need this at a later stage. Your password is $password Your password has been reset please login and change your password to something more rememberable. Regards Site Admin</p>";
		$mail->AltBody = "This is the plain text version of the email content";
		$mail->send();
	}
	public function updatePassword ($email, $password) {
		UserManagerDB::updatePassword($email, $password);
	}
    public static function getAllJobs(){
        return UserManagerDB::getAllJobs();
    }
     public function getJobById($jobId){
        return UserManagerDB::getJobById($jobId);
    }
    public function saveApplication($user, $job){
        UserManagerDB::saveApplication($user, $job);
	}
	public function searchJobs($query){
        return UserManagerDB::searchJobs($query);
	}
	public function searchUsers($query){
        return UserManagerDB::searchUsers($query);
	}
	public function getUserById($id){
        return UserManagerDB::getUserById($id);
    }
	public function getAllCommunities(){
        return UserManagerDB::getAllCommunities();
    }
	public function searchCommunities($query){
        return UserManagerDB::searchCommunities($query);
	}
	public function getCommunityById($id){
        return UserManagerDB::getCommunityById($id);
    }
	public function getAllTopics($communityName){
        return UserManagerDB::getAllTopics($communityName);
    }
	public function getTopicById($communityName,$id){
        return UserManagerDB::getTopicById($communityName,$id);
    }
	public function getAnswerById($answerName,$id){
        return UserManagerDB::getAnswerById($answerName,$id);
    }
	public function updateViews($communityName,$id){
        return UserManagerDB::updateViews($communityName,$id);
    }
	public function addReply($answerName, $id, $a_name, $a_email, $a_answer, $a_datetime){
        UserManagerDB::addReply($answerName, $id, $a_name, $a_email, $a_answer, $a_datetime);
    }
	public function getAllThreads($id){
        return UserManagerDB::getAllThreads($id);
    }
	public function getAllMessages($id, $userToId){
        return UserManagerDB::getAllMessages($id, $userToId);
    }
}
?>
