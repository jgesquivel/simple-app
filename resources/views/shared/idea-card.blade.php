 <div class="card">
                        <div class="px-3 pt-4 pb-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $idea-> user->name }}" alt="{{ $idea-> user->name }}">
                                    <div>
                                        <h5 class="card-title mb-0"><a href="{{ route('users.show',$idea->user->id) }}"> {{$idea-> user->name}}
                                            </a></h5>
                                    </div>
                                </div>
                                <div>
                                    <form method="post" action=" {{ route('idea.destroy', $idea->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('idea.show', $idea->id)}}">View</a>
                                        @if(auth()->id() !==$idea->user_id)
                                        @else
                                        <a href="{{route('idea.edit', $idea->id)}}">Edit</a>
                                        

                                        <button class="btn btn-danger btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                        </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            @if($editing ?? false)
                                <form action="{{ route('idea.update', $idea->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <h5>Title:</h5>
                                    <div class="mb-3">
                                        <textarea name="title" class="form-control" id="title" rows="1">{{ $idea->title}}</textarea>
                                        @error('title')
                                        <span class="fs-6 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <h5>Content:</h5>
                                    <div class="mb-3">
                                        <textarea name="content" class="form-control" id="idea" rows="3">{{ $idea->content}}</textarea>
                                        @error('content')
                                        <span class="fs-6 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-dark"> Update </button>
                                    </div>
                                </form>
                            @else
                                <h5>{{$idea->title}}</h5>
                                <p class="fs-6 fw-light text-muted">
                                    {{ $idea->content }}
                                </p>
                            @endif
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="#" class="fw-light nav-link fs-6"> </a>
                                </div>
                                <div>
                                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                        {{ $idea->created_at }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
