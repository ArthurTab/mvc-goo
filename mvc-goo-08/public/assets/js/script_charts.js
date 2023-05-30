$(document).ready(function () {
    genererCaMois();
})

function genererCaMois() {
    $.ajax({
        url: 'index.php?gestion=accueil&action=generer_stats',
        type: 'GET',
        dataType: 'text',
        success: function (data) {
            data = JSON.parse(data);
            console.log(data);

            let mois = data.map(function (e) {
                return e['LaDate'];
            })


            let total_ht = data.map(function (e) {
                return e['total_ht'];
            })

            new Chart(
                document.getElementById('camois'),
                {
                    type: 'bar',
                    data: {
                        labels: mois,
                        datasets: [
                            {
                                label: 'Chiffre d\'affaire par mois',
                                data: total_ht
                            }
                        ]
                    }
                }
            )


        },
        error: function(request, error){
            alert("Erreur: "+ error);
        }
    })
}

function genererNombreClients(){

}