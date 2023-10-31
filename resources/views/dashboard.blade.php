<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Notes') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <ul class="space-y-4">
        @foreach ($notes as $note)
        <li class="p-6 bg-white dark:bg-gray-800 sm:rounded-lg shadow space-y-1">
          <p class="text-lg font-medium">{{ $note->title }}</p>
          <p class="text-gray-800 dark:text-gray-200 line-clamp-4">{{ $note->body }}</p>
          <p class="font-light text-gray-700 dark:text-gray-300">{{ date_format($note->updated_at, 'n-j-Y') }}</p>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</x-app-layout>