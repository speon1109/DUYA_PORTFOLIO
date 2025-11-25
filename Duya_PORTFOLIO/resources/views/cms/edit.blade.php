@include('components.header')

<div>
    <form action="/updateProject{{$project->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Enter title">
        <textarea name="description" placeholder="Enter description"></textarea>
        @foreach ($tags as $tag)
            <label>
                <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                @if ($project->tags->contains($tag->id))checked @endif>
                {{$tag->name}}
            </label>
        @endforeach
        <input type="file" name="images[]">
        <button>Save changes</button>
    </form>
</div>

@include('components.footer')