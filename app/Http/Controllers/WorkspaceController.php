<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function store(Request $request)
    {
        Workspace::create([
            'user_id' =>auth()->user()->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status
        ]);

        return to_route('home');
    }


}
