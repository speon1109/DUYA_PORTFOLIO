<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function addProject(){
        return view('add');
    }
    public function editProject(Project $project){
        return view('edit', compact('project'));
    }
    public function showProjects(){
        $tags= Tag::all();
        $projects= auth()->user()->projects()->with('tags')->latest()->get();
        return view('dashboard', compact('projects','tags'));
    }
    public function showProject(Project $project){
        return view('showProject', compact('project'));
    }
    public function destroyProject(Project $project){
        $project->delete();
        return;
    }
}
