<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages - index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto px-6">
            @if (Auth::check())
                <div class="flex justify-end">
                    <a class="flex justify-end mb-4" href="{{ route('messages.create') }}">
                        <x-button>
                            {{ __('Create Message') }}
                        </x-button>
                    </a>
                </div>
            @endif
            @foreach($messages as $message)
                <a href="{{ route("messages.show", $message->id) }}">
                    <div class="bg-white overflow-hidden shadow-sm rounded p-6 mb-4 hover:bg-gray-100 border">
                        <div class="flex flex-col">
                            <h1 class="text-xl">{{ $message->title }}</h1>
                            <span class="text-gray-500">Auteur: {{ $message->name }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
            @if(sizeof($messages) == 0)
                <h1 class="text-center">Er zijn nog geen berichten toegevoegd.</h1>
            @endif
        </div>
    </div>
</x-app-layout>
