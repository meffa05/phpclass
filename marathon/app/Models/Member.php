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

    //Create User Assignment
    public function user_creation( $Username, $Email,$Password)
    {

                //database connection code
                $con=getDBconnection();
                $query = "INSERT INTO memberLogin (memberName,  memberEmail, memberPassword) VALUES (?,?,?);";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "sss", $Username, $Email, $Password);
                mysqli_stmt_execute($stmt);




    }


}