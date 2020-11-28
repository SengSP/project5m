$(document).ready(function(){

    var options = {
        series: [44, 55, 13, 43, 22],
        chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
      };

      var chart = new ApexCharts(document.querySelector("#piechart"), options);
      chart.render();

      var options = {
        series: [{
          name: 'Inflation',
          data: [2, 3, 4, 10, 4, 3, 3, 2, 1, 15, 5, 12, 
            2, 3, 4, 10, 4, 3, 3, 2, 1, 9, 10, 9, 
            3, 3, 2, 1, 7, 3, 6,]
        }],
        chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            // return val + "%";
            return val + "ຄ";
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", 
          "11", "12", "13", "14", "15", "16", "17", "18", "19", "20",
          "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
          position: 'top',
          labels: {
            offsetY: -18,
        
          },
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
            offsetY: -35,
        
          }
        },
        fill: {
          gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [50, 0, 100, 100]
          },
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "ຄົນ";
            }
          }
        
        },
        title: {
          text: 'ຈຳນວນຄົນໃນແຕ່ລະມື້ຂອງເດືອນ',
          floating: true,
          offsetY: 320,
          align: 'center',
          style: {
            color: '#444'
          }
        }
      };

      var chart = new ApexCharts(document.querySelector("#barchart"), options);
      chart.render();

      //////// calendar
      // page is now ready, initialize the calendar...
      $('#calendar').fullCalendar({
        // put your options and callbacks here
        events : [
            {
                title : 'Revo',
                start : '2020-01-10',
                url : 'www.google.com'
            },
        ]
    })
    
});