<?php

namespace App\Models;

use CodeIgniter\Model;

class Race extends Model
{
public function get_races()
{
    $db=db_connect();
    $sql="SELECT * from race";
    $query=$db->query($sql);
    return $query->getResultArray();

}
    public function add_races($name, $location, $description, $date)
    {
        try{
            $db=db_connect();
            $sql="INSERT INTO race (raceName, raceLocation, raceDescription, raceDateTime) values(?,?,?,?)";
            $db->query($sql,[$name, $location, $description, $date]);
            return true;
        }catch(Exception $ex){
            return false;
        }



    }
}