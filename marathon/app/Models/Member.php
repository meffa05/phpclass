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