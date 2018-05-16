<?php
namespace classes\entity;
use classes\business\UserManager;
use classes\util\DBUtil;

class Message
{
   public $messageId=0;
   public $userTo;
   public $userFrom;
   public $messageBody;
   public $messageDate;
   public $subjectId;
}
?>