<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Folders') }}
      </h2>
      <a href="{{ route('folder.create') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
        + New Folder
      </a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @if (count($folders) > 0)
      <ul class="space-y-4">
        @foreach ($folders as $folder)
        <li class="p-6 bg-white dark:bg-gray-800 sm:rounded-lg shadow space-y-2">
          <a href="{{ route('folder.show', ['folder' => $folder->id]) }}" class="text-xl font-semibold hover:text-black dark:hover:text-white outline-none focus-visible:text-black dark:focus-visible:text-white underline-offset-2 hover:underline focus-visible:underline">
            <h3 class="inline">{{ $folder->name }}</h3>
          </a>
          <div class="flex gap-10 items-end">
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ date_format($folder->updated_at, 'n-j-Y') }}</p>
            <p>
              <span class="font-medium">{{ count($folder->notes) }}</span>
              <span class="text-sm text-gray-600 dark:text-gray-400">Notes</span>
            </p>
          </div>
        </li>
        @endforeach
      </ul>
      @else
      <p class="opacity-75 italic">You don't have any folders!</p>
      @endif
    </div>
  </div>
</x-app-layout>