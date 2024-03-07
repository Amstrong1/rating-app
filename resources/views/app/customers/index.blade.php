<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">Mes clients</h1>
                        <a href="{{ route('customer.create') }}">
                            <x-primary-button>
                                Envoyer un message
                            </x-primary-button>
                        </a>
                    </div>
                    <div class="mt-4">
                        <x-tables.default :resources="$customers" :mattributes="$my_attributes" type="customer" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
