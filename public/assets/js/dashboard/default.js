// time 
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    // var s = today.getSeconds();
    var ampm = h >= 12 ? 'PM' : 'AM';
    h = h % 12;
    h = h ? h : 12;
    m = checkTime(m);
    // s = checkTime(s);
    document.getElementById('txt').innerHTML =
        h + ":" + m + ' ' + ampm;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
    return i;
}

// order chart
var options2 = {
  series: [{
    name: 'Daily',
    data: [2.15, 3, 1.5, 2, 2.4, 3, 2.4,
      2.8, 1.5, 1.7, 3, 2.50, 3, 2, 2.15, 3, 1.10
    ]
  },
  {
    name: 'Weekly',
    data: [-2.15, -3, -1.5, -2, -2.4, -3, -2.4,
    -2.8, -1.5, -1.7, -3, -2.50, -3, -2, -2.15, -3, -1.10
    ]
  },
  {
    name: 'Monthly',
    data: [-2.25, -2.35, -2.45, -2.55, -2.65, -2.75, -2.85,
    -2.95, -3.00, -3.10, -3.20, -3.25, -3.10, -3.00, -2.95, -2.85, -2.75
    ]
  },
  {
    name: 'Yearly',
    data: [2.25, 2.35, 2.45, 2.55, 2.65, 2.75, 2.85,
    2.95, 3.00, 3.10, 3.20, 3.25, 3.10, 3.00, 2.95, 2.85, 2.75
    ]
  }
  ],
  chart: {
    type: 'bar',
    width: 180,
    height: 120,
    stacked: true,
    toolbar: {
      show: false
    },
  },
  plotOptions: {
    bar: {
      vertical: true,
      columnWidth: '40%',
      barHeight: '80%',
      startingShape: 'rounded',
      endingShape: 'rounded'
    },
  },
  colors: [ CubaAdminConfig.primary , CubaAdminConfig.primary , "#F2F3F7", "#F2F3F7"],
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: 0,
  },
  legend: {
    show: false,
  },
  grid: {
    xaxis: {
        offsetX: -2,
      lines: {
        show: false
      }
    },
    yaxis: {
      lines: {
        show: false
      }
    },
  },
  yaxis: {
    min: -5,
    max: 5,
    show: false,
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false,
    },
    
  },
  tooltip: {
    shared: false,
    x: {
          show: false,
      },
      y: {
          show: false,
      },
      z: {
          show: false,
      },
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug',
      'Sep', 'Oct', 'Nov', 'Dec'
    ],
    offsetX: 0,
    offsetY: 0,
    labels: {
      offsetX: 0,
    offsetY: 0,
      show: false
    },
    axisBorder: {
        offsetX: 0,
    offsetY: 0,
      show: false
    },
    axisTicks: {
        offsetX: 0,
    offsetY: 0,
      show: false
    }

  },
  responsive: [{
          breakpoint: 1760,
          options: {
            chart: {
              width: 160,
            }
          },
        },
        {
          breakpoint: 1601,
          options: {
            chart: {
              height: 110,
            }
          },
        },
        {
          breakpoint: 1560,
          options: {
            chart: {
              width: 140,
            }
          },
        },
        {
          breakpoint: 1460,
          options: {
            chart: {
              width: 120,
            }
          },
        },
        {
          breakpoint: 1400,
          options: {
            chart: {
              width: 290,
            }
          },
        },
        {
          breakpoint: 1110,
          options: {
            chart: {
              width: 200,
            }
          },
        },
        {
          breakpoint: 700,
          options: {
            chart: {
              width: 150,
            }
          },
        },
        {
          breakpoint: 576,
          options: {
            chart: {
              width: 220,
            }
          },
        },
        {
          breakpoint: 420,
          options: {
            chart: {
              width: 150,
            }
          },
        },
      ]
};

var chart2 = new ApexCharts(document.querySelector("#orderchart"),
  options2
);

chart2.render();

// profit chart
var options3 = {
 series: [{
            name: "Desktops",
            data: [210, 180, 650, 200, 600, 100, 800, 300, 500]
        }],
          chart: {
          width: 200,
          height: 150,
          type: 'line',
          toolbar: {
            show: false
          },
          dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            top: 5,
            left: 0,
            blur: 3,
            color: '#16C7F9',
            opacity: 0.3
          },
          zoom: {
            enabled: false
          }
        },
        colors: ["#16C7F9"],
        dataLabels: {
          enabled: false
        },
        stroke: {
          width : 2,
          curve: 'smooth'
        },
        grid: {
          show: false
        },
        tooltip: {
            x: {
                show: false,
            },
            y: {
                show: false,
            },
            z: {
                show: false,
            },
            marker: {
                show: false
            }
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
          labels: {
            show: false
          },
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          tooltip: {
            enabled: false,
          },
        },
        yaxis: {
            labels: {
            show: false
          },
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          }
        },
        responsive: [{
          breakpoint: 1780,
          options: {
            chart: {
              width: 180,
            }
          },
        },
        {
          breakpoint: 1680,
          options: {
            chart: {
              width: 160,
            }
          },
        },
        {
          breakpoint: 1601,
          options: {
            chart: {
              height: 110,
            }
          },
        },
         {
          breakpoint: 1560,
          options: {
            chart: {
              width: 140,
            }
          },
        },
        {
          breakpoint: 1460,
          options: {
            chart: {
              width: 120,
            }
          },
        },
        {
          breakpoint: 1400,
          options: {
            chart: {
              width: 290,
            }
          },
        },
         {
          breakpoint: 1110,
          options: {
            chart: {
              width: 200,
            }
          },
        },
        {
          breakpoint: 700,
          options: {
            chart: {
              width: 150,
            }
          },
        },
        {
          breakpoint: 576,
          options: {
            chart: {
              width: 220,
            }
          },
        },
        {
          breakpoint: 420,
          options: {
            chart: {
              width: 150,
            }
          },
        },
        ]
};

    var chart3 = new ApexCharts(document.querySelector("#profitchart"), options3);
        chart3.render();






  // schedule chart
  var scheduleoptions = {
    series: [
    {
      data: [
        {
          x: 'Analysis',
          y: [
            new Date('2022-01-01').getTime(),
            new Date('2022-02-30').getTime()
          ],
          fillColor: 'var(--theme-deafult)'
        },
        {
          x: 'Design',
          y: [
            new Date('2022-02-20').getTime(),
            new Date('2022-04-08').getTime()
          ],
          fillColor: '#54BA4A'
        },
        {
          x: 'Coding',
          y: [
            new Date('2022-01-25').getTime(),
            new Date('2022-03-20').getTime()
          ],
          fillColor: '#FFAA05'
        },
        {
          x: 'Testing',
          y: [
            new Date('2022-01-01').getTime(),
            new Date('2022-03-12').getTime()
          ],
          fillColor: '#46A7FB'
        },
      ]
    }
  ],
    chart: {
    height: 355,
    type: 'rangeBar',
    toolbar:{
        show:false,
      },
  },
  plotOptions: {
    bar: {
      horizontal: true,
      distributed: true,
      barHeight: '40%',
      dataLabels: {
        hideOverflowingLabels: false,
      },
    }
  },
  dataLabels: {
    enabled: true,
    formatter: function(val, opts) {
      var label = opts.w.globals.labels[opts.dataPointIndex]
      var a = moment(val[0])
      var b = moment(val[1])
      var diff = b.diff(a, 'days')
      return label
    },
    textAnchor: 'end',
    offsetX: 0,
    offsetY: 0,
     background: {
    enabled: true,
    foreColor: '#52526C',
    padding: 15,
    borderRadius: 12,
    borderWidth: 1,
    borderColor: 'var(--white)',
    opacity: 0.9,
  },
  },
  xaxis: {
    type: 'datetime',
     position: 'top',
  },
  yaxis: {
    axisBorder: {
      show: false
     },
     axisTicks: {
      show: false
     }
  },
  grid: {
    row: {
      colors: ['var(--light-background)', 'var(--white)'],
      opacity: 1
    },
  },
  responsive: [
  {
    breakpoint: 576,
    options:{
      yaxis:{     
        labels: {
          show: false
        },
      },
      grid: {
        padding: {
          left: -10
        }
      }
    }
  },
  ] 
  };

  var schedulechart = new ApexCharts(document.querySelector("#schedulechart"), scheduleoptions);
  schedulechart.render();

 // growth chart
 var growthoptions = {
    series: [{
    name: 'Growth',
    data: [10, 5, 15, 0, 15, 12, 29, 29, 29, 12, 15,5]
  }],
    chart: {
      height: 200,
      type: 'line',
      toolbar: {
        show: false
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
        top: 5,
        left: 0,
        blur: 4,
        color: '#7366ff',
        opacity: 0.22
      },
    },
  grid: {
    yaxis: {
      lines: {
          show: false
      }
    },  
  },
  colors: ["#5527FF"],
  stroke: {
    width: 3,
    curve: 'smooth'
  },
  xaxis: {
    type: 'category',
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan'],
    tickAmount: 10,
    labels: {
      style: {
          fontFamily: 'Rubik, sans-serif',
      },
    },
    axisTicks: {
      show: false
    },
    axisBorder: {
      show: false
    },
    tooltip: {
      enabled: false,
    },
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'dark',
      gradientToColors: [ '#5527FF' ],
      shadeIntensity: 1,
      type: 'horizontal',
      opacityFrom: 1,
      opacityTo: 1,
      colorStops: [
        {
          offset: 0,
          color: "#5527FF",
          opacity: 1
        },
        {
          offset: 100,
          color: "#E069AE",
          opacity: 1
        },
      ]
      // stops: [0, 100, 100, 100]
    },
  },
  yaxis: {
    min: -10,
    max: 40,
    labels: {
      show: false
    }
  }
  };

var growthchart = new ApexCharts(document.querySelector("#growthchart"), growthoptions);
growthchart.render();