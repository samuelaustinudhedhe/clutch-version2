@props([
    'series' => [52.8, 26.8, 20.4],
    'colors' => ["#1C64F2", "#16BDCA", "#9061F9"],
    'labels' => ["Direct", "Organic search", "Referrals"],
    'height' => 420,
    'width' => '100%',
    'type' => 'pie',
    'legendPosition' => 'bottom',
    'chartId' => 'pie-chart-' . uniqid(), // Generate a unique ID
])

<div class="py-6" id="{{ $chartId }}"></div>

<script>
    const getChartOptions = () => {
        return {
            series: @json($series),
            colors: @json($colors),
            chart: {
                height: @json($height),
                width: @json($width),
                type: @json($type),
            },
            stroke: {
                colors: ["white"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    labels: {
                        show: true,
                    },
                    size: "100%",
                    dataLabels: {
                        offset: -25
                    }
                },
            },
            labels: @json($labels),
            dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            legend: {
                position: @json($legendPosition),
                fontFamily: "Inter, sans-serif",
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return value + "%"
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function (value) {
                        return value + "%"
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        }
    }

    if (document.getElementById("{{ $chartId }}") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("{{ $chartId }}"), getChartOptions());
        chart.render();
    }
</script>