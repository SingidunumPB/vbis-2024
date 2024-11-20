<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="chart">
                    <div id="number-of-reservations-per-month-canvas">
                        <canvas id="number-of-reservations-per-month"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"
                                class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart">
                    <div id="price-per-month-canvas">
                        <canvas id="price-per-month"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"
                                class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        generateNumberOfReservationsPerMonth();
        getPricePerMonth();
    });

    function generateNumberOfReservationsPerMonth() {
        let url = `/getNumberOfReservationsPerMonth`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.month;
            });

            let values = result.map(function (e) {
                return e.number_of_reservations;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Number of reservations per month",
                        data: values
                    }]
            }

            let options = {}

            let graph = $("#number-of-reservations-per-month").get(0).getContext('2d');

            createGraph(setData, graph, 'bar', options);
        });
    }

    function getPricePerMonth() {
        let url = `/getPricePerMonth`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.month;
            });

            let values = result.map(function (e) {
                return e.price;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Price per month",
                        data: values,
                        backgroundColor: ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
                            '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
                            '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
                            '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
                            '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
                            '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
                            '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
                            '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
                            '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
                            '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF']
                    }]
            }

            let options = {}

            let graph = $("#price-per-month").get(0).getContext('2d');

            createGraph(setData, graph, 'pie', options);
        });
    }

    function createGraph(setData, graph, chartType, options) {
        new Chart(graph, {
            type: chartType,
            data: setData,
            options: options
        });
    }
</script>