<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ForValidRequest;
use App\Models\ForValid;
use Illuminate\Http\Request;

class ForValidController extends Controller
{
    public function create()
    {
        return view('forValidation.viewForValid', ['title'=>'For Validation']);
    }

//    public function store()
//    {
//        dump($_POST);
//    }
//    public function store(Request $request) //из $request сразу можно получать конкретные необходимые данные
    public function store(ForValidRequest $request) //из $request сразу можно получать конкретные необходимые данные
    {
//        dump($request);
//        dump($request->all());
//        dump($request->all('title', 'content'));
//        dump($request->title);
//        dump($request->content);
//        ForValid::create($request->validate());
        ForValid::query()->create($request->all());
        return redirect()->route('forValid.create')->with('message', 'For validation successful!');
    }

}
