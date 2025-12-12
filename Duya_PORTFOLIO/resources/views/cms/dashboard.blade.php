@include('components.header')
<div class="grid gap-6 p-6 grid-cols-1 lg:grid-cols-3 xl:grid-cols-4">
    <div class="card bg-base-100 shadow-xl cursor-pointer flex items-center justify-center text-base-content text-6xl font-bold hover:bg-primary-focus transition"
         onclick="createProject_modal.showModal()">
        <span>+</span>
        <dialog id="createProject_modal" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="text-4xl font-bold">Create a new project</h3>
                
                <form class="grid grid-cols-1 lg:grid-cols-2 gap-6" action="/createProject" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card bg-base-100 w-full shadow-xl">
                        <div class="card-body">
                            <label class="label"><span class="label-text">Title <span class="label-text text-error">*</span></label>
                            <input type="text" class="input input-bordered" name="title" placeholder="What should we call it?">
                            <label class="label"><span class="label-text">Description <span class="label-text text-error">*</span></span></label>
                            <textarea name="description" class="textarea textarea-bordered" placeholder="Tell us something about this project"></textarea>
                            <label class="label"><span class="label-text">Source code</span></label>
                            <textarea name="source_code" class="textarea textarea-bordered" placeholder="Copy and paste a snippet of your source code here"></textarea>
                        </div>

                    </div>
                    <div class="card bg-base-100 w-full shadow-xl">
                        <div class="card-body">
                            <label class="label"><span class="label-text">Select image/s</span></label>
                            <label>
                                <input type="file" name="images[]" multiple class="file-input file-input-bordered w-full max-w-xs" />
                                <div class="label">
                                    <span class="label-text-alt">2mb maximum per file <span class="label-text text-warning">*</span></span>
                                </div>
                            </label>
                            
                            <label class="label"><span class="label-text">Select tags. (Choose all those that apply)</span></label>
                            <div class="form-control">
                                @foreach ($tags as $tag)
                                <label class="cursor-pointer label">
                                    <span class="label-text">{{$tag->name}}</span>
                                    <input 
                                        type="checkbox" 
                                        name="tags[]" 
                                        value="{{$tag->id}}" 
                                        class="checkbox checkbox-success" 
                                        @if (in_array($tag->id,old('tags',[]))) checked @endif />
                                </label>
                                @endforeach
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-full lg:col-span-2">Add</button>
                </form>
            </div>
        </dialog>
    </div>
    @forelse ($projects as $project)
    @php
        $photo= $project->photos->first();
        $imgSrc= $photo ? asset('storage/' . $photo->path) : asset('images/600x400.png');
        $modalId= 'modal_' . $project->id;
    @endphp
    <div class="card bg-base-100 shadow-xl cursor-pointer" onclick="document.getElementById('{{$modalId}}').showModal()">
        <figure>
            <img src="{{$imgSrc}}" class="w-full h-32 lg:h-40 object-cover"/>
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
            <h3 class="text-lg font-bold py-4">Screenshots:</h3>
            <div class="grid gap-6 py-4 grid-cols-1 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($project->photos as $photo)
                    <div class="w-full overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/'.$photo->path) }}" class="object-cover"/>
                    </div>
                @empty
                    <p>No screenshots to show.</p>
                @endforelse
            </div>
            <div class="grid gap-6 py-4 grid-cols-1 lg:grid-cols-2">
                <button class="btn btn-primary w-full" onclick="updateProject_modal.showModal()">Edit</button>
                <dialog id="updateProject_modal" class="modal">
                    <div class="modal-box w-11/12 max-w-5xl">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                        </form>
                        <h3 class="text-4xl text-primary font-bold">Update Project</h3>
                        
                        <form class="grid grid-cols-1 lg:grid-cols-2 gap-6" action="/updateProject/{{$project->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card bg-base-100 w-full shadow-xl">
                                <div class="card-body">
                                    <label class="label"><span class="label-text">Title <span class="label-text text-error">*</span></label>
                                    <input type="text" class="input input-bordered" name="title" placeholder="What should we call it?">
                                    <label class="label"><span class="label-text">Description <span class="label-text text-error">*</span></span></label>
                                    <textarea name="description" class="textarea textarea-bordered" placeholder="Tell us something about this project"></textarea>
                                    <label class="label"><span class="label-text">Source code</span></label>
                                    <textarea name="source_code" class="textarea textarea-bordered" placeholder="Copy and paste a snippet of your source code here"></textarea>
                                </div>

                            </div>
                            <div class="card bg-base-100 w-full shadow-xl">
                                <div class="card-body">
                                    <label class="label"><span class="label-text">Select image/s</span></label>
                                    <label>
                                        <input type="file" name="images[]" multiple class="file-input file-input-bordered w-full max-w-xs" />
                                        <div class="label">
                                            <span class="label-text-alt">2mb maximum per file <span class="label-text text-warning">*</span></span>
                                        </div>
                                    </label>
                                    
                                    <label class="label"><span class="label-text">Select tags. (Choose all those that apply)</span></label>
                                    <div class="form-control">
                                        @foreach ($tags as $tag)
                                        <label class="cursor-pointer label">
                                            <span class="label-text">{{$tag->name}}</span>
                                            <input 
                                                type="checkbox" 
                                                name="tags[]" 
                                                value="{{$tag->id}}" 
                                                class="checkbox checkbox-success" 
                                                @if ($project->tags->contains($tag->id))checked @endif>
                                        </label>
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-full lg:col-span-2">Save changes</button>
                        </form>
                    </div>
                </dialog>
                <form action="/destroyProject/{{$project->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-error w-full">Delete</button>
                </form>
                
            </div>
        </div>
    </dialog>
    @empty
    <p>You dont have projects</p>
@endforelse
</div>
@include('components.footer')