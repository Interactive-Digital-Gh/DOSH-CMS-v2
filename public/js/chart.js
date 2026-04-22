$(function() {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';

  var rawPagesData = document.getElementById('barchart1-pages').value;
  var rawPagesData = JSON.parse(rawPagesData);
  var rawPageVisitsData = document.getElementById('barchart1-visits').value;
  var rawPageVisitsData = JSON.parse(rawPageVisitsData);
  var data = {
    labels: rawPagesData,
    // labels,
    datasets: [{
      label: '# of Visits',
      data: rawPageVisitsData,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(199, 199, 199, 0.2)',
        'rgba(83, 102, 255, 0.2)',
        'rgba(255, 99, 255, 0.2)',
        'rgba(99, 255, 132, 0.2)',
        'rgba(255, 120, 120, 0.2)',
        'rgba(120, 255, 255, 0.2)',
        'rgba(200, 100, 100, 0.2)',
        'rgba(0, 200, 83, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(100, 255, 100, 0.2)',
        'rgba(255, 87, 34, 0.2)',
        'rgba(63, 81, 181, 0.2)',
        'rgba(244, 67, 54, 0.2)',
        'rgba(33, 150, 243, 0.2)',
        'rgba(0, 188, 212, 0.2)',
        'rgba(139, 195, 74, 0.2)',
        'rgba(205, 220, 57, 0.2)',
        'rgba(255, 193, 7, 0.2)',
        'rgba(255, 152, 0, 0.2)',
        'rgba(121, 85, 72, 0.2)',
        'rgba(96, 125, 139, 0.2)',
        'rgba(186, 104, 200, 0.2)',
        'rgba(0, 150, 136, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(199, 199, 199, 1)',
        'rgba(83, 102, 255, 1)',
        'rgba(255, 99, 255, 1)',
        'rgba(99, 255, 132, 1)',
        'rgba(255, 120, 120, 1)',
        'rgba(120, 255, 255, 1)',
        'rgba(200, 100, 100, 1)',
        'rgba(0, 200, 83, 1)',
        'rgba(255, 205, 86, 1)',
        'rgba(100, 255, 100, 1)',
        'rgba(255, 87, 34, 1)',
        'rgba(63, 81, 181, 1)',
        'rgba(244, 67, 54, 1)',
        'rgba(33, 150, 243, 1)',
        'rgba(0, 188, 212, 1)',
        'rgba(139, 195, 74, 1)',
        'rgba(205, 220, 57, 1)',
        'rgba(255, 193, 7, 1)',
        'rgba(255, 152, 0, 1)',
        'rgba(121, 85, 72, 1)',
        'rgba(96, 125, 139, 1)',
        'rgba(186, 104, 200, 1)',
        'rgba(0, 150, 136, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };
  var multiLineData = {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [{
        label: 'Dataset 1',
        data: [12, 19, 3, 5, 2, 3],
        borderColor: [
          '#587ce4'
        ],
        borderWidth: 2,
        fill: false
      },
      {
        label: 'Dataset 2',
        data: [5, 23, 7, 12, 42, 23],
        borderColor: [
          '#ede190'
        ],
        borderWidth: 2,
        fill: false
      },
      {
        label: 'Dataset 3',
        data: [15, 10, 21, 32, 12, 33],
        borderColor: [
          '#f44252'
        ],
        borderWidth: 2,
        fill: false
      }
    ]
  };
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };

  var doughNutDevices = document.getElementById('doughnut-device').value;
  var doughNutDevices = JSON.parse(doughNutDevices);
  var doughNutDevicesCount = document.getElementById('doughnut-count').value;
  var doughNutDevicesCount = JSON.parse(doughNutDevicesCount);
  var doughnutPieData = {
    datasets: [{
      data: doughNutDevicesCount,
      backgroundColor: [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(244, 67, 54, 0.6)',
        'rgba(0, 150, 136, 0.6)',
        'rgba(233, 30, 99, 0.6)',
        'rgba(156, 39, 176, 0.6)',
        'rgba(63, 81, 181, 0.6)',
        'rgba(3, 169, 244, 0.6)',
        'rgba(0, 188, 212, 0.6)',
        'rgba(139, 195, 74, 0.6)',
        'rgba(205, 220, 57, 0.6)',
        'rgba(255, 152, 0, 0.6)',
        'rgba(121, 85, 72, 0.6)',
        'rgba(96, 125, 139, 0.6)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(244, 67, 54, 1)',
        'rgba(0, 150, 136, 1)',
        'rgba(233, 30, 99, 1)',
        'rgba(156, 39, 176, 1)',
        'rgba(63, 81, 181, 1)',
        'rgba(3, 169, 244, 1)',
        'rgba(0, 188, 212, 1)',
        'rgba(139, 195, 74, 1)',
        'rgba(205, 220, 57, 1)',
        'rgba(255, 152, 0, 1)',
        'rgba(121, 85, 72, 1)',
        'rgba(96, 125, 139, 1)'
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: doughNutDevices
  };
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    },
    legend: {
      position: 'bottom',
      labels: {
        boxWidth: 12,
        padding: 10,
        fontFamily: "'Inter', sans-serif"
      }
    }
  };

  var rawMonthData = document.getElementById('areachart1-month').value;
  var rawMonthData = JSON.parse(rawMonthData);
  var rawVisitData = document.getElementById('areachart1-visits').value;
  var rawVisitDatas = JSON.parse(rawVisitData);
  var areaData = {
    // labels: ["2013", "2014", "2015", "2016", "2017", "2017", "2017", "2017", "2015", "2015", "2222"],
    labels: rawMonthData,
    // labels,
    datasets: [{
      label: '# of Site Visits',
      data: rawVisitDatas,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(199, 199, 199, 0.2)',
        'rgba(83, 102, 255, 0.2)',
        'rgba(255, 99, 255, 0.2)',
        'rgba(99, 255, 132, 0.2)',
        'rgba(255, 120, 120, 0.2)',
        'rgba(120, 255, 255, 0.2)',
        'rgba(200, 100, 100, 0.2)',
        'rgba(0, 200, 83, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(100, 255, 100, 0.2)',
        'rgba(255, 87, 34, 0.2)',
        'rgba(63, 81, 181, 0.2)',
        'rgba(244, 67, 54, 0.2)',
        'rgba(33, 150, 243, 0.2)',
        'rgba(0, 188, 212, 0.2)',
        'rgba(139, 195, 74, 0.2)',
        'rgba(205, 220, 57, 0.2)',
        'rgba(255, 193, 7, 0.2)',
        'rgba(255, 152, 0, 0.2)',
        'rgba(121, 85, 72, 0.2)',
        'rgba(96, 125, 139, 0.2)',
        'rgba(186, 104, 200, 0.2)',
        'rgba(0, 150, 136, 0.2)'
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255, 99, 132, 1)',
        'rgba(199, 199, 199, 1)',
        'rgba(83, 102, 255, 1)',
        'rgba(255, 99, 255, 1)',
        'rgba(99, 255, 132, 1)',
        'rgba(255, 120, 120, 1)',
        'rgba(120, 255, 255, 1)',
        'rgba(200, 100, 100, 1)',
        'rgba(0, 200, 83, 1)',
        'rgba(255, 205, 86, 1)',
        'rgba(100, 255, 100, 1)',
        'rgba(255, 87, 34, 1)',
        'rgba(63, 81, 181, 1)',
        'rgba(244, 67, 54, 1)',
        'rgba(33, 150, 243, 1)',
        'rgba(0, 188, 212, 1)',
        'rgba(139, 195, 74, 1)',
        'rgba(205, 220, 57, 1)',
        'rgba(255, 193, 7, 1)',
        'rgba(255, 152, 0, 1)',
        'rgba(121, 85, 72, 1)',
        'rgba(96, 125, 139, 1)',
        'rgba(186, 104, 200, 1)',
        'rgba(0, 150, 136, 1)'
      ],
      borderWidth: 1,
      fill: true, // 3: no fill
      backgroundColor: 'rgba(255, 99, 132, 0.2)'
    }]
  };

  var areaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    }
  }

  var multiAreaData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
        label: 'Facebook',
        data: [8, 11, 13, 15, 12, 13, 16, 15, 13, 19, 11, 14],
        borderColor: ['rgba(255, 99, 132, 0.5)'],
        backgroundColor: ['rgba(255, 99, 132, 0.5)'],
        borderWidth: 1,
        fill: true
      },
      {
        label: 'Twitter',
        data: [7, 17, 12, 16, 14, 18, 16, 12, 15, 11, 13, 9],
        borderColor: ['rgba(54, 162, 235, 0.5)'],
        backgroundColor: ['rgba(54, 162, 235, 0.5)'],
        borderWidth: 1,
        fill: true
      },
      {
        label: 'Linkedin',
        data: [6, 14, 16, 20, 12, 18, 15, 12, 17, 19, 15, 11],
        borderColor: ['rgba(255, 206, 86, 0.5)'],
        backgroundColor: ['rgba(255, 206, 86, 0.5)'],
        borderWidth: 1,
        fill: true
      }
    ]
  };

  var multiAreaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    },
    elements: {
      point: {
        radius: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  var scatterChartData = {
    datasets: [{
        label: 'First Dataset',
        data: [{
            x: -10,
            y: 0
          },
          {
            x: 0,
            y: 3
          },
          {
            x: -25,
            y: 5
          },
          {
            x: 40,
            y: 5
          }
        ],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)'
        ],
        borderWidth: 1
      },
      {
        label: 'Second Dataset',
        data: [{
            x: 10,
            y: 5
          },
          {
            x: 20,
            y: -30
          },
          {
            x: -25,
            y: 15
          },
          {
            x: -10,
            y: 5
          }
        ],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
        ],
        borderWidth: 1
      }
    ]
  }

  var scatterChartOptions = {
    scales: {
      xAxes: [{
        type: 'linear',
        position: 'bottom'
      }]
    }
  }
  // Get context with jQuery - using jQuery's .get() method.
  if ($("#barChart").length) {
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: data,
      options: options
    });

    var barMonthFilter = document.getElementById('barMonthFilter');
    if (barMonthFilter) {
      barMonthFilter.addEventListener('change', function() {
        var selectedMonth = this.value;
        var selectedYear = this.getAttribute('data-year');

        fetch('/?bar_month=' + selectedMonth + '&bar_year=' + selectedYear + '&chart=pages', {
          headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
          document.getElementById('barChartTitle').innerText = 'Number of Visits Per Page: ' + data.barMonthLabel;
          barChart.data.labels = data.pages;
          barChart.data.datasets[0].data = data.page_visits;
          barChart.update();
        })
        .catch(function(err) { console.error('Error fetching bar data:', err); });
      });
    }
  }

  if ($("#lineChart").length) {
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: data,
      options: options
    });
  }

  if ($("#linechart-multi").length) {
    var multiLineCanvas = $("#linechart-multi").get(0).getContext("2d");
    var lineChart = new Chart(multiLineCanvas, {
      type: 'line',
      data: multiLineData,
      options: options
    });
  }

  if ($("#areachart-multi").length) {
    var multiAreaCanvas = $("#areachart-multi").get(0).getContext("2d");
    var multiAreaChart = new Chart(multiAreaCanvas, {
      type: 'line',
      data: multiAreaData,
      options: multiAreaOptions
    });
  }

  if ($("#doughnutChart").length) {
    var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

  if ($("#pieChart").length) {
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

  if ($("#areaChart").length) {
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });

    var monthFilter = document.getElementById('monthFilter');
    if (monthFilter) {
      monthFilter.addEventListener('change', function() {
        var selectedMonth = this.value;
        var selectedYear = this.getAttribute('data-year');
        
        fetch('/?month=' + selectedMonth + '&year=' + selectedYear + '&chart=visits', {
          headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
          document.getElementById('siteVisitsTitle').innerText = 'Site Visits: ' + data.currentMonthName + ' ' + data.currentYear;
          areaChart.data.labels = data.month;
          areaChart.data.datasets[0].data = data.visits;
          areaChart.update();
        })
        .catch(function(err) { console.error('Error fetching data:', err); });
      });
    }
  }

  if ($("#scatterChart").length) {
    var scatterChartCanvas = $("#scatterChart").get(0).getContext("2d");
    var scatterChart = new Chart(scatterChartCanvas, {
      type: 'scatter',
      data: scatterChartData,
      options: scatterChartOptions
    });
  }

  if ($("#browserTrafficChart").length) {
    var doughnutChartCanvas = $("#browserTrafficChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: browserTrafficData,
      options: doughnutPieOptions
    });
  }
});
