<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\challenge;
use App\User;
use App\challenge_user;


class ChallengeController extends Controller
{
    //
    public function index()
    {
        if (User::isadmin()) {
            return view('create');
        } else return redirect()->route('login');
    }


    public function newchallenge(Request $data)
    {
        if (User::isadmin()) {
            $data->flash();
            $request = $data->all();

            $add = new challenge;

            return $add->create(['title' => $request['title'],
                'class' => $request['class'],
                'description' => $request['description'],
                'url' => $request['url'],
                'flag' => $request['flag'],
                //'info'=>$request['info'],
                'score' => $request['score'],
            ]);
        }
    }

    public function edit($id)
    {
        if (User::isadmin()) {
            $challenge = challenge::find($id);
            return view('edit', ['challenge' => $challenge]);

        } else return redirect()->route('login');

    }

    public function editchallenge($id, Request $data)
    {
        if (User::isadmin()) {
            $data->flash();
            $request = $data->all();
            $challenge = challenge::find($id);

            $challenge->title = $request['title'];
            $challenge->class = $request['class'];
            $challenge->description = $request['description'];
            $challenge->url = $request['url'];
            $challenge->flag = $request['flag'];
            //$challenge->info=$request['info'];
            $challenge->score = $request['score'];

            if ($challenge->save()) return redirect()->route('login');
            else return view('edit', ['status' => '出现错误']);

        }
    }

    public function showChallenges()
    {             //显示对应板块的题目
//        $challengeInfo = challenge::where('class', $fields)->get(['id', 'title', 'description', 'url', 'info', 'score']);
//        if (Auth::check()) {
//            $userid = Auth::id();
//            $challengeData = collect([]);
//            foreach ($challengeInfo as $challenge) {
//                $challengeid = $challenge->id;
//                $issolved = 0;
//
//                if (challenge_user::where(['userid' => $userid, 'challengeid' => $challengeid])->first()) {
//                    $issolved = 1;
//                } else {
//                    $issolved = 0;
//                }
//
//                $challengeData->push(array('id' => $challenge->id,
//                    'title' => $challenge->title,
//                    'description' => $challenge->description,
//                    'url' => $challenge->url,
//                    'info' => $challenge->info,
//                    'score' => $challenge->score,
//                    'issolved' => $issolved));
//            }
//            return view('challenge', ['challengeInfo' => $challengeData->values(), 'class' => $fields]);
//        }
//        //根据传递的板块搜索题目信息
//        return view('challenge', ['challengeInfo' => $challengeInfo, 'class' => $fields]);
        return view('challenge');
    }

    public function ShowScoreBoard(Request $request)
    {

        $users = User::scoreboard()->toArray();
        $perPage = 50;
        if ($request->has('page')) {
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 : $current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($users, ($current_page - 1) * $perPage, $perPage); //注释1
        $total = count($users);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(), //注释2
            'pageName' => 'page',
        ]);
        $userlist = $paginator->toArray()['data'];
        return view('scoreboard', ['users' => $userlist, 'paginator' => $paginator]);
    }

    public function ShowScore()
    {
        if (Auth::check()) {
            $id = Auth::id();
            $score = User::userscore($id);
            $challenges = User::solvedchallenges($id);
            //return $challenges;
            return view('score', ['score' => $score, 'challenges' => $challenges]);
        } else return redirect()->route('login');
    }

    /*
        public function showChallengeDetail($id)
        {
            if (Auth::check()){
                $challengeInfo = challenge::find($id);
                return view('challengedetail', ['challenge'=>$challengeInfo]);
            }
            else return redirect()->route('login');
        }
    */
    public function submitFlag($id, Request $data)
    {
        $data->flash();
        $flag = $data['flag'];
        if (Auth::check()) {             //whether login
            $userid = Auth::id();
            if (!challenge_user::where(['userid' => $userid, 'challengeid' => $id])->first()) {                      //whether finished
                $correctFlag = challenge::find($id)->flag;
                if ($flag === $correctFlag) {        //whether correct
                    challenge_user::create(['userid' => $userid, 'challengeid' => $id]);
                    return redirect()->back()->withInput()->withErrors('correct!');

                } else return redirect()->back()->withInput()->withErrors('wrong!');
            } else return redirect()->back()->withInput()->withErrors('solved!');
        } else return redirect()->route('login');
    }
}
