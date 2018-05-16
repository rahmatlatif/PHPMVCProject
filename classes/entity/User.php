<?php
namespace classes\entity;
use classes\business\UserManager;
use classes\util\DBUtil;

class User
{
   public $id=0;
   public $firstName;
   public $lastName;
   public $email;
   public $password;
   public $is_admin;
   public $is_block;
}
?>
