<?php
global $chartData;

echo '<script>
    var ctx = document.getElementById("myGraph").getContext("2d");
    var chartData = ' . json_encode($chartData) . ';

    new Chart(ctx, {
        type: "line",
        data: {
            datasets: [{
                label: "Valeur",
                data: chartData,
                fill: false,
                borderColor: "rgb(75, 192, 192)",
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
                    title: {
                        display: true,
                        text: "Date de prélèvement"
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: "Valeur"
                    }
                }
            },
        }
    });
    </script>';


