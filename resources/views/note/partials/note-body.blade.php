<section class="space-y-6">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Note Content
    </h2>
  </header>
  @if (empty($note->body))
  <p class="italic text-gray-600 dark:text-gray-400">This note is empty</p>
  @else
  <p class="whitespace-pre-wrap">{{ $note->body }}</p>
  @endif
</section>