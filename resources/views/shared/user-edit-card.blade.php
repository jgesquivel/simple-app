
                @include('shared.success-message')
                <hr>
                    <div class="mt-3">
                        <div class="card">
                            <div class="px-3 pt-4 pb-2">
                                <form enctype="multipart/formdata" method="POST" action="{{route('users.update', $user->id)}}">
                                @csrf
                                @method('put')

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                    <div>
                                        <img style="width:100px;" class="me-2 avatar-sm rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $user->name }}" alt="{{ $user->name }}">
                                    </div>
                                        <div>
                                            @if($editing ?? false)
                                                <textarea name="name" class="form-control" id="name" rows="1">{{ $user->name}}</textarea>
                                                @error('username')
                                                <span class="fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                                <textarea name="username" class="form-control" id="username" rows="1">{{ $user->username}}</textarea>
                                                @error('username')
                                                <span class="fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="fs-6 text-muted">{{$user->email}}</span>   

                                            @endif 
                                        </div>
                                    </div>
                                    <div>
                                    @if($editing ?? false)
                                    <button type="submit" class="btn btn-dark btn-sm mb-3">Update</button>
                                    @endif
                                    </div>
                                </div>
                                    
                                </div>
                                
                                <div class="px-2 mt-4">
                                    <h5 class="fs-5"> About : </h5>
                                    @if($editing ?? false)
                                        <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                                        @error('bio')
                                        <span class="fs-6 text-danger">{{ $message }}</span>
                                        @enderror   
                                    @endif
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                


                