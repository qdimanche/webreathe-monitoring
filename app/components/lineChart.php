<?php
global $chartData;
global $type;

if ($type == "temperature") {
    $value = "Degrés Celsius";
} else if ($type == "vibration") {
    $value = "m/s²";
} else {
    $value = "Lux";
}

echo '
<script>
    var ctx = document.getElementById("myGraph").getContext("2d");
    var chartData = ' . json_encode($chartData) . ';

    new Chart(ctx, {
        type: "line",
        data: {
            datasets: [{
                label: "'.$value.'",
                data: chartData,
                fill: false,
                borderColor: "#256AF6",
                tension: 0.1
            }]
        },
        options: {
            scales: {
                x: {
                    type: "time",
                    time: {
                        unit: "hour",
                        displayFormats: {
                            hour: "HH:mm"
                        }
                    },
                    ticks: {
                        autoSkip: true,
                        maxTicksLimit: 10
                    },
                    title: {
                        display: true,
                        text: "Date de prélèvement"
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: "'.$value.'"
                    }
                }
            }
        }
    });
</script>
';
