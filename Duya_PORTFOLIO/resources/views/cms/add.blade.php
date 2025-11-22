@include('components.header')

<div>
    <form action="/createProject" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Enter title">
        <textarea name="short_description" placeholder="Enter short description"></textarea>
        <textarea name="description" placeholder="Enter description"></textarea>
        @foreach ($tags as $tag)
            <label>
                <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                @if (in_array($tag->id,old('tags',[]))) checked @endif>
                {{$tag->name}}
            </label>
            
        @endforeach
    </form>
</div>

@include('components.footer')