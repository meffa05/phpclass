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
}