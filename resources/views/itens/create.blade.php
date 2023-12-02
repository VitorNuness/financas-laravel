<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bank Statement\'s') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-bold">{{ __("Add your new item") }}</h2>
                    <form action="/itens" method="POST" class="w-full px-4 md:w-1/2 lg:w-1/3 mt-10">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block font-bold">Title:</label>
                            <input type="text" name="name" id="name" placeholder="What you named this?" class="w-full rounded">
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block font-bold">Description:</label>
                            <textarea name="description" id="description" cols="30" rows="2" placeholder="(Optional)" class="w-full rounded resize-none"></textarea>
                        </div>
                        <div class="mb-6">
                            <label for="due_date" class="block font-bold">Due date:</label>
                            <input type="date" name="due_date" id="due_date" class="w-full rounded">
                        </div>
                        <div class="mb-6">
                            <label for="type" class="block font-bold">Type:</label>
                            <input type="radio" name="type" id="type" @checked(true) 
                                   class="checked:bg-gray-900 checked:hover:bg-gray-900 checked:active:bg-gray-900 checked:focus:bg-gray-900 focus:ring-1 focus:ring-gray-900" 
                                   value="0">
                            <label for="type" class="mr-20" class="in-checked-gray-900">In (+)</label>
                            <input type="radio" name="type" id="type" 
                                   class="checked:bg-gray-900 checked:hover:bg-gray-900 checked:active:bg-gray-900 checked:focus:bg-gray-900 focus:ring-1 focus:ring-gray-900" 
                                   value="0">
                            <label for="type">Out (-)</label>
                        </div>
                        <div class="mb-6">
                            <label for="value" class="block font-bold">Value:</label>
                            <input type="number" name="value" placeholder="0,00" class="w-full rounded">
                        </div>
                        <div class="flex items-center justify-around">
                            <a href="/itens" class="hover:opacity-90">Cancel</a>
                            <button type="submit" class="bg-gray-900 text-white px-6 py-2 rounded hover:opacity-90">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
