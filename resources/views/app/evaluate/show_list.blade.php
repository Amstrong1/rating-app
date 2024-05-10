<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="print" class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-end">
                        <button onclick="generatePDF()" id="btn"
                            class="bg-green-700 px-4 py-1 text-white rounded">Imprimer</button>
                    </div>
                    <h1 class="my-4 text-center font-semibold text-lg">Récapitulatif de l'avis du client</h1>

                    <ul>
                        @if ($rate->rater_name != null)
                            <li class="font-semibold my-2">Nom : {{ $rate->rater_name }}</li>
                        @endif
                        @if ($rate->rater_contact != null)
                            <li class="font-semibold my-2">Contact : {{ $rate->rater_contact }}</li>
                        @endif
                        @if ($rate->rater_email != null)
                            <li class="font-semibold my-2">Email : {{ $rate->rater_email }}</li>
                        @endif
                        <li class="font-semibold my-2">Unité : {{ $rate->user->name }}</li>
                    </ul>
                    <table class="w-full mt-8">
                        <thead
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:text-gray-400">
                            <tr>
                                <th class="px-2 py-3">Question</th>
                                <th class="px-2 py-3">Reponse</th>
                                <th class="px-2 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:bg-gray-800">
                            @foreach ($answers as $answer)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-2 py-3">{{ $answer->question }}</td>
                                    <td class="px-2 py-3">{{ $answer->formatted_answer }}</td>
                                    <td class="px-2 py-3">{{ $answer->formatted_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="my-4 border px-2 py-3 rounded">
                        <p class="font-semibold my-4">Avis du client</p>
                        {{ $appreciation->appreciation ?? 'Pas d\'avis' }}
                    </div>
                    <div class="my-4 border px-2 py-3 rounded">
                        <p class="font-semibold my-4">Taux de satisfaction du client</p>
                        {{ $rate->satisfaction }}
                    </div>
                </div>
                <p class="m-4">
                    Cordialement, l'équipe Vibecro.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function generatePDF() {
        var element = document.getElementById("print");
        document.getElementById('btn').style.display = "none";
        var opt = {
            margin: 0.3,
            filename: 'document.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };
        html2pdf().from(element).set(opt).save();
        
        setTimeout(function() {
            document.getElementById('btn').style.display = 'block';
        }, 10000);
    }
</script>
