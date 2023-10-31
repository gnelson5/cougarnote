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
          <h3 class="text-xl font-semibold">{{ $folder->name }}</h3>
          <div class="flex gap-10">
            <p class="font-light text-gray-700 dark:text-gray-300">{{ date_format($folder->updated_at, 'n-j-Y') }}</p>
            <p>
              <span class="font-medium">{{ count($folder->notes) }}</span>
              <span class="font-light text-gray-700 dark:text-gray-300">Notes</span>
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