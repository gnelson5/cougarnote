<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      Create a Note
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <form action="/notes" method="POST" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex flex-col gap-4">
        @csrf

        <div>
          <x-input-label for="title" :value="__('Title')" />
          <x-text-input id="title" name="title" placeholder="What do you want to call this note?" class="w-full" />
        </div>

        <div class="grow">
          <x-input-label for="body" :value="__('Content')" />
          <x-text-area id="body" name="body" placeholder="What's in this note?" class="w-full" />
        </div>

        <div>
          <x-input-label for="folder" :value="__('Folder')" />
          <x-select id="folder" name="folder_id" class="max-w-sm w-full">
            <option>None</option>
            @foreach ($folders as $folder)
            <option value="{{ $folder->id }}">{{ $folder->name }}</option>
            @endforeach
          </x-select>
        </div>

        <div class="flex gap-4 justify-end">
          <x-secondary-button>Cancel</x-secondary-button>
          <x-primary-button>Save</x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>