<section class="space-y-6">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Folder Information
    </h2>
  </header>
  <div class="flex gap-x-12 gap-y-2 flex-col sm:flex-row sm:items-center overflow-x-scroll [&>*]:shrink-0">
    <p><span class="text-sm text-gray-600 dark:text-gray-400">Created: </span><span class="font-medium">{{ date_format($folder->created_at, 'm-d-y') }}</span></p>
    <p><span class="text-sm text-gray-600 dark:text-gray-400">Edited: </span><span class="font-medium">{{ date_format($folder->updated_at, 'm-d-y') }}</span></p>
    <p>
      <span class="font-medium">{{ count($folder->notes) }}</span>
      <span class="text-sm text-gray-600 dark:text-gray-400">Notes</span>
    </p>
  </div>
</section>