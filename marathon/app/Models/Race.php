<?php

namespace App\Models;

use CodeIgniter\Model;

class Race extends Model
{
public function get_races()
{
    //start the session service
    $this->session = service('session');
    $this->session->start();
    $memberKey = $this->session->get("memberKey");

    $db=db_connect();
    $sql="select R.raceID, R.raceName, R.raceLocation, R.raceDescription, R.raceDateTime
from race R
inner join member_race MR on R.raceID = MR.raceID
inner join memberLogin ML on MR.memberID = ML.memberID
where ML.memberKey = '$memberKey'
and MR.roleID = '2';";
    $query=$db->query($sql);
    return $query->getResultArray();

}
    public function get_race($id)
    {
        $db=db_connect();
        $sql="SELECT * from race where raceID= ?";
        $query=$db->query($sql,[$id]);
        return $query->getResultArray();
    }
    public function add_races($name, $location, $description, $date)
    {
        $this->session = service('session');
        $this->session->start();
        $memberID = $this->session->get("memberID");
        try{
            //insert my race
            $db=db_connect();
            $sql="INSERT INTO race (raceName, raceLocation, raceDescription, raceDateTime) values(?,?,?,?)";
            $db->query($sql,[$name, $location, $description, $date]);

            //get Auto ID
            $sql="Select LAST_INSERT_ID()";
            $query = $db->query($sql);
            $row =$query->getResultArray();
            $LastID = $row[0]["LAST_INSERT_ID()"];

            //insert into my Member_race Table
            $sql="INSERT INTO member_race (memberID, raceID, roleID) values(?,?,2)";
            $db->query($sql,[$memberID,$LastID]);
            return true;



        }catch(\Exception $ex){
            return false;
        }



    }
    public function delete_races($id)
    {
        try{
            $db=db_connect();
            $sql="delete FROM race where raceID = ?";
            $db->query($sql,[$id]);
            return true;
        }catch(\Exception $ex){
            return false;
        }



    }
    public function update_races($name, $location, $description, $date,$txtID)
    {
        try{
            $db=db_connect();
            $sql="UPDATE race set raceName=?, raceLocation=?, raceDescription=?, raceDateTime=? where raceID=?";
            $db->query($sql,[$name, $location, $description, $date,$txtID]);
            return true;
        }catch(\Exception $ex){
            return false;
        }



    }
}