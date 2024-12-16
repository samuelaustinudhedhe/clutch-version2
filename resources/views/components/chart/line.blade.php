@props([
    'chartId' => 'line-chart-' . uniqid(), // Generate a unique ID
    'series' => [],
    'xaxis' => [],
    'yaxis' => ['show' => false],
    'colors' => ['#1C64F2'],
    'height' => 350,
    'width' => '100%',
])

<div class=" bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
    <!-- ... existing HTML code ... -->
    <div id="{{ $chartId }}"></div>
    <!-- ... existing HTML code ... -->
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const options = {
        series: @json($series),
        chart: {
            type: 'line',
            height: {{ $height }},
            width: '{{ $width }}',
        },
        xaxis: @json($xaxis),
        yaxis: @json($yaxis),
        colors: @json($colors),
    };

    if (document.getElementById("{{ $chartId }}") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("{{ $chartId }}"), options);
        chart.render();
    }
});
</script>