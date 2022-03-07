<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages - index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-sm rounded p-6 mb-4">
                <div class="flex flex-col">
                    <h1 class="text-xl">{{ $message->title }}</h1>
                    <span class="text-xs text-gray-500 mb-4">Auteur: {{ $message->name }}</span>
                    <p class="text-sm">{{ $message->content }}</p>
                </div>
            </div>
            @if (Auth::id() == $message->user)
                <div class="flex justify-end">
                    <a href="{{ route('messages.edit', $message->id) }}" class="mr-2">
                        <x-button>
                            {{ __('Edit Message') }}
                        </x-button>
                    </a>
                    <form method="POST" action="{{ route('messages.destroy', $message->id) }}" class="mb-4" onsubmit="return confirm('Weet u het zeker?')">
                        @csrf
                        @method("DELETE")
                        <x-button>
                            {{ __('Delete Message') }}
                        </x-button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
