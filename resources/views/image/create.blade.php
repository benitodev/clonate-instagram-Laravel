<x-app-layout>



    <x-slot name="header">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <form action="{{route('image.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-label>Image</x-label>
                        <x-input class="block mt-1 w-74" type="file" placeholder="Upload your favourite image" name="image"></x-input>

                        <x-label class="mt-2">Decription</x-label>
                        <textarea name="description" id="" cols="30" rows="10"></textarea>
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
