@include('components.header')

<div>
    <h1>All Projects</h1>
    <div>
        @forelse ($projects as $project)
            <h2>{{$project->title}}</h2>
            @if ($project->photos->first())
                <img src="{{asset('storage/'. $project->photos->first()->path)}}" width="300">
            @endif
            <p>Description:<br>{{$project->short_description}}</p>
            <a href="/edit/{{$project->id}}">Edit</a>
            <form action="/destroyProject/{{$project->id}}" method="POST">@csrf @method('DELETE')<button>Delete</button></form>
            <form action="/show/{{$project->id}}" method="GET">@csrf <button>View</button></form>
        @empty
            <h2>You don't have any projects yet</h2>
        @endforelse
        <form action="/addProject" method="POST">@csrf<button>Create +</button></form>
    </div>
</div>

@include('components.footer')