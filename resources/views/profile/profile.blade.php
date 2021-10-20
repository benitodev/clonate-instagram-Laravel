<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

  <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <x-success-message/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>

                                    <x-label for="name" :value="__('Name')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="name" value="{{ auth()->user()->name }}" autofocus></x-input>
                                </div>

                                 <div>
                                    <x-label for="surname" :value="__('Surname')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="surname" value="{{ auth()->user()->surname }}"></x-input>
                                </div>



                                <div>
                                    <x-label for="name" :value="__('Nick')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="nick" value="{{ auth()->user()->nick }}"></x-input>
                                </div>



                                <div>
                                    <x-label for="email" :value="__('Email')"></x-label>
                                    <x-input class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" ></x-input>
                                </div>

                            </div>

                            <div class="grid grid-rows-2 gap-6">

                                <div>
                                    <x-label for="password" :value="__('New password')"></x-label>
                                    <x-input class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" ></x-input>
                                </div>

                                 <div>
                                    <x-label for="password_confirmation" :value="__('Confirm password')"></x-label>
                                    <x-input class="block mt-1 w-full" type="password" name="password_confirmation" ></x-input>
                                </div>


                                <div style="display:flex; flex-direction:column-reverse;">
                                    <x-label for="image" :value="__('Avatar')" class="order-last"></x-label>
                                    <x-input class="block mt-1 w-full self-center" type="file" name="image" value="" autofocus></x-input>


                                    <img src="{{asset($image)}}" class="sm:w-10  md:w-32 md:h-auto mr-2  lg:w-45" alt="Nisman">

                                </div>

                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                Update
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
