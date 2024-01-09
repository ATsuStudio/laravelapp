<?php

namespace App\Services\Profile;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function store($data, $user)
    {

        try {
            DB::beginTransaction();

            $profile = Profile::where('user_id', $user->id)->first();

            if ($profile){
                return false;
            }

            if(isset($data['logo'])){
                $fileObj = $data['logo'];
                $filename = $fileObj->getClientOriginalName();
                $imagePath = $fileObj->storeAs('public/images/logo/'. $user->name . '/' . date("Y-m-d"), rand(1000, 9999) . '_'. $filename);
                $data['logo'] = str_replace("public/", "", $imagePath);
            }
            $data['user_id'] = $user->id; 

            $profile = Profile::create($data);

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }



    public function update($data, $user)
    {
        try {
            DB::beginTransaction();

            if(isset($data['logo'])){
                $fileObj = $data['logo'];
                $filename = $fileObj->getClientOriginalName();
                $imagePath = $fileObj->storeAs('public/images/logo/'. $user->name . '/' . date("Y-m-d"), rand(1000, 9999) . '_'. $filename);
                $data['logo'] = str_replace("public/", "", $imagePath);
            }
            $data['user_id'] = $user->id; 
            $profile = Profile::where('user_id', $user->id)->first();
            //dd($profile, $data);
            $profile->update($data);


            DB::commit();
            return $profile;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
