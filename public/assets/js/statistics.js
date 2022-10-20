/* -------------------------------------------------------------------------- */

/*                            Count Documents                                 */

/* -------------------------------------------------------------------------- */
var productShareDoughnutInit = function productShareDoughnutInit() {
    var marketShareDoughnutElement = document.getElementById('marketShareDoughnut');

    var getOptions = function getOptions() {
      return {
        type: 'doughnut',
        data: {
          labels: ['Flacon', 'Sparrow'],
          datasets: [{
            data: [50, 88],
            backgroundColor: [utils.getColor('primary'), utils.getColor('300')],
            borderColor: [utils.getColor('primary'), utils.getColor('300')]
          }]
        },
        options: {
          tooltips: chartJsDefaultTooltip(),
          rotation: -90,
          circumference: '180',
          cutout: '80%',
          plugins: {
            legend: {
              display: false
            }
          }
        }
      };
    };

    chartJsInit(marketShareDoughnutElement, getOptions);
};



/* -------------------------------------------------------------------------- */

/*                                Weekly Subscriptions                        */

/* -------------------------------------------------------------------------- */
var weeklySalesInit = function weeklySalesInit() {
    var ECHART_BAR_WEEKLY_SALES = '.echart-bar-weekly-sales';
    var $echartBarWeeklySales = document.querySelector(ECHART_BAR_WEEKLY_SALES);

    if ($echartBarWeeklySales) {
      // Get options from data attribute
      var userOptions = utils.getData($echartBarWeeklySales, 'options');
      var data = subs; // Max value of data

      var yMax = Math.max.apply(Math, data);
      var dataBackground = data.map(function () {
        return yMax;
      });
      var chart = window.echarts.init($echartBarWeeklySales); // Default options

      var getDefaultOptions = function getDefaultOptions() {
        return {
          tooltip: {
            trigger: 'axis',
            padding: [7, 10],
            formatter: '{b0} : {c0}',
            transitionDuration: 0,
            backgroundColor: utils.getGrays()['100'],
            borderColor: utils.getGrays()['300'],
            textStyle: {
              color: utils.getColors().dark
            },
            borderWidth: 1,
            position: function position(pos, params, dom, rect, size) {
              return getPosition(pos, params, dom, rect, size);
            }
          },
          xAxis: {
            type: 'category',
            data: days,
            boundaryGap: false,
            axisLine: {
              show: false
            },
            axisLabel: {
              show: false
            },
            axisTick: {
              show: false
            },
            axisPointer: {
              type: 'none'
            }
          },
          yAxis: {
            type: 'value',
            splitLine: {
              show: false
            },
            axisLine: {
              show: false
            },
            axisLabel: {
              show: false
            },
            axisTick: {
              show: false
            },
            axisPointer: {
              type: 'none'
            }
          },
          series: [{
            type: 'bar',
            showBackground: true,
            backgroundStyle: {
              borderRadius: 10
            },
            barWidth: '5px',
            itemStyle: {
              barBorderRadius: 10,
              color: utils.getColors().primary
            },
            data: data,
            z: 10,
            emphasis: {
              itemStyle: {
                color: utils.getColors().primary
              }
            }
          }],
          grid: {
            right: 5,
            left: 10,
            top: 0,
            bottom: 0
          }
        };
      };

      echartSetOption(chart, userOptions, getDefaultOptions);
    }
  };



/* -------------------------------------------------------------------------- */

/*                                Monthly Downloads                           */

/* -------------------------------------------------------------------------- */
var totalOrderInit = function totalOrderInit() {
    var ECHART_LINE_TOTAL_ORDER = '.echart-line-total-order'; //
    var $echartLineTotalOrder = document.querySelector(ECHART_LINE_TOTAL_ORDER);

    if ($echartLineTotalOrder) {
      // Get options from data attribute
      var userOptions = utils.getData($echartLineTotalOrder, 'options');
      var chart = window.echarts.init($echartLineTotalOrder); // Default options

      var getDefaultOptions = function getDefaultOptions() {
        return {
          tooltip: {
            triggerOn: 'mousemove',
            trigger: 'axis',
            padding: [7, 10],
            formatter: '{b0}: {c0}',
            backgroundColor: utils.getGrays()['100'],
            borderColor: utils.getGrays()['300'],
            textStyle: {
              color: utils.getColors().dark
            },
            borderWidth: 1,
            transitionDuration: 0,
            position: function position(pos, params, dom, rect, size) {
              return getPosition(pos, params, dom, rect, size);
            }
          },
          xAxis: {
            type: 'category',
            data: ['Week 4', 'Week 5', 'week 6', 'week 7'],
            boundaryGap: false,
            splitLine: {
              show: false
            },
            axisLine: {
              show: false,
              lineStyle: {
                color: utils.getGrays()['300'],
                type: 'dashed'
              }
            },
            axisLabel: {
              show: false
            },
            axisTick: {
              show: false
            },
            axisPointer: {
              type: 'none'
            }
          },
          yAxis: {
            type: 'value',
            splitLine: {
              show: false
            },
            axisLine: {
              show: false
            },
            axisLabel: {
              show: false
            },
            axisTick: {
              show: false
            },
            axisPointer: {
              show: false
            }
          },
          series: [{
            type: 'line',
            lineStyle: {
              color: utils.getColors().primary,
              width: 3
            },
            itemStyle: {
              color: utils.getGrays().white,
              borderColor: utils.getColors().primary,
              borderWidth: 2
            },
            hoverAnimation: true,
            data: [20, 40, 100, 120],
            // connectNulls: true,
            smooth: 0.6,
            smoothMonotone: 'x',
            showSymbol: false,
            symbol: 'circle',
            symbolSize: 8,
            areaStyle: {
              color: {
                type: 'linear',
                x: 0,
                y: 0,
                x2: 0,
                y2: 1,
                colorStops: [{
                  offset: 0,
                  color: utils.rgbaColor(utils.getColors().primary, 0.25)
                }, {
                  offset: 1,
                  color: utils.rgbaColor(utils.getColors().primary, 0)
                }]
              }
            }
          }],
          grid: {
            bottom: '2%',
            top: '0%',
            right: '10px',
            left: '10px'
          }
        };
      };

      echartSetOption(chart, userOptions, getDefaultOptions);
    }
  };



/* -------------------------------------------------------------------------- */

/*                        Total Sales E-commerce                              */

/* -------------------------------------------------------------------------- */
var totalSalesEcommerce = function totalSalesEcommerce() {
    var ECHART_LINE_TOTAL_SALES_ECOMM = '.echart-line-total-sales-ecommerce';
    var $echartsLineTotalSalesEcomm = document.querySelector(ECHART_LINE_TOTAL_SALES_ECOMM);
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    function getFormatter(params) {
      return params.map(function (_ref16, index) {
        var value = _ref16.value,
            borderColor = _ref16.borderColor;
        return "<span class= \"fas fa-circle\" style=\"color: ".concat(borderColor, "\"></span>\n    <span class='text-600'>").concat(index === 0 ? 'This Year' : 'Previous Year', ": ").concat(value, " FCFA</span>");
      }).join('<br/>');
    }

    if ($echartsLineTotalSalesEcomm) {
      // Get options from data attribute
      var userOptions = utils.getData($echartsLineTotalSalesEcomm, 'options');
      var TOTAL_SALES_LAST_MONTH = "#".concat(userOptions.optionOne);
      var TOTAL_SALES_PREVIOUS_YEAR = "#".concat(userOptions.optionTwo);
      var totalSalesLastMonth = document.querySelector(TOTAL_SALES_LAST_MONTH);
      var totalSalesPreviousYear = document.querySelector(TOTAL_SALES_PREVIOUS_YEAR);
      var chart = window.echarts.init($echartsLineTotalSalesEcomm);

      var getDefaultOptions = function getDefaultOptions() {
        return {
          color: utils.getGrays()['100'],
          tooltip: {
            trigger: 'axis',
            padding: [7, 10],
            backgroundColor: utils.getGrays()['100'],
            borderColor: utils.getGrays()['300'],
            textStyle: {
              color: utils.getColors().dark
            },
            borderWidth: 1,
            formatter: function formatter(params) {
              return getFormatter(params);
            },
            transitionDuration: 0,
            position: function position(pos, params, dom, rect, size) {
              return getPosition(pos, params, dom, rect, size);
            }
          },
          legend: {
            data: ['lastMonth', 'previousYear'],
            show: false
          },
          xAxis: {
            type: 'category',
            data: months,
            boundaryGap: false,
            axisPointer: {
              lineStyle: {
                color: utils.getColor('300'),
                type: 'dashed'
              }
            },
            splitLine: {
              show: false
            },
            axisLine: {
              lineStyle: {
                // color: utils.getGrays()['300'],
                color: utils.rgbaColor('#000', 0.01),
                type: 'dashed'
              }
            },
            axisTick: {
              show: false
            },
            axisLabel: {
              color: utils.getColor('400'),
              margin: 15 // showMaxLabel: false

            }
          },
          yAxis: {
            type: 'value',
            axisPointer: {
              show: false
            },
            splitLine: {
              lineStyle: {
                color: utils.getColor('300'),
                type: 'dashed'
              }
            },
            boundaryGap: false,
            axisLabel: {
              show: true,
              color: utils.getColor('400'),
              margin: 15
            },
            axisTick: {
              show: false
            },
            axisLine: {
              show: false
            }
          },
          series: [{
            name: 'lastMonth',
            type: 'line',
            data: subscriptionArr,
            lineStyle: {
              color: utils.getColor('primary')
            },
            itemStyle: {
              borderColor: utils.getColor('primary'),
              borderWidth: 2
            },
            symbol: 'circle',
            symbolSize: 10,
            hoverAnimation: true,
            areaStyle: {
              color: {
                type: 'linear',
                x: 0,
                y: 0,
                x2: 0,
                y2: 1,
                colorStops: [{
                  offset: 0,
                  color: utils.rgbaColor(utils.getColor('primary'), 0.2)
                }, {
                  offset: 1,
                  color: utils.rgbaColor(utils.getColor('primary'), 0)
                }]
              }
            }
          }, {
            name: 'previousYear',
            type: 'line',
            data: last_subscriptionArr,
            lineStyle: {
              color: utils.rgbaColor(utils.getColor('success'), 0.3)
            },
            itemStyle: {
              borderColor: utils.rgbaColor(utils.getColor('success'), 0.6),
              borderWidth: 2
            },
            symbol: 'circle',
            symbolSize: 10,
            hoverAnimation: true
          }],
          grid: {
            right: '18px',
            left: '40px',
            bottom: '15%',
            top: '5%'
          }
        };
      };

      echartSetOption(chart, userOptions, getDefaultOptions);
      totalSalesLastMonth.addEventListener('click', function () {
        chart.dispatchAction({
          type: 'legendToggleSelect',
          name: 'lastMonth'
        });
      });
      totalSalesPreviousYear.addEventListener('click', function () {
        chart.dispatchAction({
          type: 'legendToggleSelect',
          name: 'previousYear'
        });
      });
    }
  };


/* -------------------------------------------------------------------------- */

/*                            Theme Initialization                            */

/* -------------------------------------------------------------------------- */
docReady(totalSalesEcommerce);
docReady(totalOrderInit);
docReady(weeklySalesInit);
docReady(productShareDoughnutInit);
