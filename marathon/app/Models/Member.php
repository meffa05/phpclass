<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function user_login($email,$password)
    {

        //this is where the errors began
        $db=db_connect();
        $sql="SELECT memberID, memberPassword, roleID, memberKey from memberLogin where memberEmail = ?";
        $query=$db->query($sql,[$email]);
        $row=$query->getFirstRow();

        if (empty($row)) {

        }
        else {

        }
        //echo $row->memberKey;
        echo"<br />----";
        echo $email;
        echo"<br />";
        echo $password;
        exit();

        return true;
    }

}