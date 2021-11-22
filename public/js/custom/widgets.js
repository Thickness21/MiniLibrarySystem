"use strict";
var KTWidgets = (function () {
  var e = function (e, t, a, o) {
    var s = document.querySelector(t),
      r = parseInt(KTUtil.css(s, "height"));
    if (s) {
      var i = {
          series: [
            {
              name: "Profit",
              data: a,
            },
          ],
          chart: {
            fontFamily: "inherit",
            type: "bar",
            width: "100%",
            height: r,
            toolbar: {
              show: !1,
            },
          },
          plotOptions: {
            bar: {
              horizontal: !1,
              columnWidth: ["30%"],
              borderRadius: 4,
            },
          },
          legend: {
            show: !1,
          },
          dataLabels: {
            enabled: !1,
          },
          stroke: {
            show: !0,
            width: 2,
            colors: ["transparent"],
          },
          xaxis: {
            crosshairs: {
              show: !1,
            },
            categories: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            axisBorder: {
              show: !1,
            },
            axisTicks: {
              show: !1,
            },
            labels: {
              style: {
                colors: KTUtil.getCssVariableValue("--bs-gray-400"),
                fontSize: "12px",
              },
            },
          },
          yaxis: {
            crosshairs: {
              show: !1,
            },
            labels: {
              style: {
                colors: KTUtil.getCssVariableValue("--bs-gray-400"),
                fontSize: "12px",
              },
            },
          },
          states: {
            normal: {
              filter: {
                type: "none",
                value: 0,
              },
            },
            hover: {
              filter: {
                type: "none",
              },
            },
            active: {
              allowMultipleDataPointsSelection: !1,
              filter: {
                type: "none",
                value: 0,
              },
            },
          },
          fill: {
            opacity: 1,
          },
          tooltip: {
            style: {
              fontSize: "12px",
            },
            y: {
              formatter: function (e) {
                return "$" + e + "k";
              },
            },
          },
          colors: [KTUtil.getCssVariableValue("--bs-primary")],
          grid: {
            borderColor: KTUtil.getCssVariableValue("--bs-gray-300"),
            strokeDashArray: 4,
            yaxis: {
              lines: {
                show: !0,
              },
            },
          },
        },
        l = new ApexCharts(s, i),
        n = !1,
        c = document.querySelector(e);
      !0 === o &&
        setTimeout(function () {
          l.render(), (n = !0);
        }, 500),
        c.addEventListener("shown.bs.tab", function (e) {
          0 == n && (l.render(), (n = !0));
        });
    }
  };
  return {
    init: function () {
      var t, a, o, s, r, i, l, n, c, d, u, h;
      !(function () {
        var e = document.getElementById("kt_chart_widget_2_chart"),
          t = parseInt(KTUtil.css(e, "height"));
        if (e) {
          var a = {
            labels: ["Total Members"],
            series: [74],
            chart: {
              fontFamily: "inherit",
              height: t,
              type: "radialBar",
              offsetY: 0,
            },
            plotOptions: {
              radialBar: {
                startAngle: -90,
                endAngle: 90,
                hollow: {
                  margin: 0,
                  size: "70%",
                },
                dataLabels: {
                  showOn: "always",
                  name: {
                    show: !0,
                    fontSize: "13px",
                    fontWeight: "700",
                    offsetY: -5,
                    color: KTUtil.getCssVariableValue("--bs-gray-500"),
                  },
                  value: {
                    color: KTUtil.getCssVariableValue("--bs-gray-700"),
                    fontSize: "30px",
                    fontWeight: "700",
                    offsetY: -40,
                    show: !0,
                  },
                },
                track: {
                  background: KTUtil.getCssVariableValue("--bs-light-primary"),
                  strokeWidth: "100%",
                },
              },
            },
            colors: [KTUtil.getCssVariableValue("--bs-primary")],
            stroke: {
              lineCap: "round",
            },
          };
          new ApexCharts(e, a).render();
        }
      })(),
        (t = document.getElementById("kt_chart_widget_3_chart")),
        parseInt(KTUtil.css(t, "height")),
        (a = KTUtil.getCssVariableValue("--bs-gray-400")),
        (o = KTUtil.getCssVariableValue("--bs-gray-200")),
        (s = KTUtil.getCssVariableValue("--bs-gray-200")),
        (r = KTUtil.getCssVariableValue("--bs-light-gray-200")),
        (i = KTUtil.getCssVariableValue("--bs-primary")),
        (l = KTUtil.getCssVariableValue("--bs-light-primary")),
        t &&
          new ApexCharts(t, {
            series: [
              {
                name: "Net Profit",
                data: [21, 21, 26, 26, 31, 31, 27],
              },
              {
                name: "Revenue",
                data: [12, 16, 16, 21, 21, 18, 18],
              },
            ],
            chart: {
              fontFamily: "inherit",
              type: "area",
              height: 220,
              toolbar: {
                show: !1,
              },
            },
            plotOptions: {},
            legend: {
              show: !1,
            },
            dataLabels: {
              enabled: !1,
            },
            fill: {
              type: "solid",
              opacity: 1,
            },
            stroke: {
              curve: "smooth",
            },
            xaxis: {
              categories: [
                "06 Sep",
                "13 Sep",
                "15 Sep",
                "17 Sep",
                "22 Sep",
                "26 Sep",
                "27 Sep",
              ],
              axisBorder: {
                show: !1,
              },
              axisTicks: {
                show: !1,
              },
              labels: {
                style: {
                  colors: a,
                  fontSize: "12px",
                },
              },
              crosshairs: {
                position: "front",
                stroke: {
                  color: a,
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                },
              },
            },
            yaxis: {
              labels: {
                style: {
                  colors: a,
                  fontSize: "12px",
                },
              },
            },
            states: {
              normal: {
                filter: {
                  type: "none",
                  value: 0,
                },
              },
              hover: {
                filter: {
                  type: "none",
                  value: 0,
                },
              },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: {
                  type: "none",
                  value: 0,
                },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
              },
              y: {
                formatter: function (e) {
                  return "$" + e + " thousands";
                },
              },
            },
            colors: [s, i],
            grid: {
              borderColor: o,
              strokeDashArray: 4,
              yaxis: {
                lines: {
                  show: !0,
                },
              },
            },
            markers: {
              colors: [r, l],
              strokeColor: [r, l],
              strokeWidth: 3,
            },
          }).render(),
        (n = document.querySelector("#kt_widget_11_load_more_btn")),
        (c = document.querySelector("#kt_widget_11")),
        n &&
          n.addEventListener("click", function (e) {
            e.preventDefault(),
              n.setAttribute("data-kt-indicator", "on"),
              setTimeout(function () {
                n.removeAttribute("data-kt-indicator"),
                  c.classList.remove("d-none"),
                  n.classList.add("d-none"),
                  KTUtil.scrollTo(c, 200);
              }, 2e3);
          }),
        e(
          "#kt_charts_widget_12_tab_1",
          "#kt_charts_widget_12_chart_1",
          [30, 40, 30, 25, 40, 45, 30, 20, 40, 25, 20, 30],
          !0
        ),
        e(
          "#kt_charts_widget_12_tab_2",
          "#kt_charts_widget_12_chart_2",
          [25, 30, 25, 45, 30, 40, 30, 25, 40, 20, 25, 30],
          !1
        ),
        (d = document.querySelectorAll(".widget-17-chart")),
        [].slice.call(d).map(function (e) {
          var t = parseInt(KTUtil.css(e, "height"));
          if (e) {
            var a = e.getAttribute("data-kt-chart-color"),
              o = KTUtil.getCssVariableValue("--bs-gray-800"),
              s = KTUtil.getCssVariableValue("--bs-gray-300"),
              r = KTUtil.getCssVariableValue("--bs-" + a),
              i = KTUtil.getCssVariableValue("--bs-light-" + a);
            new ApexCharts(e, {
              series: [
                {
                  name: "Net Profit",
                  data: [30, 30, 60, 25, 25, 40],
                },
              ],
              chart: {
                fontFamily: "inherit",
                type: "area",
                height: t,
                toolbar: {
                  show: !1,
                },
                zoom: {
                  enabled: !1,
                },
                sparkline: {
                  enabled: !0,
                },
              },
              plotOptions: {},
              legend: {
                show: !1,
              },
              dataLabels: {
                enabled: !1,
              },
              fill: {
                type: "solid",
                opacity: 1,
              },
              fill1: {
                type: "gradient",
                opacity: 1,
                gradient: {
                  type: "vertical",
                  shadeIntensity: 0.5,
                  gradientToColors: void 0,
                  inverseColors: !0,
                  opacityFrom: 1,
                  opacityTo: 0.375,
                  stops: [25, 50, 100],
                  colorStops: [],
                },
              },
              stroke: {
                curve: "smooth",
                show: !0,
                width: 3,
                colors: [r],
              },
              xaxis: {
                categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                axisBorder: {
                  show: !1,
                },
                axisTicks: {
                  show: !1,
                },
                labels: {
                  show: !1,
                  style: {
                    colors: o,
                    fontSize: "12px",
                  },
                },
                crosshairs: {
                  show: !1,
                  position: "front",
                  stroke: {
                    color: s,
                    width: 1,
                    dashArray: 3,
                  },
                },
                tooltip: {
                  enabled: !0,
                  formatter: void 0,
                  offsetY: 0,
                  style: {
                    fontSize: "12px",
                  },
                },
              },
              yaxis: {
                min: 0,
                max: 65,
                labels: {
                  show: !1,
                  style: {
                    colors: o,
                    fontSize: "12px",
                  },
                },
              },
              states: {
                normal: {
                  filter: {
                    type: "none",
                    value: 0,
                  },
                },
                hover: {
                  filter: {
                    type: "none",
                    value: 0,
                  },
                },
                active: {
                  allowMultipleDataPointsSelection: !1,
                  filter: {
                    type: "none",
                    value: 0,
                  },
                },
              },
              tooltip: {
                style: {
                  fontSize: "12px",
                },
                y: {
                  formatter: function (e) {
                    return "$" + e + " thousands";
                  },
                },
              },
              colors: [i],
              markers: {
                colors: [i],
                strokeColor: [r],
                strokeWidth: 3,
              },
            }).render();
          }
        }),
        (u = document.querySelector("#kt_user_follow_button")) &&
          u.addEventListener("click", function (e) {
            e.preventDefault(),
              u.setAttribute("data-kt-indicator", "on"),
              (u.disabled = !0),
              u.classList.contains("btn-success")
                ? setTimeout(function () {
                    u.removeAttribute("data-kt-indicator"),
                      u.classList.remove("btn-success"),
                      u.classList.add("btn-light"),
                      u.querySelector(".svg-icon").classList.add("d-none"),
                      (u.querySelector(".indicator-label").innerHTML =
                        "Follow"),
                      (u.disabled = !1);
                  }, 1500)
                : setTimeout(function () {
                    u.removeAttribute("data-kt-indicator"),
                      u.classList.add("btn-success"),
                      u.classList.remove("btn-light"),
                      u.querySelector(".svg-icon").classList.remove("d-none"),
                      (u.querySelector(".indicator-label").innerHTML =
                        "Following"),
                      (u.disabled = !1);
                  }, 1e3);
          }),
        (h = document.querySelector("#kt_user_menu_dark_mode_toggle")) &&
          h.addEventListener("click", function () {
            window.location.href = this.getAttribute("data-kt-url");
          });
    },
  };
})();
KTUtil.onDOMContentLoaded(function () {
  KTWidgets.init();
});
