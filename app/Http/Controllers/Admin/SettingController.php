<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Portfolio;
use Illuminate\Support\Collection;
use File;

class SettingController extends Controller
{
    public function saveInfoSettings(Request $request)
    {
        $directory="/upload/settings/images/";
        foreach ($request->all() as $key => $value) {
            // Skip the CSRF token
            if ($key == '_token') {
                continue;
            }
    
            // Check if the value is a file
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path($directory), $fileName);
                $value= $directory . $fileName;
                   
            }
    
            // Check if the key already exists in the database
            $setting = Setting::where('key', $key)->first();
    
            if ($setting) {
                // If the key exists, update its value
                $setting->value = $value;
                $setting->save();
            } else {
                // If the key does not exist, create a new record
                $setting = new Setting();
                $setting->key = $key;
                $setting->value = $value;
                $setting->save();
            }
        }
    
        return redirect()->back();
    }

    public function saveSkill(Request $request)
    {
        if($request->id)
        {
            $skill=Skill::find($request->id);
        }else{
            $skill= new Skill();
        }

        $skill->name=$request->input('name');
        $skill->value=$request->input('value');
        $skill->save();
        return redirect()->route('admin.pages.setting.about');
    }
    public function portfolioSettings(Request $request)
    {
        // dd($request->all());
       

       $directory="/upload/images/portfolio/";

       if($request->portfolio)
       {
            foreach($request->portfolio as $file)
            {
                    $setting = new Portfolio();
        
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path($directory), $fileName);
                    $setting->img = $directory . $fileName;
                    $setting->save();
            }

        }
        // remove un-necessary links from DB
        if($request->remove_urls)
        {
            
            $setting=Portfolio::whereIn('img',$request->remove_urls)->delete();
            foreach($request->remove_urls as $file)
            {
                if(File::exists(public_path($file))) {
                    File::delete(public_path($file));
                  }
            }
        }
       return redirect()->route('admin.pages.setting.portfolio');
    }
}
