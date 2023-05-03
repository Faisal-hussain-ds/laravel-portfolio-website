<?php

use App\Models\Setting;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\Department;
use App\Models\User;
use App\Models\InternshipRequest;

class Helper {

    public static function settingValue($key){
        return Setting::where('key',$key)->first()->value??'';
    }

    public static function getPortfolio(){
        return Portfolio::all();
    }

    public static function getSkills()
    {
        return Skill::all();
    }
    public static function getDepartments()
    {
        return Department::all();
    }
    public static function getRequests()
    {
        return InternshipRequest::all();
    }
    public static function getUsers($type)
    {
        if($type=='All')
        {
            $users=User::orderBy('id','desc');
        }else{
            $users=User::where('type',$type)->orderBy('id','desc');
        }
        return $users->get();
    }

    public static function uploadFile($file,$directory)
    {
     
        if ($file->isValid()) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($directory), $fileName);

            $url = url($directory . $fileName);

           return $url;
        }else{
            return false;
        }

    }


}