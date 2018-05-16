<?php
namespace classes\data;

use classes\entity\User;
use classes\entity\Job;
use classes\entity\Community;
use classes\entity\Topic;
use classes\entity\Answer;
use classes\util\DBUtil;
use classes\entity\Thread;
use classes\entity\Message;
class UserManagerDB
{
    public static function fillUser($row){
        $user=new User();
        $user->id=$row["id"];
        $user->firstName=$row["firstname"];
        $user->lastName=$row["lastname"];
        $user->email=$row["email"];
        $user->password=$row["password"];
		$user->is_admin=$row["is_admin"];
        $user->is_block=$row["is_block"];
        return $user;
    }
    public static function fillJobs($row){
        $job=new Job();
        $job->jobId=$row["jobId"];
        $job->jobTitle=$row["jobTitle"];
        $job->jobDescription=$row["jobDescription"];
        $job->jobExpiry=$row["jobExpiry"];
        $job->jobRequirement=$row["jobRequirement"];
        return $job;
    }
	public static function fillCommunity($row){
        $community=new Community();
        $community->communityId=$row["communityId"];
        $community->communityName=$row["communityName"];
        $community->communityLanguage=$row["communityLanguage"];
        $community->communityAdmin=$row["communityAdminId"];
        return $community;
    }
	public static function fillTopics($row){
        $topic=new Topic();
        $topic->topicId=$row["id"];
        $topic->topicTopic=$row["topic"];
        $topic->topicDetail=$row["detail"];
        $topic->topicCreator=$row["name"];
		$topic->topicCreatorEmail=$row["email"];
		$topic->topicDateTime=$row["datetime"];
		$topic->topicViews=$row["view"];
		$topic->topicReplies=$row["reply"];
        return $topic;
    }
	public static function fillAnswers($row){
        $answer=new Answer();
        $answer->answerId=$row["a_id"];
        $answer->answerTopicId=$row["question_id"];
        $answer->answerName=$row["a_name"];
        $answer->answerEmail=$row["a_email"];
		$answer->answerAnswer=$row["a_answer"];
		$answer->answerDateTime=$row["a_datetime"];
        return $answer;
    }
	public static function fillMessage($row){
        $message=new Message();
        $message->messageId=$row["messageId"];
        $message->userTo=$row["user_to"];
        $message->userFrom=$row["user_from"];
        $message->messageBody=$row["messageBody"];
		$message->messageDate=$row["messageDate"];
		$message->subjectId=$row["fk_subjectId"];
        return $message;
    }
	public static function fillThread($row){
        $thread=new Thread();
        $thread->subjectId=$row["subjectId"];
        $thread->userTo=$row["fk_user_to"];
        $thread->userFrom=$row["fk_user_from"];
        $thread->subject=$row["subject"];
		$thread->threadDate=$row["date"];
        return $thread;
    }
    public static function getUserByEmailPassword($email,$password){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $password=mysqli_real_escape_string($conn,$password);
        $sql="select * from tb_user where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    public static function getUserByEmail($email){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from tb_user where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    public static function saveUser(User $user){
        $conn=DBUtil::getConnection();
        $sql="call procSaveUser(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $user->id,$user->firstName, $user->lastName, $user->email,$user->password); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
    public static function getAllUsers(){
        $users[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
	public static function updatePassword($email, $password){
		$user=NULL;
		$conn=DBUtil::getConnection();
		$email=mysqli_real_escape_string($conn,$email);
		$sql="UPDATE tb_user SET password='$password' WHERE email = '$email'";
		$result = $conn->query($sql);
		$conn->close();
    }
	public static function getAllJobs(){
        $jobs[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_jobs";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $job=self::fillJobs($row);
                $jobs[]=$job;
            }
        }
        $conn->close();
        return $jobs;
    }
	public static function getJobById($jobId){
        $job=NULL;
        $conn=DBUtil::getConnection();
        $sql="select * from tb_jobs where jobId='$jobId'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $job=self::fillJobs($row);
            }
        }
        $conn->close();
        return $job;
    }
    public static function saveApplication($user, $job){
        $conn=DBUtil::getConnection();
        $sql="call procSaveApplication(?,?,?)";
        $stmt = $conn->prepare($sql);
		$applyId = NULL;
		$status = 'processing';
		$userId = $user->id;
		$jobId = $job->jobId;
		print $userId;
		print $jobId;
        $stmt->bind_param("sii", $status, $jobId, $userId); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    } 
	public static function searchJobs($query){ 
			$jobs[]=array();
			$conn=DBUtil::getConnection(); 
			$sql = "SELECT * FROM tb_jobs WHERE (jobTitle LIKE '%".$query."%')";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
						$job=self::fillJobs($row);
						$jobs[]=$job;
					}
				$conn->close();
				return $jobs;
				}
		}
	public static function searchUsers($query){ 
			$users[]=array();
			$conn=DBUtil::getConnection(); 
			$sql = "SELECT * FROM tb_user WHERE (firstname LIKE '%".$query."%') OR (lastname LIKE  '%".$query."%')";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
						$user=self::fillUser($row);
						$users[]=$user;
					}
				$conn->close();
				return $users;
				}
		}
	public static function getUserById($id){
			$user=NULL;
			$conn=DBUtil::getConnection();
			$sql="select * from tb_user where id='$id'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				if($row = $result->fetch_assoc()){
					$user=self::fillUser($row);
				}
			}
			$conn->close();
			return $user;
		}		
	public static function getAllCommunities(){
        $communities[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_community";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $community=self::fillCommunity($row);
                $communities[]=$community;
            }
        }
        $conn->close();
        return $communities;
    }
	public static function searchCommunities($query){ 
			$communities[]=array();
			$conn=DBUtil::getConnection(); 
			$sql = "SELECT * FROM tb_community WHERE (communityName LIKE '%".$query."%') OR (communityLanguage LIKE  '%".$query."%')";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
						$community=self::fillCommunity($row);
						$communities[]=$community;
					}
				$conn->close();
				return $communities;
				}
		}
	public static function getCommunityById($id){
			$community=NULL;
			$conn=DBUtil::getConnection();
			$sql="select * from tb_community where communityId='$id'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				if($row = $result->fetch_assoc()){
					$community=self::fillCommunity($row);
				}
			}
			$conn->close();
			return $community;
		}
	public static function getAllTopics($communityName){
        $topics[]=array();
        $conn=DBUtil::getConnection();
        $sql= "select * from `$communityName`";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $topic=self::fillTopics($row);
                $topics[]=$topic;
            }
        }
        $conn->close();
        return $topics;
    }
	public static function getTopicById($communityName,$id){
			$topic=NULL;
			$conn=DBUtil::getConnection();
			$sql="SELECT * FROM `$communityName` WHERE id='$id'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				if($row = $result->fetch_assoc()){
					$topic=self::fillTopics($row);
				}
			}
			$conn->close();
			return $topic;
    }
	public static function getAnswerById($answerName,$id){
        $answers[]=array();
        $conn=DBUtil::getConnection();
        $sql= "select * from `$answerName` WHERE question_id='$id'";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $answer=self::fillAnswers($row);
                $answers[]=$answer;
            }
        }
        $conn->close();
        return $answers;
    }
	public static function updateViews($communityName,$id){
		$topic = self::getTopicById($communityName,$id);
		$view = $topic->topicViews;
        if ($view == 0) {
			$conn=DBUtil::getConnection();
			$sql2="call updateView(?,?,?)";
			$stmt = $conn->prepare($sql2);
			$view=1;
			$stmt->bind_param("sii", $communityName, $id, $view); 
			$stmt->execute();
         } else {
			$conn=DBUtil::getConnection();
			$sql2="call updateView(?,?,?)";
			$stmt = $conn->prepare($sql2);
			$view = $view + 1;
			$stmt->bind_param("sii", $communityName, $id, $view); 
			$stmt->execute();
		 }
        $conn->close();
    }
	public static function addReply($answerName, $id, $a_name, $a_email, $a_answer, $a_datetime) {
        $conn=DBUtil::getConnection(); 
		$sql="SELECT MAX(a_id) FROM $answerName WHERE question_id='$id'";
		$result= $conn->query($sql);
        if ($result !== false) {		
			$Max_id = $result+1;
		}
		else {
			$Max_id = 1;
		}
		$sql="call addReply(?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("iissss", $id, $Max_id, $a_name, $a_email, $a_answer, $a_datetime); 
		$result2=$stmt->execute();
		
		if($result2){
		 
		// If added new answer, add value +1 in reply column
		$sql="call updateReply(?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ii", $Max_id, $id); 
		$stmt->execute();
		}
		else {
		echo "ERROR";
		}
		mysql_close();
	}
	public static function getAllThreads($id){
        $threads[]=array();
        $conn=DBUtil::getConnection();
        $sql= "select * from thread where fk_user_to='$id'";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $thread=self::fillThread($row);
                $threads[]=$thread;
            }
        }
        $conn->close();
        return $threads;
    }
	public static function getAllMessages($id, $userToId){
        $messages[]=array();
        $conn=DBUtil::getConnection();
        $sql= "SELECT * FROM `messages` WHERE `fk_subjectId` ='$id' AND (`user_from` = '$userToId' OR `user_to` ='$userToId')";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $message=self::fillMessage($row);
                $messages[]=$message;
            }
        }
        $conn->close();
        return $messages;
    }
}
?>