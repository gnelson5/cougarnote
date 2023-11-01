<section class="space-y-6">
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      Delete Folder
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      Once this folder is deleted, it cannot be recovered. Notes in this folder will not be deleted. They will not be assigned to a folder.
    </p>
  </header>
  <form action="/folders/{{ $folder->id }}" method="POST">
    @csrf
    @method('DELETE')
    <x-danger-button type="submit">Delete Folder</x-danger-button>
  </form>
</section>