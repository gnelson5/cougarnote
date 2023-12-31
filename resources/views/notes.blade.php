<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Notes') }}
            </h2>
            <a href="{{ route('note.create') }}"
                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                + New Note
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($notes) > 0)
                <ul class="space-y-4">
                    @foreach ($notes as $note)
                        <li class="p-6 bg-white dark:bg-gray-800 sm:rounded-lg shadow space-y-3">
                            <div class="flex gap-4 justify-between items-start">
                                <a href="{{ route('note.show', ['note' => $note]) }}"
                                    class="text-lg font-medium hover:text-black dark:hover:text-white outline-none focus-visible:text-black dark:focus-visible:text-white underline-offset-2 hover:underline focus-visible:underline">
                                    <h3>{{ $note->title }}</h3>
                                </a>
                                <form class="contents" action="{{ route('note.destroy', ['note' => $note->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <x-danger-button type="submit" class="tracking-wider font-bold">
                                        Delete
                                    </x-danger-button>
                                </form>
                            </div>
                            @if (!empty($note->folder))
                                <p>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Folder:</span>
                                    <a href="{{ route('folder.show', ['folder' => $note->folder->id]) }}"
                                        class="font-medium hover:text-black dark:hover:text-white outline-none focus-visible:text-black dark:focus-visible:text-white underline-offset-2 hover:underline focus-visible:underline">{{ $note->folder->name }}</a>
                                </p>
                            @endif
                            @if (!empty($note->body))
                                <p class="text-gray-800 dark:text-gray-200 line-clamp-4 whitespace-pre-wrap">{{ $note->body }}</p>
                            @endif
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ date_format($note->updated_at, 'n-j-Y') }}</p>
                            
                            <a href="{{ route('note.edit', ['note' => $note]) }}"
                              class="inline-flex items-center tracking-widest px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                              Edit Note
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="opacity-75 italic">You don't have any notes saved!</p>
            @endif
        </div>
    </div>
</x-app-layout>