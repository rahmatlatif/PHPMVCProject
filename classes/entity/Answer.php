<?php
namespace classes\entity;
use classes\business\UserManager;
use classes\util\DBUtil;

class Answer
{
   public $answerId=0;
   public $answerTopicId;
   public $answerName;
   public $answerEmail;
   public $answerAnswer;
   public $answerDateTime;
}
?>