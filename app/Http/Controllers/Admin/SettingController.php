<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Collection;
use File;
use Hash;

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
            $skill=Department::find($request->id);
        }else{
            $skill= new Department();
        }

        $skill->name=$request->input('name');
        $skill->save();
        return redirect()->route('admin.dashboard')->with('message','Department Save Successfully');
    }
    public function deleteSkill(Request $request,$id)
    {
        $skill=Department::findOrfail($id);
        
        $skill->delete();
        return redirect()->route('admin.dashboard')->with('message','Department has been Deleted Successfully');
    }
    public function saveUser(Request $request)
    {
  
        if($request->id)
        {
            $request->validate([
                'name'=>'required',
                'type'=>'required',
            ]);
            $user= User::findOrfail($request->id)->Update([
                'name'=>$request->name,
                'email'=>$request->email,
                'temp_password'=>$request->password,
                'password'=>Hash::make($request->password),
                'type'=>$request->type,
            ]);
        }else{
            $request->validate([
                'name'=>'required',
                'email'=>['required','email','max:255','unique:users'],
                'password'=>['string','min:6'],
                'type'=>'required',
            ]);
            $user= User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'temp_password'=>$request->password,
                'password'=>Hash::make($request->password),
                'type'=>$request->type,
            ]);
        }
       
    
        // return view ('admin.pages.users',get_defined_vars());
        return redirect()->route('admin.user.list')->with('message','User Save Successfully');;
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
