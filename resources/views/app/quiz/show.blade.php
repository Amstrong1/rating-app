<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Voir les détails</h1>
                    <x-forms.show :item="$quiz" :fields="$my_fields" type="quiz" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
