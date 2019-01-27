<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function setLang(Request $request)
    {
        $lang = $request->lang;
        session()->put('locale', $lang);
        app()->setLocale($lang);
        return redirect()->back();
    }
}
