<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AddWorkspaceRequest;

class WorkspaceController extends Controller
{
    public function store(AddWorkspaceRequest $request)
    {
        Workspace::create([
            'user_id' =>auth()->user()->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status,
        ]);


        return to_route('home');
    }

    public function delete(Workspace $workspace)
    {
        $this->authorize('delete', $workspace);
        $workspace->task()->delete();
        $workspace->delete();

        return to_route('home');
    }

    public function show(Workspace $workspace)
    {
        $this->authorize('view', $workspace);
        $tasks = $workspace->task;
        return view('workspace.show', compact('workspace', 'tasks'));
    }

    public function edit(Workspace $workspace)
    {
        $this->authorize('update', $workspace);
        return view('workspace.edit', compact('workspace'));
    }

    public function update(Request $request, Workspace $workspace)
    {
        // $this->authorize('update', $workspace);
        $workspace->update([
            'user_id' =>auth()->user()->id,
            'name' =>$request->name,
            'datetime'=>$request->datetime,
            'status'=>$request->status
        ]);
        return to_route('home');
    }


}
