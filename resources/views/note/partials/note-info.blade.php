<section class="space-y-6">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Note Information
    </h2>
  </header>
  <div class="flex gap-x-12 gap-y-2 flex-col sm:flex-row sm:items-center overflow-x-scroll [&>*]:shrink-0">
    <p>
      <span class="text-sm text-gray-600 dark:text-gray-400">Created:</span>
      <span class="font-medium">{{ date_format($note->created_at, 'm-d-y') }}</span>
    </p>
    <p>
      <span class="text-sm text-gray-600 dark:text-gray-400">Edited:</span>
      <span class="font-medium">{{ date_format($note->updated_at, 'm-d-y') }}</span>
    </p>
    @if (!empty($note->folder))
    <p>
      <span class="text-sm text-gray-600 dark:text-gray-400">Folder:</span>
      <a href="{{ route('folder.show', ['folder' => $note->folder->id]) }}" class="font-medium hover:text-black dark:hover:text-white outline-none focus-visible:text-black dark:focus-visible:text-white underline-offset-2 hover:underline focus-visible:underline">{{ $note->folder->name }}</a>
    </p>
    @endif
  </div>
</section>