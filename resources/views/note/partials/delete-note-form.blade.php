<section class="space-y-6">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Delete Note
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      Once this note is deleted, it cannot be recovered.
    </p>
  </header>
  <form action="{{ route('note.destroy', ['note' => $note->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <x-danger-button type="submit">Delete Note</x-danger-button>
  </form>
</section>