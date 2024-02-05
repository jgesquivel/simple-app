<div class="card">
                    <div class="px-3 pt-4 pb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div>
                                <img style="width:100px;" class="me-2 avatar-sm rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $user->name }}" alt="{{ $user->name }}">
                                </div>
                                <div>
                                    <h3 class="card-title mb-0"><a href="#"> {{$user->name}}
                                        </a></h3>
                                    <span class="fs-6 text-muted">@ {{$user->username}}</span><br>
                                    <span class="fs-6 text-muted">@ {{$user->email}}</span>

                                </div>
                            </div>
                            <div>
                                @if(Auth::id()===$user->id)
                                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                                @endif

                            </div>
                        </div>
                        <div class="px-2 mt-4">
                            <h5 class="fs-5"> About : </h5>
                            <p class="fs-6 fw-light">
                                {{ $user->bio }}
                            </p>
                        </div>

                    </div>
                </div>