<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\StoreRequest;
use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use view;
use App\Models\User;
use App\Models\Profile;
use App\Services\Profile\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $_service;
    public function __construct(Service $service){
        $this->_service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        
        $resType = $request->input('resoponse');
        $profiles = Profile::paginate(10);

        if($resType == 'api' ){
            return ProfileResource::collection($profiles);
        }else{
            return view('profile.index', compact('profiles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(User $user)
    {
        $profile ='';
        $auth_user = Auth::user();
        $is_own = true;

        if($auth_user->id != $user->id){
            $is_own= false;
            return view('profile.edit', compact('is_own', 'profile'));
        }

        $profile= Profile::where('user_id', $user->id)->first();
        if($profile){
            return redirect()->route('profiles.edit', $user->id);
        }

        return view('profile.create', compact('is_own', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $req, StoreRequest $request, User $user)
    {
        $resType = $req->input('resoponse');

        $data = $request->validated();

        $result = $this->_service->store($data, $user);

        if($resType == 'api'){
            return $result? "Profile created successful" : "Something went wrong";
        }else{
            return $result ? redirect()->route('profiles.show', $user->id)->with('create', '1') 
                            : redirect()->route('profiles.show', $user->id)->with('create', '0');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user)
    {
        $profiles = Profile::where('user_id', $user->id)->get();
        $profile = isset($profiles[0]) ? $profiles[0] : false;
        $user_id = $user->id;
        $auth_user = Auth::user();
        $auth_id = $auth_user->id;
        $username = $user->name;
        $useremail =  $user->email;

        return view('profile.show', compact('profile', 'username', 'user_id', 'auth_id', 'useremail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $profile='';
        $auth_user = Auth::user();
        $auth_id = $auth_user->id;
        $user_id = $user->id;
        $is_own = true;
        if($auth_id != $user_id){
            $is_own= false;
            return view('profile.edit', compact('is_own', 'profile'));
        }
        $profiles = Profile::where('user_id', $user_id)->get();
        $profile = isset($profiles[0]) ? $profiles[0] : false;

        return  $profile 
                ? view('profile.edit', compact('is_own', 'profile')) 
                : redirect()->route('profiles.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, UpdateRequest $request, User $user)
    {
        $resType = $req->input('resoponse');

        $data = $request->validated();

        $result = $this->_service->update($data, $user);

        if($resType == 'api'){
            return $result? "Post updated successful" : "Something went wrong";
        }else{
            return $result ? redirect()->route('profiles.show', $user->id)->with('update', '1') 
                            : redirect()->route('profiles.show', $user->id)->with('update', '0');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , User $user)
    {
        $resType = $request->input('resoponse');
        
        $profile = Profile::where('user_id', $user->id)->first();

        $deleted = false;

        if(isset($profile)){
            $profile->delete();
            $deleted = true;
        }


        if($resType == 'api'){
            return $deleted ? "Post deleted successful" : "Post is not exist!" ;
        }else{
            return $deleted ? redirect()->route('profiles.show', $user->id)->with('delete', '1') 
                            : redirect()->route('profiles.show', $user->id)->with('delete', '0');
        }
    }
}
