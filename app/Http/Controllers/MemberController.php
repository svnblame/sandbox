<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function show(Request $request)
    {
        return response()->json(['id' => $request->id]);
    }
}
