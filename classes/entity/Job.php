<?php
namespace classes\entity;
use classes\business\UserManager;
use classes\util\DBUtil;

class Job
{
   public $jobId=0;
   public $jobTitle;
   public $jobDescription;
   public $jobExpiry;
   public $jobRequirement;
}
?>