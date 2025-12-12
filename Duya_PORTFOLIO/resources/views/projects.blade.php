@include('components.viewerheader')
<div class="grid gap-6 p-6 grid-cols-1 lg:grid-cols-3 xl:grid-cols-4">
    @forelse ($projects as $project)
    @php
        $photo= $project->photos->first();
        $imgSrc= $photo ? asset('storage/' . $photo->path) : asset('images/600x400.png');
        $modalId= 'modal_' . $project->id;
    @endphp
    <div class="card bg-base-100 shadow-xl cursor-pointer" onclick="document.getElementById('{{$modalId}}').showModal()">
        <figure>
            <img src="{{$imgSrc}}" class="w-full h-48 lg:h-64 object-cover"/>
        </figure>
        <div class="card-body">
            <h2 class="card-title text-accent text-2xl truncate">{{$project->title}}</h2>
            <ul class="list">
                @foreach ($project->tags as $tag)
                    <li class="text-info">#{{ $tag->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <dialog id="{{$modalId}}" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-4xl text-primary font-bold break-words">{{$project->title}}</h3>
            <p class="py-4">{{$project->description}}</p>
            <ul class="list py-4">
                @foreach ($project->tags as $tag)
                    <li class="text-info">#{{ $tag->name }}</li>
                @endforeach
            </ul>
            <div class="collapse bg-base-200 py-4">
                <input type="checkbox" />
                <div class="collapse-title text-md font-medium">View code snippet</div>
                <div class="collapse-content">
                    <pre class="whitespace-pre-wrap font-mono text-sm">{{ $project->source_code }}</pre>
                </div>
            </div>
            <h3 class="text-lg font-bold py-4">Screenshots</h3>
            <div class="grid gap-6 py-4 grid-cols-1 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($project->photos as $photo)
                    <div class="w-full overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/'.$photo->path) }}" class="object-cover"/>
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </dialog>
    @empty
    <p>You dont have projects</p>
@endforelse
</div>
@include('components.footer')