<section class="space-y-6">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Note Information
    </h2>
  </header>
  <div class="flex gap-x-12 gap-y-2 flex-col sm:flex-row sm:items-center overflow-x-scroll [&>*]:shrink-0">
    <p><span class="font-light">Created: </span><span class="font-medium">{{ date_format($note->created_at, 'm-d-y') }}</span></p>
    <p><span class="font-light">Edited: </span><span class="font-medium">{{ date_format($note->updated_at, 'm-d-y') }}</span></p>
    @if (!empty($note->folder))
    <p><span class="font-light">Folder: </span><span class="font-medium">{{ $note->folder->name }}</span></p>
    @endif
  </div>
</section>