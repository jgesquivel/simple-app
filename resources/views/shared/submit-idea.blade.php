@auth()
<h4> Share yours ideas </h4>

<div class="row">
    <form action="{{ route('idea.store') }}" method="post">
        @csrf
        <h5>Title:</h5>
        <div class="mb-3">
            <textarea name="title" class="form-control" id="title" rows="1"></textarea>
            @error('title')
            <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <h5>Content:</h5>
        <div class="mb-3">
            <textarea name="content" class="form-control" id="idea" rows="3"></textarea>
            @error('content')
            <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth
@guest()
<h4>login to post   </h4>
@endguest