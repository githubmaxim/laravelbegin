<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ForMailRequest;
use App\Mail\SendMail;
use App\Models\ForMail;
use Illuminate\Support\Facades\Mail;

class ForMailController extends Controller
{
//    public function index()
//    {
//        return ForMail::all();
//    }
//
//    public function store(ForMailRequest $request)
//    {
//        return ForMail::create($request->validated());
//    }

    public function show()
    {
        $invoice = ForMail::find(1);

        Mail::to($invoice->email, $invoice->name)->send(new SendMail($invoice));

        return new SendMail($invoice); //пишется если мы хотим просмотреть свое отправляемое сообщение без отправки адресату

//        return $forMail;
    }

//    public function update(ForMailRequest $request, ForMail $forMail)
//    {
//        $forMail->update($request->validated());
//
//        return $forMail;
//    }
//
//    public function destroy(ForMail $forMail)
//    {
//        $forMail->delete();
//
//        return response()->json();
//    }
}
