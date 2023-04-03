<?php

use App\Models\Setting;
use App\Models\Skill;
use App\Models\Portfolio;

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