<?php
namespace classes\entity;
use classes\business\UserManager;
use classes\util\DBUtil;

class Topic
{
   public $topicId=0;
   public $topicTopic;
   public $topicDetail;
   public $topicCreator;
   public $topicCreatorEmail;
   public $topicDateTime;
   public $topicViews;
   public $topicReplies;
}
?>