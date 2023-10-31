<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Notes') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @if (count($notes) > 0)
      <ul class="space-y-4">
        @foreach ($notes as $note)
        <li class="p-6 bg-white dark:bg-gray-800 sm:rounded-lg shadow space-y-2">
          <div class="flex gap-4 justify-between items-center">
            <a href="/notes/{{ $note->id }}" class="text-lg font-medium hover:text-black dark:hover:text-white outline-none focus-visible:text-black dark:focus-visible:text-white underline-offset-2 hover:underline focus-visible:underline">
              <h3>{{ $note->title }}</h3>
            </a>
            <form class="contents" action="/notes/{{ $note->id }}" method="POST">
              @csrf
              @method('DELETE')

              <x-danger-button type="submit" class="tracking-wider font-bold">
                Delete
              </x-danger-button>
            </form>
          </div>
          @if (!empty($note->folder))
          <p>Folder: <span class="font-semibold">{{ $note->folder->name }}</span></p>
          @endif
          <p class="text-gray-800 dark:text-gray-200 line-clamp-4">{{ $note->body }}</p>
          <p class="font-light text-gray-700 dark:text-gray-300">{{ date_format($note->updated_at, 'n-j-Y') }}</p>
        </li>
        @endforeach
      </ul>
      @else
      <p class="opacity-75 italic">You don't have any notes saved!</p>
      @endif
    </div>
  </div>
</x-app-layout>