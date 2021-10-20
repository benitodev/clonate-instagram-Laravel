
<?php
use App\Models\Image;


$images = Image::orderBy('id', 'desc')->get();

?>
<x-app-layout>



    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">

                    <!-- Posts -->
                @foreach ($images as $image)

                    <!-- Post-->
                    <article class=" flex flex-col mb-8  mr-40 " style="width:70%;">

                        <!-- Header post  | 1 PART -->
                        <header class="flex  justify-between items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out  h-16 p-5  border " style="max-width:714px;">
                            <!-- User's images / head content-->
                            <div class="flex items-center">
                                <img class="inline object-cover w-11 h-11 rounded-full mr-2.5" src="{{$image->user->image}}" alt="Profile image"/>

                                <span class="font-medium text-lg">
                                   <a href="http://instagram.open/nick/{{$image->user->nick}}"> {{ $image->user->nick }} </a>
                                </span>
                            </div>






                            @auth
                             <!-- modal button comprobate if post is mine or any user -->
                            @php
                            $modalAuth = $image->user->nick == auth()->user()->nick ? "true" : "false"
                            @endphp
                            <!-- modal button post options  -->
                            <div id="btnModal" style="cursor:pointer;"><svg aria-label="Más opciones" class="_8-yf5 pointer-events-none" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><circle clip-rule="evenodd" cx="8" cy="24" fill-rule="evenodd" r="4.5"></circle><circle clip-rule="evenodd" cx="24" cy="24" fill-rule="evenodd" r="4.5"></circle><circle clip-rule="evenodd" cx="40" cy="24" fill-rule="evenodd" r="4.5"></circle></svg>

                            <!-- modal button content  -->
                            @if ($modalAuth == "true")
                            <button id="tvesModal" class="modal-container">
                                <div class="modal-content">
                                    <span class="close"></span>
                                    <div class="modal-box">

                                        <span class="modal-options" style="color:#c31414; font-weight: bold;" > <a href="{{route('image.delete', $image->id)}}">Eliminar publicación</a></span>
                                        <span class="modal-options">Ir a la publicación</span>
                                        <span class="modal-options">Compartir en...</span>
                                        <span class="modal-options">Copiar enlace</span>
                                        <span class="modal-options">Insertar</span>
                                        <span class="modal-options close" style="color: #2a2a2a; font-size: 13px; font-weight: 300;">Cancelar</span>
                                    </div>
                                </div>
                            </button>
                            @elseif($modalAuth == "false")
                            <button id="tvesModal" class="modal-container">
                                <div class="modal-content">
                                    <span class="close"></span>
                                    <div class="modal-box">
                                        <span class="modal-options" style="color:#c31414; font-weight: bold;">Reportar</span>
                                        <span class="modal-options" style="color:#c31414; font-weight: bold;" >Dejar de seguir</span>
                                        <span class="modal-options">Ir a la publicación</span>
                                        <span class="modal-options">Compartir en...</span>
                                        <span class="modal-options">Copiar enlace</span>
                                        <span class="modal-options">Insertar</span>
                                        <span class="modal-options close" style="color: #2a2a2a; font-size: 13px; font-weight: 300;">Cancelar</span>
                                    </div>
                                </div>
                            </button>
                            @endif
                            </div>



                            @endauth

                        </header>

                        <!-- Image post  | 2 PART-->
                        <div class="w-full flex flex-col items-center" style="max-width: 714px">
                           <img class="w-full" style="max-height: 750px" src=" {{asset($image->image_path)}}" alt="">
                        </div>

                        <!--  Adittional post | 3 PART -->
                        <div class="border" style="max-width:714px;" >

                            <!-- like, comment, shared, save -->
                            <section class="flex mt-2 ml-2.5">

                                <span class="mr-3.5">

                                    <button>

                                        @php
                                         $hasLike = false;
                                         @endphp
                                        @foreach ($image->likes as $like)
                                            @if (auth()->user())
                                                @if ($like->user_id == auth()->user()->id)
                                                    @php
                                                    $hasLike = true;
                                                    @endphp
                                                @endif
                                            @endif
                                        @endforeach

                                       @if ($hasLike)
                                            <svg class="dislike-svg svg" data-id="{{$image->id}}" fill="#ed4956" color="#ed4956" height="30" role="img" viewBox="0 0 48 48" width="30"><path class="pointer-events-none" d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>

                                        @elseif($hasLike == false)
                                            <svg class="like-svg svg" data-id="{{$image->id}}" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path class="pointer-events-none" d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>
                                        @endif

                                        </button>
                                </span>


                                <span class="mr-3.5">
                                    <button>
                                       <svg aria-label="Comentar" class="_8-yf5 " fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z" fill-rule="evenodd"></path></svg>
                                    </button>
                                </span>

                                <span>
                                    <button>
                                        <svg aria-label="Compartir publicación" class="_8-yf5 " fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path></svg>
                                    </button>
                                </span>



                                <span class="ml-auto mr-2">
                                    @auth


                                    @php
                                     $saved = ifSaved($image->id);
                                    @endphp

                                    @endauth

                                    @guest
                                    @php
                                     $saved = 0
                                    @endphp
                                    @endguest

                                    @if ($saved == 0)
                                    <button data-id="{{$image->id}}" id="saved">
                                        <svg aria-label="Save"  class="pointer-events-none" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z"></path></svg>
                                    </button>
                                    @else
                                    <button data-id="{{$image->id}}" id="unsaved"><svg aria-label="Eliminar" class="pointer-events-none" color="#262626" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 28.9 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1z"></path></svg></button>
                                    @endif
                                </span>

                            </section>



                            <!-- how many "Likes" does this image have-->
                            <section class="mt-0.5 pl-2.5">
                                <a href="" class="font-semibold">
                                    <span>{{count($image->likes)}} Likes</span>
                                </a>
                            </section>



                                <!-- Comment of user post -->
                            <section class="mt-.05 mb-1 pl-2">
                                <p class="text-base">

                                    <span class="font-extrabold" >
                                        {{$image->user->nick}}
                                    </span>
                                    <i>
                                        {{$image->description}}
                                    </i>
                                </p>
                            </section>



                            <!-- How many people like this image--->
                            @if (count($image->comments) > 0)
                            <section class=" pl-2">


                                <span class="font-light text-base" style="color: #888888;"">
                                 {{count($image->comments) > 1 ? 'Show ' . count($image->comments) . ' comments' : '' }}
                                </span>
                            </section>
                            @endif


                                  <!-- Comments -->
                            <section class="mt-.05 mb-1 pl-2">
                                @foreach ($image->comments as $comment)

                                <div class="ml-1.5 flex items-center">
                                    <a href="http://instagram.open/nick/{{$comment->user->nick}}"  >
                                    <span class="font-bold text-base" >
                                    {{$comment->user->nick}}

                                    </span>
                                     {{$comment->content}}
                                     </a>

                                     @auth
                                     @php
                                         $response = deleteComment($comment->user->id, $image->user_id);

                                     @endphp


                                     @if ($response)
                                     <article  class="ml-auto mr-2">
                                         <form  action="{{route('comment.eliminate')}}" method="POST" class="flex items-center w-full">
                                        @csrf

                                        <input type="hidden" name="id_image" value="{{$image->id}}">
                                         <input type="hidden" name="id_comment" value="{{$comment->id}}">
                                        <input type="submit" class="p-0  text-red-500 cursor-pointer" value="Eliminate">
                                        </form>
                                    </article>
                                     @endif
                                    @endauth

                                </div>
                                @endforeach

                            </section>


                                <!-- Date--->

                            <section class=" pl-2">


                                <span class="font-light text-base" style="color: #888888;"">
                                    @php
                                        $time = timeFormat($image->created_at, date_default_timezone_get())
                                    @endphp

                                    {{$time . ' ago'}}
                                </span>
                            </section>

                            <!--if you want comment-->

                            <section class="w-full">
                            <div class="flex items-center mt-4 border-t px-4 h-14 w-full">
                                <form  action="{{route('comment.store')}}" method="POST" class="flex items-center w-full">
                                    @csrf
                                    <button>
                                        <svg aria-label="Emoji" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24"><path d="M24 48C10.8 48 0 37.2 0 24S10.8 0 24 0s24 10.8 24 24-10.8 24-24 24zm0-45C12.4 3 3 12.4 3 24s9.4 21 21 21 21-9.4 21-21S35.6 3 24 3z"></path><path d="M34.9 24c0-1.4-1.1-2.5-2.5-2.5s-2.5 1.1-2.5 2.5 1.1 2.5 2.5 2.5 2.5-1.1 2.5-2.5zm-21.8 0c0-1.4 1.1-2.5 2.5-2.5s2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5-2.5-1.1-2.5-2.5zM24 37.3c-5.2 0-8-3.5-8.2-3.7-.5-.6-.4-1.6.2-2.1.6-.5 1.6-.4 2.1.2.1.1 2.1 2.5 5.8 2.5 3.7 0 5.8-2.5 5.8-2.5.5-.6 1.5-.7 2.1-.2.6.5.7 1.5.2 2.1 0 .2-2.8 3.7-8 3.7z"></path></svg>
                                    </button>
                                    <input type="hidden" name="id_image" value="{{$image->id}}">
                                    <textarea name="comment" placeholder="add comment" class="focus:ring-transparent flex-grow leading-5 resize-none h-10 border-0 " style="outline:0; outline-color:transparent; "></textarea>
                                    <input type="submit" class="p-0 leading-none cursor-pointer" value="Send">
                                </form>
                            </div>
                          </section>

                        </div>

                    </article>



                @endforeach



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
