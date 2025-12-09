<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data=['index' => 'true'];
        return view("admin_page",$data);
    }
    public function manage_marathon(): string //added from week 13 in class work
    {
        $data=['manage_marathon' => 'true'];
        return view("marathon_page",$data);
    }
    public function add_marathon(): string //added from week 13 in class work
    {
        $data=['add_marathon' => 'true'];
        return view("add_page",$data);
    }
    public function manage_runners(): string //added from week 13 in class work
    {
        $data=['manage_runners' => 'true'];
        return view("runners_page",$data);
    }
    public function registration_form(): string //added from week 13 in class work
    {
        $data=['registration_page' => 'true'];
        return view("registration_page",$data);
    }

}