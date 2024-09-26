<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
  $usluge = selectQuery('usluge');
  $statistika = dohvatiPodatkeZaStatistiku();
?>

<div class="container-fluid">
    <a name="utisci"></a>
    <h3 class="text-center my-2 display-3" data-aos="fade-up" data-aos-duration="1000" id="impressions">Statistika</h3>
    <h5 class="text-center my-2" data-aos="fade-up" data-aos-duration="1000">Najkorisnije usluge</h5>
    <div class="container-xl">
        <div class="card-deck my-5">
            <canvas id="myChart" data-aos="flip-up" data-aos-duration="1500"></canvas>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var labels = [];
        var brojGlasova = [];

        <?php foreach ($statistika as $podatak) : ?>
            labels.push("<?= $podatak->odgovor ?>");
            brojGlasova.push(<?= $podatak->broj_glasova ?>);
        <?php endforeach; ?>

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Broj glasova',
                    data: brojGlasova,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutQuart'
                }
            }
        });
    });
</script>
