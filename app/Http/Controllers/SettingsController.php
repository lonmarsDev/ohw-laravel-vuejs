<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecurityQuestionRequest;
use App\Models\SecurityQuestion;
use App\Models\UserSecurityAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    var $user;
    var $country;

    public function __construct()
    {
        // $this->middleware('auth');

        /** Seed a user id */

        // $user = User::find();
        $this->user = [
            'id' => '1',
            'username' => 'test',
            'email' => 'test@test.com',
            'fname' => 'test',
            'lname' => 'test',
            'company' => 'test',
            'address' => 'test',
            'address_2' => 'test',
            'city' => 'test',
            'zip' => '123',
            'countryName' => 'Dummy',
            'country' => 'dummy',
            'phone' => '',
            'vat_tax' => '123',
            'timezone' => 'timezone2',
            'date_format' => 3,
            'currency_format' => 2

        ];

        $this->country = [
            'dummy' => [
                'countryId' => 'dummy',
                'name' => 'Dummy'
            ],
            'dummy2' => [
                'countryId' => 'dummy2',
                'name' => 'Dummy 2'
            ]
        ];
        $this->timezone = [
            'timezone1' => [
                'timezoneId' => 'timezone1',
                'name' => 'Timezone 1'
            ],
            'timezone2' => [
                'timezoneId' => 'timezone2',
                'name' => 'Timezone 2'
            ]
        ];
    }

    public function contact()
    {
        return view('settings.contact')->with([
            'user' => $this->user,
            'country' => $this->country
        ]);
    }

    public function details()
    {
        return view('settings.details')->with([
            'user' => $this->user,
            'timezone' => $this->timezone,
        ]);
    }

    public function security(Request $request)
    {
        $securityQuestions = SecurityQuestion::all();
        $securityAnswers = UserSecurityAnswer::where('user_id', $request->user()->id)->get();

        return view('settings.security', [
            'security_questions' => $securityQuestions,
            'security_answers' => $securityAnswers,
            'security_questions_answered' => count($securityAnswers) == 3
        ]);
    }

    public function securityQuestions(SecurityQuestionRequest $request)
    {
        $user = $request->user();
        $security_answer = UserSecurityAnswer::where('user_id', $user->id)->get();

        if (!is_null($security_answer)) {
            UserSecurityAnswer::destroy(array_pluck($security_answer, 'id'));
        }

        $security_answer1 = new UserSecurityAnswer;
        $security_answer1->user_id = $user->id;
        $security_answer1->security_question_id = $request->security_question1;
        $security_answer1->answer = bcrypt($request->security_answer1);
        $security_answer1->save();

        $security_answer2 = new UserSecurityAnswer;
        $security_answer2->user_id = $user->id;
        $security_answer2->security_question_id = $request->security_question2;
        $security_answer2->answer = bcrypt($request->security_answer2);
        $security_answer2->save();

        $security_answer3 = new UserSecurityAnswer;
        $security_answer3->user_id = $user->id;
        $security_answer3->security_question_id = $request->security_question3;
        $security_answer3->answer = bcrypt($request->security_answer3);
        $security_answer3->save();

        return response()->json([
            'message' => 'Security Questions and Answers saved!'
        ]);
    }
}
