@extends('admin.layouts.app')
@section('title', 'Admin Dashboard | MyBetBible')
@section('heading', 'Dashboard')

@section('content')

    <!-- Dash Counters -->
    @include('admin.dash.counters')

    <div class="row">

        <!-- Earnings -->
        @include('admin.dash.earnings')

        <!-- Popular -->
        @include('admin.dash.popular')

    </div>

    @include('admin.dash.orders')

@endsection

@section('scripts')
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart']
        });

        google.charts.setOnLoadCallback();

        function loadMonthData() {
            $.ajax({
                method: "POST",
                url: "{{ route('json.reports.earnings') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType:"JSON",
                success:function(data) {
                    drawMonthChart(data);
                }
            });
        }

        function loadPopularServices() {
            $.ajax({
                method: "POST",
                url: "{{ route('json.reports.popular') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType:"JSON",
                success:function(data) {
                    drawPopularDonutChart([
                        {"title":"Direct","total":9494},
                        {"title":"Social","total":25199},
                        {"title":"Referral","total":7250},
                        {"title":"Newsletter","total":14250},
                        {"title":"Campaign - Data 1","total":11475},
                    ]);
                }
            });
        }

        function drawMonthChart(chartData) {
            let data = new google.visualization.DataTable();

            data.addColumn('string', 'Month');
            data.addColumn('number', 'Amount');

            $.each(chartData, function(i, jsonData){
                let amount = parseFloat($.trim(jsonData.total));

                data.addRows([
                    [jsonData.month, amount]
                ]);
            });

            let chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, {
                curveType: 'function'
            });
        }

        function drawPopularDonutChart(chartData) {
            let data = new google.visualization.DataTable();

            data.addColumn('string', 'Source');
            data.addColumn('number', 'Total');

            $.each(chartData, function(i, jsonData){
                let total = parseFloat($.trim(jsonData.total));

                data.addRows([
                    [jsonData.title, total]
                ]);
            });

            let chart = new google.visualization.PieChart(document.getElementById('pie_chart'));

            chart.draw(data, {
                is3D: true
            });
        }

        loadMonthData();
        loadPopularServices();
    </script>


@endsection
