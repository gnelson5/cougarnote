<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Folders') }}
    </h2>
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