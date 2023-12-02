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
                    <div class="mb-10">

                        @if ($errors->any())
                            <div class="bf-red-100 border border-red-400 text-red-700 px-4 rounded relative">
                                <strong class="font-bold">Sorry!</strong>
                                <span class="block sm:inline">{{ $errors->first() }}</span>
                            </div>
                        @endif

                        <a class="bg-gray-900 text-white px-6 py-2 rounded hover:opacity-90" href="/itens/create">Add Item</a>
                    </div>

                    @forelse ($itens as $item)
                        <table>
                            <thead>
                                <tr>
                                    <td class="font-bold"{{ _("Item Name") }}</td>
                                    <td class="font-bold">{{ _("Actions") }}</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>{{ $item->name }}</tr>
                                <tr class="flex">
                                    <a href="/itens/{{ $item->id }}">View</a>
                                    <a href="/itens/{{ $item->id}}/edit">Edit</a>
                                    <form action="/itens/{{ $item->id }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    @empty
                        {{ _("You don't have itens. Click on the button to try add one.") }}
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
