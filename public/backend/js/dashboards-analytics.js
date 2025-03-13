(() => {
    var t, e = config.colors.cardColor,
        a = config.colors.textMuted,
        o = config.colors.headingColor,
        r = ((r = document.querySelector("#swiper-with-pagination-cards")) && new Swiper(r, {
            loop: !0,
            autoplay: {
                delay: 2500,
                disableOnInteraction: !1
            },
            pagination: {
                clickable: !0,
                el: ".swiper-pagination"
            }
        }), document.querySelector("#averageDailySales")),
        s = {
            chart: {
                height: 105,
                type: "area",
                toolbar: {
                    show: !1
                },
                sparkline: {
                    enabled: !0
                }
            },
            markers: {
                colors: "transparent",
                strokeColors: "transparent"
            },
            grid: {
                show: !1
            },
            colors: [config.colors.success],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: .4,
                    gradientToColors: [config.colors.cardColor],
                    opacityTo: .1,
                    stops: [0, 100]
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                width: 2,
                curve: "smooth"
            },
            series: [{
                data: [500, 160, 930, 670]
            }],
            xaxis: {
                show: !0,
                lines: {
                    show: !1
                },
                labels: {
                    show: !1
                },
                stroke: {
                    width: 0
                },
                axisBorder: {
                    show: !1
                }
            },
            yaxis: {
                stroke: {
                    width: 0
                },
                show: !1
            },
            tooltip: {
                enabled: !1
            },
            responsive: [{
                breakpoint: 1387,
                options: {
                    chart: {
                        height: 80
                    }
                }
            }, {
                breakpoint: 1200,
                options: {
                    chart: {
                        height: 123
                    }
                }
            }]
        },
        r = (null !== r && new ApexCharts(r, s).render(), document.querySelector("#weeklyEarningReports")),
        s = {
            chart: {
                height: 161,
                parentHeightOffset: 0,
                type: "bar",
                toolbar: {
                    show: !1
                }
            },
            plotOptions: {
                bar: {
                    barHeight: "60%",
                    columnWidth: "38%",
                    startingShape: "rounded",
                    endingShape: "rounded",
                    borderRadius: 4,
                    distributed: !0
                }
            },
            grid: {
                show: !1,
                padding: {
                    top: -30,
                    bottom: 0,
                    left: -10,
                    right: -10
                }
            },
            colors: [config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors.primary, config.colors_label.primary, config.colors_label.primary],
            dataLabels: {
                enabled: !1
            },
            series: [{
                data: [40, 65, 50, 45, 90, 55, 70]
            }],
            legend: {
                show: !1
            },
            xaxis: {
                categories: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                axisBorder: {
                    show: !1
                },
                axisTicks: {
                    show: !1
                },
                labels: {
                    style: {
                        colors: a,
                        fontSize: "13px",
                        fontFamily: i
                    }
                }
            },
            yaxis: {
                labels: {
                    show: !1
                }
            },
            tooltip: {
                enabled: !1
            },
            responsive: [{
                breakpoint: 1025,
                options: {
                    chart: {
                        height: 199
                    }
                }
            }],
            states: {
                hover: {
                    filter: {
                        type: "none"
                    }
                },
                active: {
                    filter: {
                        type: "none"
                    }
                }
            }
        },
        r = (null !== r && new ApexCharts(r, s).render(), document.querySelector("#supportTracker")),
        s = {
            series: [85],
            labels: ["Completed Task"],
            chart: {
                height: 337,
                type: "radialBar"
            },
            plotOptions: {
                radialBar: {
                    offsetY: 10,
                    startAngle: -140,
                    endAngle: 130,
                    hollow: {
                        size: "65%"
                    },
                    track: {
                        background: e,
                        strokeWidth: "100%"
                    },
                    dataLabels: {
                        name: {
                            offsetY: -20,
                            color: a,
                            fontSize: "13px",
                            fontWeight: "400",
                            fontFamily: i
                        },
                        value: {
                            offsetY: 10,
                            color: o,
                            fontSize: "38px",
                            fontWeight: "400",
                            fontFamily: i
                        }
                    }
                }
            },
            colors: [config.colors.primary],
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    shadeIntensity: .5,
                    gradientToColors: [config.colors.primary],
                    inverseColors: !0,
                    opacityFrom: 1,
                    opacityTo: .6,
                    stops: [30, 70, 100]
                }
            },
            stroke: {
                dashArray: 10
            },
            grid: {
                padding: {
                    top: -20,
                    bottom: 5
                }
            },
            states: {
                hover: {
                    filter: {
                        type: "none"
                    }
                },
                active: {
                    filter: {
                        type: "none"
                    }
                }
            },
            responsive: [{
                breakpoint: 1025,
                options: {
                    chart: {
                        height: 330
                    }
                }
            }, {
                breakpoint: 769,
                options: {
                    chart: {
                        height: 280
                    }
                }
            }]
        },
        a = (null !== r && new ApexCharts(r, s).render(), document.querySelector("#totalEarningChart")),
        o = {
            chart: {
                height: 175,
                parentHeightOffset: 0,
                stacked: !0,
                type: "bar",
                toolbar: {
                    show: !1
                }
            },
            series: [{
                name: "Earning",
                data: [300, 200, 350, 150, 250, 325, 250, 270]
            }, {
                name: "Expense",
                data: [-180, -225, -180, -280, -125, -200, -125, -150]
            }],
            tooltip: {
                enabled: !1
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "40%",
                    borderRadius: 7,
                    startingShape: "rounded",
                    endingShape: "rounded",
                    borderRadiusApplication: "around",
                    borderRadiusWhenStacked: "last"
                }
            },
            colors: [config.colors.primary, config.colors.secondary],
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth",
                width: 5,
                lineCap: "round",
                colors: [e]
            },
            legend: {
                show: !1
            },
            colors: [config.colors.primary, config.colors.secondary],
            fill: {
                opacity: 1
            },
            grid: {
                show: !1,
                padding: {
                    top: -40,
                    bottom: -40,
                    left: -10,
                    right: -2
                }
            },
            xaxis: {
                labels: {
                    show: !1
                },
                axisTicks: {
                    show: !1
                },
                axisBorder: {
                    show: !1
                }
            },
            yaxis: {
                labels: {
                    show: !1
                }
            },
            responsive: [{
                breakpoint: 1700,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: "43%"
                        }
                    }
                }
            }, {
                breakpoint: 1441,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: "50%"
                        }
                    }
                }
            }, {
                breakpoint: 1300,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 6,
                            columnWidth: "60%"
                        }
                    }
                }
            }, {
                breakpoint: 1200,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 6,
                            columnWidth: "30%"
                        }
                    }
                }
            }, {
                breakpoint: 991,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 6,
                            columnWidth: "35%"
                        }
                    }
                }
            }, {
                breakpoint: 850,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: "50%"
                        }
                    }
                }
            }, {
                breakpoint: 768,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: "30%"
                        }
                    }
                }
            }, {
                breakpoint: 476,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: "43%"
                        }
                    }
                }
            }, {
                breakpoint: 394,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: "58%"
                        }
                    }
                }
            }],
            states: {
                hover: {
                    filter: {
                        type: "none"
                    }
                },
                active: {
                    filter: {
                        type: "none"
                    }
                }
            }
        },
        i = (null !== a && new ApexCharts(a, o).render(), document.querySelector(".datatable-project"));
    i && ((r = document.createElement("h5")).classList.add("card-title", "mb-0", "text-md-start", "text-center", "pt-md-0", "pt-6"), r.innerHTML = "Project List", t = new DataTable(i, {
        ajax: assetsPath + "json/user-profile.json",
        columns: [{
            data: "id"
        }, {
            data: "id",
            orderable: !1,
            render: DataTable.render.select()
        }, {
            data: "project_name"
        }, {
            data: "project_leader"
        }, {
            data: "id"
        }, {
            data: "status"
        }, {
            data: "id"
        }],
        columnDefs: [{
            className: "control",
            searchable: !1,
            orderable: !1,
            responsivePriority: 2,
            targets: 0,
            render: function (e, t, a, o) {
                return ""
            }
        }, {
            targets: 1,
            orderable: !1,
            searchable: !1,
            responsivePriority: 3,
            checkboxes: !0,
            checkboxes: {
                selectAllRender: '<input type="checkbox" class="form-check-input">'
            },
            render: function () {
                return '<input type="checkbox" class="dt-checkboxes form-check-input">'
            }
        }, {
            targets: 2,
            responsivePriority: 4,
            render: function (e, t, a, o) {
                var r = a.project_img,
                    s = a.project_name,
                    a = a.date;
                return '<div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">' + (r ? '<img src="' + assetsPath + "img/icons/brands/" + r + '" alt="Avatar" class="rounded-circle">' : '<span class="avatar-initial rounded-circle bg-label-' + ["success", "danger", "warning", "info", "primary", "secondary"][Math.floor(6 * Math.random())] + '">' + (r = (((r = s.match(/\b\w/g) || []).shift() || "") + (r.pop() || "")).toUpperCase()) + "</span>") + '</div></div><div class="d-flex flex-column gap-50"><span class="text-truncate fw-medium text-heading">' + s + '</span><small class="text-truncate">' + a + "</small></div></div>"
            }
        }, {
            targets: 3,
            render: function (e, t, a, o) {
                return '<span class="text-heading">' + a.project_leader + "</span>"
            }
        }, {
            targets: 4,
            orderable: !1,
            searchable: !1,
            render: function (e, t, a, o) {
                var r = a.team;
                let s = "",
                    i = 0;
                for (let e = 0; e < r.length && (s += `
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Karlos" class="avatar avatar-sm pull-up">
                  <img class="rounded-circle" src="${assetsPath}img/avatars/${r[e]}" alt="Avatar">
                </li>
              `, !(2 < ++i)); e++);
                return 2 < i && 0 < (a = r.length - 3) && (s += `
                  <li class="avatar avatar-sm">
                    <span class="avatar-initial rounded-circle pull-up" data-bs-toggle="tooltip" data-bs-placement="top" title="${a} more">+${a}</span>
                  </li>
                `), `
              <div class="d-flex align-items-center">
                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 z-2">
                  ${s}
                </ul>
              </div>
            `
            }
        }, {
            targets: -2,
            render: function (e, t, a, o) {
                a = a.status;
                return `
              <div class="d-flex align-items-center">
                <div class="progress w-100 me-3" style="height: 6px;">
                  <div class="progress-bar" style="width: ${a}" aria-valuenow="${a}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="text-heading">${a}</span>
              </div>
            `
            }
        }, {
            targets: -1,
            searchable: !1,
            title: "Action",
            orderable: !1,
            render: function (e, t, a, o) {
                return '<div class="d-inline-block"><a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-22px"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Details</a><a href="javascript:;" class="dropdown-item">Archive</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></div></div>'
            }
        }],
        select: {
            style: "multi",
            selector: "td:nth-child(2)"
        },
        order: [
            [2, "desc"]
        ],
        layout: {
            topStart: {
                rowClass: "row mx-md-3 my-0 justify-content-between",
                features: [r]
            },
            topEnd: {
                search: {
                    placeholder: "Search Project",
                    text: "_INPUT_"
                }
            },
            bottomStart: {
                rowClass: "row mx-3 justify-content-between",
                features: ["info"]
            },
            bottomEnd: "paging"
        },
        displayLength: 5,
        language: {
            paginate: {
                next: '<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',
                previous: '<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',
                first: '<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',
                last: '<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>'
            }
        },
        responsive: {
            details: {
                display: DataTable.Responsive.display.modal({
                    header: function (e) {
                        return "Details of " + e.data().project_name
                    }
                }),
                type: "column",
                renderer: function (e, t, a) {
                    var o, r, s, a = a.map(function (e) {
                        return "" !== e.title ? `<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
                      <td>${e.title}:</td>
                      <td>${e.data}</td>
                    </tr>` : ""
                    }).join("");
                    return !!a && ((o = document.createElement("div")).classList.add("table-responsive"), r = document.createElement("table"), o.appendChild(r), r.classList.add("table"), (s = document.createElement("tbody")).innerHTML = a, r.appendChild(s), o)
                }
            }
        }
    }), document.addEventListener("click", function (e) {
        e.target.classList.contains("delete-record") && (t.row(e.target.closest("tr")).remove().draw(), e = document.querySelector(".dtr-bs-modal")) && e.classList.contains("show") && bootstrap.Modal.getInstance(e) ? .hide()
    })), setTimeout(() => {
        [{
            selector: ".dt-search .form-control",
            classToRemove: "form-control-sm"
        }, {
            selector: ".dt-length .form-select",
            classToRemove: "form-select-sm",
            classToAdd: "ms-0"
        }, {
            selector: ".dt-length",
            classToAdd: "mb-md-6 mb-0"
        }, {
            selector: ".dt-buttons",
            classToAdd: "justify-content-center"
        }, {
            selector: ".dt-layout-table",
            classToRemove: "row mt-2"
        }, {
            selector: ".dt-layout-end",
            classToAdd: "gap-md-2 gap-0 mt-0"
        }, {
            selector: ".dt-layout-full",
            classToRemove: "col-md col-12",
            classToAdd: "table-responsive"
        }].forEach(({
            selector: e,
            classToRemove: a,
            classToAdd: o
        }) => {
            document.querySelectorAll(e).forEach(t => {
                a && a.split(" ").forEach(e => t.classList.remove(e)), o && o.split(" ").forEach(e => t.classList.add(e))
            })
        })
    }, 100)
})();
