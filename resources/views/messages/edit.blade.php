<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages - Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('messages.update', $message->id) }}">
                        @csrf
                        @method("PATCH")
                        <div>
                            <x-label for="title" :value="__('Title')"/>
                            <x-input id="title" class="block mt-1 w-full mb-5" type="text" name="title"
                                     value="{{$message->title}}"/>
                        </div>
                        <div>
                            <x-label for="content" :value="__('Content')"/>
                            <textarea id="content" name="content"
                                      class=" mb-5 block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                      name="content" required rows="5">{{$message->content}}</textarea>
                        </div>
                        <div class="flex justify-end">
                            <x-button>
                                {{ __('Update Message') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
