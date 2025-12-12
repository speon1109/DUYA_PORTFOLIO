<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Photo;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showProjects(){ //get
        $tags= Tag::all();
        $projects= auth()->user()->projects()->with('tags', 'photos')->latest()->get();
        return view('cms.dashboard', compact('projects','tags'));
    }

    public function showProjectsGuest(){
        $tags= Tag::all();
        $projects= Project::with('tags', 'photos')->latest()->get();
        return view('projects', compact('projects','tags'));
    }

    public function createProject(Request $request){ //post
        $fields= $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'source_code'=>'string',
            'tags'=>'array',
            'tags/*'=>'exists:tags,id',
            'images'=>'array',
            'images.*' => 'image|max:2048',
        ]);

        $project= auth()->user()->projects()->create([
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
        return redirect()->route('showProjects',$project->id);
    }
    
    public function updateProject(Request $request, Project $project){ //patch
        $fields = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'source_code' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048',
        ]);


        $project->update([
            'title'=>strip_tags($fields['title'] ?? $project->title),
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
