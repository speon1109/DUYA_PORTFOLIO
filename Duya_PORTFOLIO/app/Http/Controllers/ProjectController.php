<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Photo;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function addProject(){ //get
        $tags= Tag::all();
        return view('add', compact('tags'));
    }

    public function editProject(Project $project){ //get
        $tags= Tag::all();
        return view('edit', compact('project','tags'));
    }

    public function showProjects(){ //get
        $projects= auth()->user()->projects()->with('tags', 'photos')->latest()->get();
        return view('dashboard', compact('projects'));
    }

    public function createProject(Request $request){ //post
        $fields= $request->validate([
            'title'=>'required|string',
            'short_description'=>'required|string',
            'description'=>'required|string',
            'source_code'=>'string',
            'tags'=>'array',
            'tags/*'=>'exists:tags,id',
            'images'=>'array',
            'images.*' => 'image|max:2048',
        ]);

        $project= Project::create([
            'title'=>strip_tags($fields['title']),
            'short_description'=>strip_tags($fields['short_description']),
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
        return redirect()->route('showProject',$project->id);
    }
    
    public function updateProject(Request $request, Project $project){ //patch
        $fields= $request->validate([
            'title'=>'string',
            'short_description'=>'string',
            'description'=>'string',
            'source_code'=>'string',
            'tags'=>'array',
            'tags/*'=>'exists:tags,id',
            'images'=>'array',
            'images.*' => 'image|max:2048',
        ]);

        $project->update([
            'title'=>strip_tags($fields['title'] ?? $project->title),
            'short_description'=>strip_tags($fields['short_description'] ?? $project->short_description),
            'description'=>strip_tags($fields['description'] ?? $project->description),
            'source_code'=>strip_tags($fields['source_code'] ?? $project->source_code),
        ]);

        $project->tags()->sync($fields['tags'] ?? []);

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
