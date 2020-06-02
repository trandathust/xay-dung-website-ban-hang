$(function () {
    'use strict'

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    var $salesChart = $('#sales-chart')
    var sale = $('#sales-chart').data('sale');
    var listValueSale = [];
    var listMonthSale = [];
    sale.forEach(function (element) {
        listValueSale.push(element.value);
        listMonthSale.push("Tháng" + element.getMonth);

    });


    var salesChart = new Chart($salesChart, {
        type: 'bar',
        data: {
            labels: listMonthSale,
            datasets: [
                {
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: listValueSale,
                },

            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            if (value >= 1000000) {
                                value /= 1000000
                                value += 'Tr'
                            }
                            if (value >= 1000) {
                                value /= 1000
                                value += 'K'
                            }
                            return '$' + value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    })

    var $visitorsChart = $('#visitors-chart')

    var listOfValue = [];
    var listOfDay = [];

    var order = $('#visitors-chart').data('order');


    order.forEach(function (element) {
        listOfValue.push(element.value);
        listOfDay.push(element.getDay);

    });
    var max = 0;
    for (var i = 0; i < listOfValue.length; i++) {
        if (listOfValue[i] > max) {
            max = listOfValue[i]
        }

    }
    max = max + 5;

    var visitorsChart = new Chart($visitorsChart, {
        data: {
            labels: listOfDay,
            datasets: [{
                type: 'line',
                data: listOfValue,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                pointBorderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                fill: false
                // pointHoverBackgroundColor: '#007bff',
                // pointHoverBorderColor    : '#007bff'
            }]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,
                        suggestedMax: max
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    })
})
