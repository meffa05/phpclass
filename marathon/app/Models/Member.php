<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function user_login($email,$Password)
    {


        $db=db_connect();
        $sql="SELECT memberID, memberPassword, roleID, memberKey from memberLogin where memberEmail = ? and roleID = 2";
        $query=$db->query($sql,[$email]);
        $row=$query->getFirstRow();

        if ($row!=null) {

            $DBPass=$row->memberPassword;
            $MemberKey=$row->memberKey;
            $Password=md5($Password.$MemberKey);

            if($Password==$DBPass) {
                return true;

            }
            else{
                return false;
            }
        }
        else {
            return false;
        }






    }

}