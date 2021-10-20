

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <section class="flex flex-col">

                <!-- USER IDENTIFIED -->
              @if ($user == auth()->user()->nick)
                @foreach ($user_table as $user)
                    <!-- Header-->
                <header class="flex mb-20" >

                    <article class=" h-full ml-28 mr-32"   >
                        <div class="w-48 h-48 rounded-full overflow-hidden mr-auto ml-auto">
                            <img src="{{asset(auth()->user()->image)}}" alt="Imange miaa" class="w-full h-full">
                        </div>
                    </article>
                    <section class="flex flex-col flex-grow">
                        <div class="flex items-center mb-6">
                            <h1 class="" style="font-weight:200; font-size:28px; line-height:32px;">{{auth()->user()->nick}}
                            </h1>

                            <div class="ml-7"><a href="profile" style="border-radius: 4px; border:1px solid #dbdbdb;  background-color: transparent; padding: 5px 9px;">Edit profile</a></div>

                            <div class="ml-5"><button><svg aria-label="Opciones" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M46.7 20.6l-2.1-1.1c-.4-.2-.7-.5-.8-1-.5-1.6-1.1-3.2-1.9-4.7-.2-.4-.3-.8-.1-1.2l.8-2.3c.2-.5 0-1.1-.4-1.5l-2.9-2.9c-.4-.4-1-.5-1.5-.4l-2.3.8c-.4.1-.8.1-1.2-.1-1.4-.8-3-1.5-4.6-1.9-.4-.1-.8-.4-1-.8l-1.1-2.2c-.3-.5-.8-.8-1.3-.8h-4.1c-.6 0-1.1.3-1.3.8l-1.1 2.2c-.2.4-.5.7-1 .8-1.6.5-3.2 1.1-4.6 1.9-.4.2-.8.3-1.2.1l-2.3-.8c-.5-.2-1.1 0-1.5.4L5.9 8.8c-.4.4-.5 1-.4 1.5l.8 2.3c.1.4.1.8-.1 1.2-.8 1.5-1.5 3-1.9 4.7-.1.4-.4.8-.8 1l-2.1 1.1c-.5.3-.8.8-.8 1.3V26c0 .6.3 1.1.8 1.3l2.1 1.1c.4.2.7.5.8 1 .5 1.6 1.1 3.2 1.9 4.7.2.4.3.8.1 1.2l-.8 2.3c-.2.5 0 1.1.4 1.5L8.8 42c.4.4 1 .5 1.5.4l2.3-.8c.4-.1.8-.1 1.2.1 1.4.8 3 1.5 4.6 1.9.4.1.8.4 1 .8l1.1 2.2c.3.5.8.8 1.3.8h4.1c.6 0 1.1-.3 1.3-.8l1.1-2.2c.2-.4.5-.7 1-.8 1.6-.5 3.2-1.1 4.6-1.9.4-.2.8-.3 1.2-.1l2.3.8c.5.2 1.1 0 1.5-.4l2.9-2.9c.4-.4.5-1 .4-1.5l-.8-2.3c-.1-.4-.1-.8.1-1.2.8-1.5 1.5-3 1.9-4.7.1-.4.4-.8.8-1l2.1-1.1c.5-.3.8-.8.8-1.3v-4.1c.4-.5.1-1.1-.4-1.3zM24 41.5c-9.7 0-17.5-7.8-17.5-17.5S14.3 6.5 24 6.5 41.5 14.3 41.5 24 33.7 41.5 24 41.5z" fill-rule="evenodd"></path></svg></button></div>
                        </div>
                        <ul class="flex mb-2">

                            <li class="mr-8"><span><strong style="color: #262626;">{{count($user->images)}}</strong>  published </span></li>
                            <li class="mr-8"><span><strong style="color: #262626;">{{count($user->follows)}} </strong> followers</span></li>
                            @if ($followed->isEmpty())
                            <li class="mr-8"><span><strong style="color: #262626;">0</strong>followed</span></li>
                            @else
                            <li class="mr-8"><span><strong style="color: #262626;">{{count($followed)}} </strong> followed</span></li>
                            @endif
                        </ul>
                        <div>
                            <span>Músico</span>
                            <p>Test Comment</p>
                        </div>
                    </section>


                </header>

                    <!-- Options content's user-->
                <section class="h-20 ">
                    <div class="flex items-center justify-center" style="border-top: 1px solid #dbdbdb;">
                        <a href="" style="margin-right:60px; letter-spacing:1.3px; font-size:13px;">
                            <span class="flex items-center">
                                <svg aria-label="" class="_8-yf5 " color="#8e8e8e" fill="#8e8e8e" height="14" role="img" viewBox="0 0 48 48" width="14"><path clip-rule="evenodd" d="M45 1.5H3c-.8 0-1.5.7-1.5 1.5v42c0 .8.7 1.5 1.5 1.5h42c.8 0 1.5-.7 1.5-1.5V3c0-.8-.7-1.5-1.5-1.5zm-40.5 3h11v11h-11v-11zm0 14h11v11h-11v-11zm11 25h-11v-11h11v11zm14 0h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11zm14 28h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11z" fill-rule="evenodd"></path></svg>
                                <span class="ml-2 mt-1">PUBLISHED</span>
                            </span>

                        </a>
                        <a href="" style="margin-right:60px; letter-spacing:1.3px; font-size:13px;">
                            <span class="flex items-center">
                                <svg aria-label="" class="_8-yf5 " color="#8e8e8e" fill="#8e8e8e" height="14" role="img" viewBox="0 0 48 48" width="14"><path d="M41.5 5.5H30.4c-.5 0-1-.2-1.4-.6l-4-4c-.6-.6-1.5-.6-2.1 0l-4 4c-.4.4-.9.6-1.4.6h-11c-3.3 0-6 2.7-6 6v30c0 3.3 2.7 6 6 6h35c3.3 0 6-2.7 6-6v-30c0-3.3-2.7-6-6-6zm-29.4 39c-.6 0-1.1-.6-1-1.2.7-3.2 3.5-5.6 6.8-5.6h12c3.4 0 6.2 2.4 6.8 5.6.1.6-.4 1.2-1 1.2H12.1zm32.4-3c0 1.7-1.3 3-3 3h-.6c-.5 0-.9-.4-1-.9-.6-5-4.8-8.9-9.9-8.9H18c-5.1 0-9.4 3.9-9.9 8.9-.1.5-.5.9-1 .9h-.6c-1.7 0-3-1.3-3-3v-30c0-1.7 1.3-3 3-3h11.1c1.3 0 2.6-.5 3.5-1.5L24 4.1 26.9 7c.9.9 2.2 1.5 3.5 1.5h11.1c1.7 0 3 1.3 3 3v30zM24 12.5c-5.3 0-9.6 4.3-9.6 9.6s4.3 9.6 9.6 9.6 9.6-4.3 9.6-9.6-4.3-9.6-9.6-9.6zm0 16.1c-3.6 0-6.6-2.9-6.6-6.6 0-3.6 2.9-6.6 6.6-6.6s6.6 2.9 6.6 6.6c0 3.6-3 6.6-6.6 6.6z"></path></svg>
                                <span  class="ml-2  mt-1">TAGGED</span>
                            </span>
                        </a>
                    </div>
                </section >
                     <!-- Images-->
                <main class="grid grid-cols-3 gap-4 ">


                    @foreach ($user->images as $image)

                    <img src="{{asset($image->image_path)}}" alt="">
                    @endforeach
                </main>

                @endforeach

                <!-- USER NO-IDENTIFIED -->

              @elseif($user != auth()->user()->nick)
               @foreach ($user_table as $user)
                <header class="flex mb-14" >
                    <article class=" h-full ml-28 mr-32"   >
                        <div class="w-48 h-48 rounded-full overflow-hidden mr-auto ml-auto">
                            <img src="{{asset($user->image)}}" alt="Imagen de otro" class="w-full h-full">
                        </div>
                    </article>
                    <section class="flex flex-col flex-grow">
                        <div class="flex items-center mb-6">
                            <h1 class="" style="font-weight:200; font-size:28px; line-height:32px;">{{$user->nick}}
                            </h1>

                            <div class="ml-5"><a href="profile" style="border-radius: 4px; border:1px solid #dbdbdb;  background-color: transparent; padding: 5px 9px;">Send Message</a></div>

                            <!-- crompobate if auth->user follow user-profile -->
                            @if (count($ifFollow) == 0)
                            <div class="ml-5"><a href="" id="follow" data-id="{{$user->id}}" style="border-radius: 4px; background-color: #0095f6; border:1px solid #dbdbdb; color: #fff;  padding: 5px 9px;">Follow</a></div>
                            @else
                            <div class="ml-5"><a href="" id="unfollow" data-id="{{$user->id}}" style="border-radius: 4px; background-color: #0095f6; border:1px solid #dbdbdb; color: #fff;  padding: 5px 9px;">Unfollow</a></div>
                            @endif


                            <div class="ml-5"><button><svg aria-label="Opciones" class="_8-yf5 " color="#262626" fill="#262626" height="32" role="img" viewBox="0 0 24 24" width="32"><circle cx="12" cy="12" r="1.5"></circle><circle cx="6.5" cy="12" r="1.5"></circle><circle cx="17.5" cy="12" r="1.5"></circle></svg></button></div>
                        </div>
                        <ul class="flex mb-2">

                            <li class="mr-8"><span><strong style="color: #262626;">{{count($user->images)}}</strong>  published </span></li>
                            <li class="mr-8"><span><strong style="color: #262626;">{{count($user->follows)}}</strong> followers</span></li>
                            @if ($followed->isEmpty())
                            <li class="mr-8"><span><strong style="color: #262626;">0 </strong>followed</span></li>
                            @else
                            <li class="mr-8"><span><strong style="color: #262626;">{{count($followed)}} </strong>followed</span></li>
                            @endif
                        </ul>
                        <div>
                            <span>Músico</span>
                            <p>Test Comment</p>
                        </div>
                    </section>


                </header>
                    <!-- Options content's user-->
                <section class="h-20 ">
                    <div class="flex items-center justify-center" style="border-top: 1px solid #dbdbdb;">
                        <a href="" style="margin-right:60px; letter-spacing:1.3px; font-size:13px;">
                            <span class="flex items-center">
                                <svg aria-label="" class="_8-yf5 " color="#8e8e8e" fill="#8e8e8e" height="14" role="img" viewBox="0 0 48 48" width="14"><path clip-rule="evenodd" d="M45 1.5H3c-.8 0-1.5.7-1.5 1.5v42c0 .8.7 1.5 1.5 1.5h42c.8 0 1.5-.7 1.5-1.5V3c0-.8-.7-1.5-1.5-1.5zm-40.5 3h11v11h-11v-11zm0 14h11v11h-11v-11zm11 25h-11v-11h11v11zm14 0h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11zm14 28h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11z" fill-rule="evenodd"></path></svg>
                                <span class="ml-2 mt-1">PUBLISHED</span>
                            </span>

                        </a>
                        <a href="" style="margin-right:60px; letter-spacing:1.3px; font-size:13px;">
                            <span class="flex items-center">
                                <svg aria-label="" class="_8-yf5 " color="#8e8e8e" fill="#8e8e8e" height="14" role="img" viewBox="0 0 48 48" width="14"><path d="M41.5 5.5H30.4c-.5 0-1-.2-1.4-.6l-4-4c-.6-.6-1.5-.6-2.1 0l-4 4c-.4.4-.9.6-1.4.6h-11c-3.3 0-6 2.7-6 6v30c0 3.3 2.7 6 6 6h35c3.3 0 6-2.7 6-6v-30c0-3.3-2.7-6-6-6zm-29.4 39c-.6 0-1.1-.6-1-1.2.7-3.2 3.5-5.6 6.8-5.6h12c3.4 0 6.2 2.4 6.8 5.6.1.6-.4 1.2-1 1.2H12.1zm32.4-3c0 1.7-1.3 3-3 3h-.6c-.5 0-.9-.4-1-.9-.6-5-4.8-8.9-9.9-8.9H18c-5.1 0-9.4 3.9-9.9 8.9-.1.5-.5.9-1 .9h-.6c-1.7 0-3-1.3-3-3v-30c0-1.7 1.3-3 3-3h11.1c1.3 0 2.6-.5 3.5-1.5L24 4.1 26.9 7c.9.9 2.2 1.5 3.5 1.5h11.1c1.7 0 3 1.3 3 3v30zM24 12.5c-5.3 0-9.6 4.3-9.6 9.6s4.3 9.6 9.6 9.6 9.6-4.3 9.6-9.6-4.3-9.6-9.6-9.6zm0 16.1c-3.6 0-6.6-2.9-6.6-6.6 0-3.6 2.9-6.6 6.6-6.6s6.6 2.9 6.6 6.6c0 3.6-3 6.6-6.6 6.6z"></path></svg>
                                <span  class="ml-2  mt-1">TAGGED</span>
                            </span>
                        </a>
                    </div>
                </section >

                     <!-- Images-->
                <main class="grid grid-cols-3 gap-4 ">


                    @foreach ($user->images as $image)

                    <img src="{{asset($image->image_path)}}" alt="">
                    @endforeach


                </main>
               @endforeach

            @endif


            </section>


        </div>
    </div>
</x-app-layout>
