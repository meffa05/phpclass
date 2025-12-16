<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function user_login($email,$Password)
    {


        $db=db_connect();
        //in video he has it saying and RoleId = 2 for the query
        $sql="SELECT memberID, memberPassword, roleID, memberKey from memberLogin where memberEmail = ? and roleID = 2";
        $query=$db->query($sql,[$email]);
        $row=$query->getFirstRow();

        if ($row!=null) {

            $DBPass=$row->memberPassword;
            $MemberKey=$row->memberKey;
            $Password=md5($Password.$MemberKey);

            if($Password==$DBPass) {
                //start the session service
                $this->session = service('session');
                $this->session->start();
                //session variables
                $this->session->set("roleID",$row->roleID);
                $this->session->set("UID",$row->memberID);


                return true;
                //get header and redirect to admin site
            }
            else{
                return false;
            }
        }
        else {
            return false;
        }


    }

    //Create User Assignment
    public function create_user( $username,$password,$password2, $email)
    {
        $MemberKey=sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
        $hashedPaWD=md5($password.$MemberKey);
        //setting role Id to 2 because in Joe's videos he only allows users with roleID 2 to log in
        $roleID = 2;
        if($password === $password2) {
            try {
                $db = db_connect();
                $sql = "INSERT INTO memberLogin (memberName, memberEmail, memberPassword,roleID, memberKey) values(?,?,?,?,?)";
                $db->query($sql, [$username, $email,$hashedPaWD,$roleID,$MemberKey]);
                return true;

            } catch (\Exception $ex) {
                return false;
            }
        }
        else {
            return false;
        }



    }
}