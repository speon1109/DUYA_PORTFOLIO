@include('components.header')

<div>
    <h1>All Projects</h1>
    <div>
        @forelse ($projects as $project)
            <h2>{{$project->title}}</h2>
            @forelse ($project->photos as $photo)
                <img src="{{asset('storage/'. $photo->path)}}" width="300">
            @empty
                <h2>You didn't upload any photos for this project</h2>
            @endforelse
            <p>Description:<br>{{$project->description}}</p>
            <a href="/edit/{{$project->id}}">Edit</a>
            <form action="/destroyProject/{{$project->id}}" method="POST">@csrf @method('DELETE')<button>Delete</button></form>
        @empty
            <h2>You don't have any projects yet</h2>
        @endforelse
        <form action="/addProject" method="POST">@csrf<button>Create +</button></form>
    </div>
</div>

@include('components.footer')