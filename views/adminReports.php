<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="from">From:</label>
                        <input type="date" class="form-control date-helper" placeholder="From" id="from">
                    </div>
                    <div class="col-md-6">
                        <label for="from">To:</label>
                        <input type="date" class="form-control date-helper" placeholder="To" id="to">
                    </div>
                </div>
                <div class="chart">
                    <div id="price-per-user-canvas">
                        <canvas id="price-per-user"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"
                                class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        generatePricePerUser();

        $(".date-helper").change(function () {
            generatePricePerUser();
        });
    });

    function generatePricePerUser() {
        $("#price-per-user-canvas").empty();
        $("#price-per-user-canvas").append(
            ' <canvas id="price-per-user"' +
            'style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"' +
            'class="chartjs-render-monitor"></canvas>'
        );

        let from = $("#from").val();
        let to = $("#to").val();

        let url = `/getPricePerUser?from=${from}&to=${to}`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.email;
            });

            let values = result.map(function (e) {
                return e.price;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Price per user",
                        data: values
                    }]
            }

            let options = {}

            let graph = $("#price-per-user").get(0).getContext('2d');

            createGraph(setData, graph, 'bar', options);
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