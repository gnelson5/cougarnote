<section class="space-y-6">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Notes
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      The following notes are assigned to this folder.
    </p>
  </header>
  <ul>
    @foreach ($folder->notes->sortByDesc('updated_at') as $note)
    <li class="space-y-3 border-b last:border-none border-gray-300 dark:border-gray-600 py-6 first:pt-0 last:pb-0">
      <div class="flex gap-4 justify-between items-start">
        <a href="/notes/{{ $note->id }}" class="text-lg font-medium hover:text-black dark:hover:text-white outline-none focus-visible:text-black dark:focus-visible:text-white underline-offset-2 hover:underline focus-visible:underline">
          <h3>{{ $note->title }}</h3>
        </a>
        <form class="contents" action="/notes/{{ $note->id }}?redirectTo=/folders/{{ $folder->id }}" method="POST">
          @csrf
          @method('DELETE')

          <x-danger-button type="submit" class="tracking-wider font-bold">
            Delete
          </x-danger-button>
        </form>
      </div>
      @if (!empty($note->body))
      <p class="text-gray-800 dark:text-gray-200 line-clamp-4">{{ $note->body }}</p>
      @endif
      <p class="text-sm text-gray-600 dark:text-gray-400">{{ date_format($note->updated_at, 'n-j-Y') }}</p>
    </li>
    @endforeach
  </ul>
</section>