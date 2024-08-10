<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ForAutentRequest;
use App\Models\ForAutent;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class ForAutentController extends Controller
{
    public function private()
    {
        return view('forAuthentication.private');
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('forAutent.private');
        }
        return view('forAuthentication.login');
    }

    public function postLogin(\Illuminate\Http\Request $request){
        if (Auth::check()) {
            return redirect()->route('forAutent.private');
        }

        $formFields = $request->only(['email', 'password']);
        $remember = true; //иммитируем ситуацию, как будто у нас на странице регистрации есть флажок "запомнить меня" и пользователь нажал его

        //"attempt" проверяет наличие связки таких данных в таблице
        if (Auth::attempt($formFields, $remember)) {

            //метод "intended" вначале пробует вернуть страницу к которой мы пытались изначально обратиться,
            // и если не выходит то тогда на выбранную нами страницу
            return redirect()->intended(route('forAutent.private'));
        }
        return redirect()->route('forAutent.login')->withErrors(['email'=>'Не удалось авторизоваться']);
    }

    public function getRegistrat()
    {
        if (Auth::check()) {
            return redirect()->route('forAutent.private');
        }
        return view('forAuthentication.registrat');
    }

    public function postRegistrat(ForAutentRequest $request){
        if(Auth::check()){
            return redirect()->route('forAutent.private');
        }

        //этот блок мне писать не нужно, т.к. проверка на уникальность этого поля записана в валидации
//        if (ForAutent::where('email',$request->email)->exists()){
//            return redirect()->route('forAutent.registrat')->withErrors([
//                'email'=>'Такой пользователь уже зарегистрирован'
//            ]);
//        }

        $user = ForAutent::create($request->validated());
        if ($user){
            Auth::login($user); //проводим аутентификацию пользователя
            return redirect()->route('forAutent.private');
        }
        return redirect()->route('forAutent.login')->withErrors(['formError'=>'Произошла ошибка при сохранении пользователя']);
    }

    public function getLogout(){
        Auth::logout();
        dump('logout');
        return redirect()->route('forAutent.login');
    }

}
