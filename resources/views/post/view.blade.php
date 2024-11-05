<x-app-layout>
    <div class="bg-black flex flex-col justify-center items-center font-twitterChirp overflow-hidden pb-8">
        <div class="w-[40rem] h-auto bg-black hover:bg-[#080808] border border-[#2F3336] pt-[10px] pr-[14px] pl-[12px] flex hover:cursor-pointer">
            <div class="h-full w-auto pr-[6px] flex flex-col justify-start items-center">
                <div class="avatar">
                    <div class="w-12 rounded-full">
                      <img src="{{ asset($post->user->profile_picture) }}" />
                    </div>
                  </div>
            </div>
            <div class="grow bg-inherit flex flex-col justify-start items-start">
                <div class="w-full h-[35px] bg-inherit flex justify-between items-start">
                    <div class="flex justify-start items-center gap-x-2 text-[15px]">
                        <div class="text-white font-bold">{{$post->user->name}}</div>
                        <div>·</div>
                        <div>{{$post->created_at->diffForHumans()}}</div>
                    </div>
                    <div>
                        <div class="dropdown dropdown-bottom dropdown-end">
                            <div tabindex="0" role="button" class="btn w-auto rounded-full bg-inherit border-none hover:bg-[#0A1720] hover:text-[#1D9BF0] transition-colors duration-300">
                                <i class="fa-solid fa-ellipsis text-xl"></i>
                            </div>
                            <ul tabindex="0" class="dropdown-content menu bg-black rounded-box z-[1] min-w-52 p-2 shadow shadow-white">
                              @if ($post->users_id != Auth::user()->id)
                                <li><a><i class="fa-solid fa-user-plus"></i>Follow {{$post->user->name}}</a></li>
                              @endif
                              
                              @if ($post->users_id == Auth::user()->id)
                                <li><a class="text-red-500"><i class="fa-solid fa-trash"></i>Delete post</a></li>
                              @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="min-h-[19px] w-full bg-inherit mb-[10px] text-white text-[15px]">
                    {{$post->content}}
                </div>
                <div class="h-[19px] min-w-1/5 bg-inherit mb-[10px] gap-x-[19px] flex justify-between items-center">
                    <div class="flex items-center tooltip tooltip-bottom" data-tip="Reply">
                        <div class="rounded-full w-8 h-8 flex justify-center items-center bg-inherit hover:bg-[#0A1720] group">
                            <i class="fa-regular fa-comment group-hover:text-[#1D9BF0]"></i>
                        </div>
                        <div class="hover:text-[#1D9BF0]">23</div>
                    </div>
                    <div class="flex items-center tooltip tooltip-bottom" data-tip="Like">
                        <div class="rounded-full w-8 h-8 flex justify-center items-center bg-inherit hover:bg-[#210914] group">
                            <i class="fa-regular fa-heart group-hover:text-[#F91880]"></i>
                        </div>
                        <div class="hover:text-[#F91880]">14</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

