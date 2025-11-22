@include('components.header')

<div>
    <h1>{{$project->title}}</h1>
    <div>
        @forelse ($project->photos as $photo)
            <img src="{{asset('storage/'. $photo->path)}}" width="300">
        @empty
            <h2>You didn't upload any photos for this project</h2>
        @endforelse
        <p>Description:<br>{{$project->description}}</p>
        <a href="/edit/{{$project->id}}">Edit</a>
        <form action="/destroyProject/{{$project->id}}" method="POST">@csrf @method('DELETE')<button>Delete</button></form>
    </div>
</div>

@include('components.footer')