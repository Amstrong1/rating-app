<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end">
                        <button onclick="generatePDF()" id="btn"
                            class="bg-green-700 px-4 py-1 text-white rounded">Imprimer</button>
                    </div>
                    <h1>Voir les détails</h1>
                    <table class="w-full mt-8 border-collapse">
                        <tr>
                            <td class="border border-grey-100 rounded-tl-md p-2 font-semibold">Date</td>
                            <td class="border border-grey-100 rounded-tr-md p-2">{{ $complain->formatted_date }}</td>
                        </tr>
                        <tr>
                            <td class="border border-grey-100 p-2 font-semibold">Client</td>
                            <td class="border border-grey-100 p-2">{{ $complain->name }}</td>
                        </tr>
                        <tr>
                            <td class="border border-grey-100 p-2 font-semibold">Contact</td>
                            <td class="border border-grey-100 p-2">{{ $complain->contact }}</td>
                        </tr>
                        <tr>
                            <td class="border border-grey-100 rounded-bl-md p-2 font-semibold">Plainte</td>
                            <td class="border border-grey-100 rounded-br-md p-2">{{ $complain->complain }}</td>
                        </tr>
                    </table>
                </div>
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