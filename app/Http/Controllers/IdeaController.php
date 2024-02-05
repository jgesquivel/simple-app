<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
        $validated = request()->validate([
            'title'=>'required|min:1|max:100',
            'content'=>'required|min:1|max:500',
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard') ->with('success','Posted Successfully!');

    }

    public function destroy(Idea $idea){
        if(auth()->id() !==$idea->user_id){
            abort(404);
        }
        $idea->delete();

       return redirect()->route('dashboard') ->with('success','Post deleted!');
    }

    public function show(Idea $idea){
        return view('ideas.show',compact('idea'));
    }

    public function edit(Idea $idea){
        if(auth()->id() !==$idea->user_id){
            abort(404);
        }
        $editing = true;

        return view('ideas.show',compact('idea', 'editing'));
    }

    public function update(Idea $idea){
        if(auth()->id() !==$idea->user_id){
            abort(404);
        }
        request()->validate([
            'title'=>'required|min:1|max:100',
            'content'=>'required|min:1|max:500',

        ]);

        $idea->content = request()->get('content','');
        $idea->title = request()->get('title','');
        $idea->save();
        return redirect()->route('idea.show',$idea->id)->with('success',"Post updated successfully!");
    }
}
