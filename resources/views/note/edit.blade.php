<x-app-layout>
    <x-slot name="header">
        <p class="text-sm text-gray-600 dark:text-gray-400">Note</p>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $note->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('note.update', $note->id) }}" method="POST"
                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex flex-col gap-4">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" value="{{ $note->title }}" class="w-full" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="grow">
                    <x-input-label for="body" :value="__('Content')" />
                    <x-text-area id="body" name="body" class="w-full">{{ $note->body }}</x-text-area>
                </div>

                <div>
                    <x-input-label for="folder" :value="__('Folder')" />
                    <x-select id="folder" name="folder_id" class="max-w-sm w-full">
                        <option value="{{ null }}">None</option>
                        @foreach ($folders as $folder)
                            <option value="{{ $folder->id }}" {{ $selected_folder == $folder->id ? 'selected' : '' }}>
                                {{ $folder->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('folder_id')" class="mt-2" />
                </div>

                <div class="flex gap-4 justify-end">
                    <a href={{ $redirect_to }}
                        class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                    <x-primary-button>Save</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
