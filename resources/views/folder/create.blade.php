<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			Create a Folder
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
			<form action="{{ route('folder.store') }}" method="POST" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex flex-col gap-4">
				@csrf

				<div>
					<x-input-label for="name" :value="__('Name')" />
					<x-text-input id="name" name="name" placeholder="What do you want to call this folder?" class="w-full" />
					<x-input-error :messages="$errors->get('name')" class="mt-2" />
				</div>

				<div class="flex gap-4 justify-end">
					<a href="{{ route('folders') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
					<x-primary-button>Save</x-primary-button>
				</div>
			</form>
		</div>
	</div>
</x-app-layout>