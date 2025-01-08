<x-app-layout>
    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto my-4 p-6 rounded-lg shadow-md">
        <h1 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 mb-8">Add Ticket</h1>
        @csrf

        <!-- Field Image -->
        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-white">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-white" required>
        </div>

        <!-- Field Title -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-white">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-white" required>
        </div>

        <!-- Field Message -->
        <div class="mb-6">
            <label for="message" class="block text-sm font-medium text-white">Message</label>
            <textarea name="message" id="message" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-white" required></textarea>
        </div>

        <!-- Field Category -->
        <div class="mb-6">
            <label for="category" class="block text-sm font-medium text-white">Category</label>
            <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-white" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Field Priority -->
        <div class="mb-6">
            <label for="priority" class="block text-sm font-medium text-white">Priority</label>
            <select name="priority_id" id="priority_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-white" required>
                <option value="">Select Priority</option>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Field Label -->
        <div class="mb-6">
            <label for="label" class="block text-sm font-medium text-white">Label</label>
            <select name="labels_id" id="labels_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-gray-800 text-white" required>
                <option value="">Select Label</option>
                @foreach ($labels as $labels)
                    <option value="{{ $labels->id }}">{{ $labels->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-between items-center">
            <!-- Cancel Button -->
            <a href="{{ route('admin.dashboard') }}" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                Cancel
            </a>
            <!-- Submit Button -->
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Save
            </button>
        </div>
    </form>
</x-app-layout>
