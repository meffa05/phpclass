<?php

namespace App\Controllers;

use App\Models\Member;
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
        $Race=new Race();
        $Race->add_races($this->request->getPost('Name'),$this->request->getPost('Location'),$this->request->getPost('Description'),$this->request->getPost('Date'));
        header("Location: marathon");
        exit();
    }
    //Delete race
    public function delete_race($id)
    {
        $Race=new Race();
        $this->session = service('session');
        $this->session->start();
        $memberKey = $this->session->get("memberKey");
        $Member = new Member();
        if($Member->has_access($id, $memberKey))
        {

            $Race->delete_races($id);


        }else{
            echo "Error Access Denied";
            exit();
        }


        header("Refresh:0; url=/marathon/public/marathon");
        exit();
    }
    //Update Race: loading view with the data that needs updating
    public function update_race($id)
    {
        $data= array('manage_marathon' => 'true');
        $this->session = service('session');
        $this->session->start();
        $memberKey = $this->session->get("memberKey");
        $Member = new Member();
        if($Member->has_access($id, $memberKey))
        {
            $Race=new Race();

            $data['race'] = $Race->get_race($id);


        }else{
            echo "Error Access Denied";
            exit();
        }
        return view("update_page",$data);


    }
    public function edit_race()
    {
        $Race=new Race();

        $this->session = service('session');
        $this->session->start();
        $memberKey = $this->session->get("memberKey");
        $Member = new Member();
        if($Member->has_access('txtID', $memberKey))
        {
            $Race->update_races($this->request->getPost('Name'),$this->request->getPost('Location'),$this->request->getPost('Description'),$this->request->getPost('Date'),$this->request->getPost('txtID'));


        }else{
            echo "Error Access Denied";
            exit();
        }


        header("Location: /marathon/public/marathon");
        exit();

    }
    public function logout()
    {
        $this->session = service('session');
        $this->session->destroy();
        header("Location: /marathon/public/");
        exit();

    }

}