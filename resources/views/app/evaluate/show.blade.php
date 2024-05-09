<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1>Voir les avis du client</h1>
                    <x-tables.default :resources="$rates" :mattributes="$rates_attributes" :mactions="$my_actions" type="answer" />
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
