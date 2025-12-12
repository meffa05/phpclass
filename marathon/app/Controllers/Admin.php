<?php

namespace App\Controllers;

use App\Models\Race;

class Admin extends BaseController
{
    public function index(): string
    {
        $data=array('index' => 'true');
        return view("admin_page",$data);
    }
    //Navigation
    public function manage_marathon(): string //added from week 13 in class work
    {
        $Race=new Race();
        $data= array('manage_marathon' => 'true');
        $data['races'] = $Race->get_races();
        return view("marathon_page",$data);
    }
    public function add_marathon(): string //added from week 13 in class work
    {
        $data=array('add_marathon' => 'true');
        return view("add_page",$data);
    }
    public function manage_runners(): string //added from week 13 in class work
    {
        $data= array('manage_runners' => 'true');
        return view("runners_page",$data);
    }
    public function registration_form(): string //added from week 13 in class work
    {
        $data= array('registration_form' => 'true');
        return view("registration_page",$data);
    }
    //Add race
    public function add_race()
    {
        echo "here";
    }

}