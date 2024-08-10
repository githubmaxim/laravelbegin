<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ForAutentRequest;
use App\Http\Requests\ForCacheAutentRequest;
use App\Http\Requests\ForCacheRequest;
use App\Http\Requests\ForCacheUserRequest;
use App\Models\ForAutent;
use App\Models\ForCache;
use App\Models\ForCacheAutent;
use App\Models\ForCacheUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ForCacheController extends Controller
{
    public function store(ForCacheRequest $request)
    {
        $data = $request->validated();
        $data['for_cache_user_id'] = Auth::id(); //добавляем в $data дополнительное поле 'for_cache_user_id' со значением поля "id" из таблицы аутентификации (для привязки вводимой информации к конкретному зарегистрированному клиенту)
        $post = ForCache::create($data);
        Cache::put('for_cache:' . Auth::id() . 'information1', $post);
        Cache::put('for_cache:' . Auth::id() . 'information2', "New information");

        dump(Cache::get('for_cache:' . Auth::id(). 'information1'));
        dump(Cache::get('for_cache:' . Auth::id(). 'information2'));

        return "OK";
    }

//    public function index()
//    {
//        return ForCache::all();
//    }
//    public function show(ForCache $forCacheation)
//    {
//        return $forCacheation;
//    }
//
//    public function update(ForCacheRequest $request, ForCache $forCacheation)
//    {
//        $forCacheation->update($request->validated());
//
//        return $forCacheation;
//    }
//
//    public function destroy(ForCache $forCacheation)
//    {
//        $forCacheation->delete();
//
//        return response()->json();
//    }

    public function private()
    {
        return view('forCacheation.private');
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('forCache.private');
        }
        return view('forCacheation.login');
    }

    public function postLogin(\Illuminate\Http\Request $request){
        if (Auth::check()) {
            return redirect()->route('forCache.private');
        }

        $formFields = $request->only(['email', 'password']);
        $remember = true; //иммитируем ситуацию, как будто у нас на странице регистрации есть флажок "запомнить меня" и пользователь нажал его

        //"attempt" проверяет наличие связки таких данных в таблице
        if (Auth::attempt($formFields, $remember)) {

            //метод "intended" вначале пробует вернуть страницу к которой мы пытались изначально обратиться,
            // и если не выходит то тогда на выбранную нами страницу
            return redirect()->intended(route('forCache.private'));
        }
        return redirect()->route('forCache.login')->withErrors(['email'=>'Не удалось авторизоваться']);
    }

    public function getRegistrat()
    {
        if (Auth::check()) {
            return redirect()->route('forCache.private');
        }
        return view('forCacheation.registrat');
    }

    public function postRegistrat(ForCacheUserRequest $request){
        if(Auth::check()){
            return redirect()->route('forCache.private');
        }

        //этот блок мне писать не нужно, т.к. проверка на уникальность этого поля записана в валидации
//        if (ForAutent::where('email',$request->email)->exists()){
//            return redirect()->route('forAutent.registrat')->withErrors([
//                'email'=>'Такой пользователь уже зарегистрирован'
//            ]);
//        }

        $user = ForCacheUser::create($request->validated());
        if ($user){
            Auth::login($user); //проводим аутентификацию пользователя
            return redirect()->route('forCache.private');
        }
        return redirect()->route('forCache.login')->withErrors(['formError'=>'Произошла ошибка при сохранении пользователя']);
    }

    public function getLogout(){
        Auth::logout();
        dump('logout');
        return redirect()->route('forCache.login');
    }
}
