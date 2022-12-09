'use strict';
$(function () {
  initCharts();
  barChart();
  lineChart();
  dumbbellPlotChart();
});
//Charts
function initCharts() {
  $('.chart.chart-bar').sparkline([6, 4, 8, 6, 8, 10, 5, 6, 7, 9, 5, 6, 4, 8, 6], {
    type: 'bar',
    barColor: '#000',
    negBarColor: '#000',
    barWidth: '6px',
    height: '45px',
    colorMap: {
      '8': '#56D85B',
      '10': '#EA891F',
      '6': '#D01155'
    }
  });


  //Chart Pie
  $('.chart.chart-pie').sparkline([30, 35, 25, 8], {
    type: 'pie',
    height: '45px',
    sliceColors: ['#5A99F1', '#52E6A4', '#ED5F7C', '#9170D0']
  });


  //Chart Line
  $('.chart.chart-line').sparkline([9, 4, 6, 5, 6, 4, 7, 3], {
    type: 'line',
    width: '60px',
    height: '45px',
    lineColor: '#fff',
    lineWidth: 1.3,
    fillColor: 'rgba(0,0,0,0)',
    spotColor: 'rgba(255,255,255,0.40)',
    maxSpotColor: 'rgba(255,255,255,0.40)',
    minSpotColor: 'rgba(255,255,255,0.40)',
    spotRadius: 3,
    highlightSpotColor: '#fff'
  });

  $('.compositebar').sparkline([6, 4, 8, 6, 8, 10, 5, 6, 7, 9, 5, 6, 4, 8, 6, 8, 10, 5, 6, 7, 9], {
    type: 'bar',
    barColor: '#000',
    negBarColor: '#000',
    barWidth: '4px',
    height: '45px',
    colorMap: {
      '6': '#EC7B1A',
      '10': '#EC7B1A'
    }
  });
  $('.compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6], {
    composite: true,
    fillColor: false,
    lineColor: 'red'
  });


  $('.sparkline-1').sparkline([8, 4, 2, 5, 3, 7, 1, 4, 4, 8, 6, 9, 4, 2, 5, 7, 4, 6, 5, 9, 10], {
    height: '50px',
    width: '100px'
  });
}

function barChart() {

  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  // Create chart instance
  var chart = am4core.create("barChart", am4charts.XYChart);
  chart.scrollbarX = new am4core.Scrollbar();

  // Add data
  chart.data = [{
      country: "USA",
      visits: 3025
    },
    {
      country: "China",
      visits: 1882
    },
    {
      country: "Japan",
      visits: 1809
    },
    {
      country: "Germany",
      visits: 1322
    },
    {
      country: "UK",
      visits: 1122
    },
    {
      country: "France",
      visits: 1114
    },
    {
      country: "India",
      visits: 984
    },
    {
      country: "Spain",
      visits: 711
    },
    {
      country: "Netherlands",
      visits: 665
    },
    {
      country: "Russia",
      visits: 580
    },
    {
      country: "South Korea",
      visits: 443
    },
    {
      country: "Canada",
      visits: 441
    }
  ];

  // Create axes
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "country";
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 30;
  categoryAxis.renderer.labels.template.horizontalCenter = "right";
  categoryAxis.renderer.labels.template.verticalCenter = "middle";
  categoryAxis.renderer.labels.template.rotation = 270;
  categoryAxis.tooltip.disabled = true;
  categoryAxis.renderer.minHeight = 110;
  categoryAxis.renderer.labels.template.fill = am4core.color("#9aa0ac");

  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.minWidth = 50;
  valueAxis.renderer.labels.template.fill = am4core.color("#9aa0ac");

  // Create series
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.sequencedInterpolation = true;
  series.dataFields.valueY = "visits";
  series.dataFields.categoryX = "country";
  series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
  series.columns.template.strokeWidth = 0;

  series.tooltip.pointerOrientation = "vertical";

  series.columns.template.column.cornerRadiusTopLeft = 10;
  series.columns.template.column.cornerRadiusTopRight = 10;
  series.columns.template.column.fillOpacity = 0.8;

  // on hover, make corner radiuses bigger
  let hoverState = series.columns.template.column.states.create("hover");
  hoverState.properties.cornerRadiusTopLeft = 0;
  hoverState.properties.cornerRadiusTopRight = 0;
  hoverState.properties.fillOpacity = 1;

  series.columns.template.adapter.add("fill", (fill, target) => {
    return chart.colors.getIndex(target.dataItem.index);
  });

  // Cursor
  chart.cursor = new am4charts.XYCursor();
}

function lineChart() {
  am4core.useTheme(am4themes_animated);

  // Create chart instance
  var chart = am4core.create("amchartLineDashboard", am4charts.XYChart);

  // Add data
  chart.data = [{
    "year": "1983",
    "value": 0.177
  }, {
    "year": "1984",
    "value": -0.021
  }, {
    "year": "1985",
    "value": -0.037
  }, {
    "year": "1986",
    "value": 0.03
  }, {
    "year": "1987",
    "value": 0.179
  }, {
    "year": "1988",
    "value": 0.18
  }, {
    "year": "1989",
    "value": 0.104
  }, {
    "year": "1990",
    "value": 0.255
  }, {
    "year": "1991",
    "value": 0.21
  }, {
    "year": "1992",
    "value": 0.065
  }, {
    "year": "1993",
    "value": 0.11
  }, {
    "year": "1994",
    "value": 0.172
  }, {
    "year": "1995",
    "value": 0.269
  }, {
    "year": "1996",
    "value": 0.141
  }, {
    "year": "1997",
    "value": 0.353
  }, {
    "year": "1998",
    "value": 0.548
  }, {
    "year": "1999",
    "value": 0.298
  }, {
    "year": "2000",
    "value": 0.267
  }, {
    "year": "2001",
    "value": 0.411
  }, {
    "year": "2002",
    "value": 0.462
  }, {
    "year": "2003",
    "value": 0.47
  }, {
    "year": "2004",
    "value": 0.445
  }, {
    "year": "2005",
    "value": 0.47
  }];
  // Create axes
  var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
  dateAxis.renderer.grid.template.location = 0;
  dateAxis.renderer.labels.template.fill = am4core.color("#9aa0ac");
  //dateAxis.renderer.minGridDistance = 30;

  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.renderer.labels.template.fill = am4core.color("#9aa0ac");

  // Create series
  function createSeries(field, name, date) {
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = field;
    series.dataFields.dateX = "year";
    series.name = name;
    series.strokeWidth = 2;

    var bullet = series.bullets.push(new am4charts.CircleBullet());
    bullet.circle.stroke = am4core.color("#fff");
    bullet.circle.strokeWidth = 2;
  }

  createSeries("value", "Series #1", "date");

  chart.legend = new am4charts.Legend();
  chart.cursor = new am4charts.XYCursor();
}

function dumbbellPlotChart() {

  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  var chart = am4core.create("dumbbellPlotChart", am4charts.XYChart);

  var data = [];
  var open = 100;
  var close = 120;

  var names = [
    "Raina",
    "Demarcus",
    "Carlo",
    "Jacinda",
    "Richie",
    "Antony",
    "Amada",
    "Idalia",
    "Janella",
    "Marla",
    "Curtis",
    "Shellie"
  ];

  for (var i = 0; i < names.length; i++) {
    open += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);
    close = open + Math.round(Math.random() * 10) + 3;
    data.push({
      category: names[i],
      open: open,
      close: close
    });
  }

  chart.data = data;

  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.ticks.template.disabled = true;
  categoryAxis.renderer.axisFills.template.disabled = true;
  categoryAxis.dataFields.category = "category";
  categoryAxis.renderer.minGridDistance = 15;
  categoryAxis.renderer.grid.template.location = 0.5;
  categoryAxis.renderer.grid.template.strokeDasharray = "1,3";
  categoryAxis.renderer.labels.template.rotation = -90;
  categoryAxis.renderer.labels.template.horizontalCenter = "left";
  categoryAxis.renderer.labels.template.dx = 17;
  categoryAxis.renderer.inside = true;
  categoryAxis.renderer.labels.template.fill = am4core.color("#9aa0ac");

  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.tooltip.disabled = true;
  valueAxis.renderer.ticks.template.disabled = true;
  valueAxis.renderer.axisFills.template.disabled = true;
  valueAxis.renderer.labels.template.fill = am4core.color("#9aa0ac");

  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.categoryX = "category";
  series.dataFields.openValueY = "open";
  series.dataFields.valueY = "close";
  series.tooltipText = "open: {openValueY.value} close: {valueY.value}";
  series.sequencedInterpolation = true;
  series.fillOpacity = 0;
  series.strokeOpacity = 1;
  series.columns.template.width = 0.01;
  series.tooltip.pointerOrientation = "horizontal";

  var openBullet = series.bullets.create(am4charts.CircleBullet);
  openBullet.locationY = 1;

  var closeBullet = series.bullets.create(am4charts.CircleBullet);

  closeBullet.fill = chart.colors.getIndex(4);
  closeBullet.stroke = closeBullet.fill;

  chart.cursor = new am4charts.XYCursor();

}