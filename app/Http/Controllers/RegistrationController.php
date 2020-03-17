<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;

class RegistrationController extends Controller
{
    //
	public function Start(Request $request)
	{
			
		//ユーザーidの決定
		$user_id = uniqid();	

		//初期データ
		$user_profile = new UserProfile;
		$user_profile->user_id = $user_id;
		$user_profile->user_name = 'user name';

		try{
			$user_profile->save();
		}catch(\PDOException $e){
			return conig('error.ERROR_DB_UPDATE');
		}

		//返答処理
		$user_profile = UserProfile::where('user_id', $user_id)->first();

		$response = array(
			'user_profile' => $user_profile,
		);
		return json_encode($response);
	
	}
}
