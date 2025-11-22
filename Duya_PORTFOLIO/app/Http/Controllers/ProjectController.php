<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function addProject(){ //get
        return view('add');
    }
    public function editProject(Project $project){ //get
        return view('edit', compact('project'));
    }
    public function showProjects(){ //get
        $tags= Tag::all();
        $projects= auth()->user()->projects()->with('tags')->latest()->get();
        return view('dashboard', compact('projects','tags'));
    }
    public function showProject(Project $project){ //get
        return view('showProject', compact('project'));
    }

    public function createProject(Request $request){ //post
        $fields= $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'source_code'=>'string',
            'tags'=>'array',
            'tags/*'=>'exists:tags,id',
            'images'=>'array|image|max:2048',
            'images.*' => 'image|max:2048',
        ]);

        $project= Project::create([
            'title'=>strip_tags($fields['title']),
            'description'=>strip_tags($fields['description']),
            'source_code'=>strip_tags($fields['source_code']),
        ]);

        $project->tags()->sync($fields['tags']??[]);

        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $path= $image->store('photos','public');
                $project->photos()->create(compact('path'));
            }   
        }
        return redirect()->route('showProjects');
    }












    public function destroyProject(Project $project){ //delete
        $project->delete();
        return redirect()->route('showProjects');
    }


}
