"use strict";
$(function() {
  chart1();
  chart2();
  chart3();
  chart4();
});

function chart1() {
  var options = {
    chart: {
      height: 350,
      type: "line",
      stacked: false,
      toolbar: {
        show: false
      }
    },
    stroke: {
      width: [0, 2, 5],
      curve: "smooth"
    },
    plotOptions: {
      bar: {
        columnWidth: "50%"
      }
    },
    colors: ["#3A5794", "#A5C351", "#E14A84"],
    series: [
      {
        name: "Facebook",
        type: "column",
        data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
      },
      {
        name: "Instagram",
        type: "area",
        data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
      },
      {
        name: "Twitter",
        type: "line",
        data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
      }
    ],
    fill: {
      opacity: [0.85, 0.25, 1],
      gradient: {
        inverseColors: false,
        shade: "light",
        type: "vertical",
        opacityFrom: 0.85,
        opacityTo: 0.55,
        stops: [0, 100, 100, 100]
      }
    },
    labels: [
      "01/01/2003",
      "02/01/2003",
      "03/01/2003",
      "04/01/2003",
      "05/01/2003",
      "06/01/2003",
      "07/01/2003",
      "08/01/2003",
      "09/01/2003",
      "10/01/2003",
      "11/01/2003"
    ],
    markers: {
      size: 0
    },
    xaxis: {
      type: "datetime",
      labels: {
        style: {
          colors: "#9aa0ac"
        }
      }
    },
    yaxis: {
      min: 0,
      labels: {
        style: {
          color: "#9aa0ac"
        }
      }
    },
    tooltip: {
      shared: true,
      intersect: false,
      y: {
        formatter: function(y) {
          if (typeof y !== "undefined") {
            return y.toFixed(0) + " views";
          }
          return y;
        }
      }
    },
    legend: {
      labels: {
        useSeriesColors: true
      },
      position: "top"
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart1"), options);

  chart.render();
}
function chart2() {
  var options = {
    chart: {
      height: 350,
      type: "bar",
      stacked: true,
      toolbar: {
        show: false
      }
    },
    plotOptions: {
      bar: {
        horizontal: true
      }
    },
    stroke: {
      width: 1,
      colors: ["#fff"]
    },
    colors: ["#ADADAD", "#7C7CAC", "#00CEE6"],
    series: [
      {
        name: "Product 1",
        data: [44, 55, 41, 37, 22, 43, 21]
      },
      {
        name: "Product 2",
        data: [53, 32, 33, 52, 13, 43, 32]
      },
      {
        name: "Tank Picture",
        data: [12, 17, 11, 9, 15, 11, 20]
      }
    ],

    xaxis: {
      categories: [2008, 2009, 2010, 2011, 2012, 2013, 2014],
      labels: {
        formatter: function(val) {
          return val + "K";
        },
        style: {
          colors: "#9aa0ac"
        }
      }
    },
    yaxis: {
      title: {
        text: undefined
      },
      labels: {
        style: {
          color: "#9aa0ac"
        }
      }
    },
    tooltip: {
      y: {
        formatter: function(val) {
          return val + "K";
        }
      }
    },
    fill: {
      opacity: 1
    },

    legend: {
      labels: {
        useSeriesColors: true
      },
      position: "top",
      horizontalAlign: "left",
      offsetX: 40
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart2"), options);

  chart.render();
}
function chart3() {
  try {
    //doughut chart
    var ctx = document.getElementById("chart3");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          datasets: [
            {
              data: [45, 25, 20, 10],
              backgroundColor: ["#00bcd4", "#789BF2", "#ED755B", "#EFD85A"],
              hoverBackgroundColor: ["#1bcce2", "#98b2f3", "#f58c75", "#efdd80"]
            }
          ],
          labels: ["Direct", "Website", "Email", "Others"]
        },
        options: {
          legend: {
            display: false
          },
          responsive: true
        }
      });
    }
  } catch (error) {
    console.log(error);
  }
}
function chart4() {
  var colors = [
    "#775DD0",
    "#775DD0",
    "#775DD0",
    "#775DD0",
    "#775DD0",
    "#775DD0",
    "#775DD0",
    "#775DD0",
    "#775DD0",
    "#775DD0",
    "#775DD0",
    "#775DD0",
  ];
  var options = {
    chart: {
      height: 225,
      type: "bar",
      toolbar: {
        show: false
      },
      events: {
        click: function(chart, w, e) {
          console.log(chart, w, e);
        }
      }
    },
    colors: colors,
    plotOptions: {
      bar: {
        columnWidth: "45%",
        distributed: true
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [
      {
        data: [200, 150, 500, 300, 350, 210, 340, 300]
      }
    ],
    xaxis: {
      categories: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Sept", "Oct", "Nov", "Déc"],
      labels: {
        style: {
          colors: colors,
          fontSize: "14px"
        }
      }
    },
    yaxis: {
      labels: {
        style: {
          color: "#9aa0ac"
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart4"), options);

  chart.render();
}
