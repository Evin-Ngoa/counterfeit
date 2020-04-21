"use strict";

function is_display_type(e) {
    return $(".display-type").css("content") == e || $(".display-type").css("content") == '"' + e + '"'
}

function not_display_type(e) {
    return $(".display-type").css("content") != e && $(".display-type").css("content") != '"' + e + '"'
}

function os_init_sub_menus() {
    var e;
    $(".menu-activated-on-hover").on("mouseenter", "ul.main-menu > li.has-sub-menu", (function() {
        var t = $(this);
        clearTimeout(e), t.closest("ul").addClass("has-active").find("> li").removeClass("active"), t.addClass("active")
    })), $(".menu-activated-on-hover").on("mouseleave", "ul.main-menu > li.has-sub-menu", (function() {
        var t = $(this);
        e = setTimeout((function() {
            t.removeClass("active").closest("ul").removeClass("has-active")
        }), 30)
    })), $(".menu-activated-on-click").on("click", "li.has-sub-menu > a", (function(e) {
        var t = $(this).closest("li");
        return t.hasClass("active") ? t.removeClass("active") : (t.closest("ul").find("li.active").removeClass("active"), t.addClass("active")), !1
    }))
}
$((function() {
    function e(e) {
        $(".chat-content").append('<div class="chat-message self"><div class="chat-message-content-w"><div class="chat-message-content">' + e.val() + '</div></div><div class="chat-message-date">1:23pm</div><div class="chat-message-avatar"><img alt="" src="img/avatar1.jpg"></div></div>'), e.val("");
        var t = $(".chat-content-w");
        t.scrollTop(t[0].scrollHeight)
    }
    var t, o, a, s, n, r;
    ($(".floated-chat-btn, .floated-chat-w .chat-close").on("click", (function() {
        return $(".floated-chat-w").toggleClass("active"), !1
    })), $(".message-input").on("keypress", (function(e) {
        if (13 == e.which) {
            $(".chat-messages").append('<div class="message self"><div class="message-content">' + $(this).val() + "</div></div>"), $(this).val("");
            var t = $(".floated-chat-w .chat-messages");
            return t.scrollTop(t.prop("scrollHeight")), t.perfectScrollbar("update"), !1
        }
    })), $(".floated-chat-w .chat-messages").perfectScrollbar(), $("#fullCalendar").length) && (o = (a = new Date).getDate(), s = a.getMonth(), n = a.getFullYear(), t = $("#fullCalendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        selectable: !0,
        selectHelper: !0,
        select: function e(o, a, s) {
            var n;
            return (n = prompt("Event Title:")) && t.fullCalendar("renderEvent", {
                title: n,
                start: o,
                end: a,
                allDay: s
            }, !0), t.fullCalendar("unselect")
        },
        editable: !0,
        events: [{
            title: "Long Event",
            start: new Date(n, s, 3, 12, 0),
            end: new Date(n, s, 7, 14, 0)
        }, {
            title: "Lunch",
            start: new Date(n, s, o, 12, 0),
            end: new Date(n, s, o + 2, 14, 0),
            allDay: !1
        }, {
            title: "Click for Google",
            start: new Date(n, s, 28),
            end: new Date(n, s, 29),
            url: "http://google.com/"
        }]
    }));
    if ($("#formValidate").length && $("#formValidate").validator(), $("input.single-daterange").daterangepicker({
            singleDatePicker: !0,
            locale: {
                format: "DD/MM/YYYY"
            }
        }), $("input.multi-daterange").daterangepicker({
            startDate: "03/28/2017",
            endDate: "04/06/2017"
        }), $("#formValidate").length && $("#formValidate").validator(), $("#dataTable1").length && $("#dataTable1").DataTable({
            buttons: ["copy", "excel", "pdf"]
        }), $("#editableTable").length && $("#editableTable").editableTableWidget(), $(".step-trigger-btn").on("click", (function() {
            var e = $(this).attr("href");
            return $('.step-trigger[href="' + e + '"]').click(), !1
        })), $(".step-trigger").on("click", (function() {
            var e = $(this).prev(".step-trigger");
            if (e.length && !e.hasClass("active") && !e.hasClass("complete")) return !1;
            var t = $(this).attr("href");
            return $(this).closest(".step-triggers").find(".step-trigger").removeClass("active"), $(this).prev(".step-trigger").addClass("complete"), $(this).addClass("active"), $(".step-content").removeClass("active"), $(".step-content" + t).addClass("active"), !1
        })), $(".select2").length && $(".select2").select2({
            width: 'resolve'
        }), $("#ckeditor1").length && CKEDITOR.replace("ckeditor1"), "undefined" != typeof Chart) {
        var i = '"Proxima Nova W01", -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
        if (Chart.defaults.global.defaultFontFamily = i, Chart.defaults.global.tooltips.titleFontSize = 14, Chart.defaults.global.tooltips.titleMarginBottom = 4, Chart.defaults.global.tooltips.displayColors = !1, Chart.defaults.global.tooltips.bodyFontSize = 12, Chart.defaults.global.tooltips.xPadding = 10, Chart.defaults.global.tooltips.yPadding = 8, $("#liteLineChart").length) {
            var l = $("#liteLineChart"),
                d = l[0].getContext("2d").createLinearGradient(0, 0, 0, 200);
            d.addColorStop(0, "rgba(30,22,170,0.08)"), d.addColorStop(1, "rgba(30,22,170,0)");
            var c = [13, 28, 19, 24, 43, 49];
            l.data("chart-data") && (c = l.data("chart-data").split(","));
            var u, f = new Chart(l, {
                type: "line",
                data: {
                    labels: ["January 1", "January 5", "January 10", "January 15", "January 20", "January 25"],
                    datasets: [{
                        label: "Sold",
                        fill: !0,
                        lineTension: .4,
                        backgroundColor: d,
                        borderColor: "#8f1cad",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "#2a2f37",
                        pointBorderWidth: 2,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: "#FC2055",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 4,
                        pointHitRadius: 5,
                        data: c,
                        spanGaps: !1
                    }]
                },
                options: {
                    legend: {
                        display: !1
                    },
                    scales: {
                        xAxes: [{
                            display: !1,
                            ticks: {
                                fontSize: "11",
                                fontColor: "#969da5"
                            },
                            gridLines: {
                                color: "rgba(0,0,0,0.0)",
                                zeroLineColor: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            display: !1,
                            ticks: {
                                beginAtZero: !0,
                                max: 55
                            }
                        }]
                    }
                }
            })
        }
        if ($("#liteLineChartV2").length) {
            var g = $("#liteLineChartV2"),
                p = g[0].getContext("2d").createLinearGradient(0, 0, 0, 100);
            p.addColorStop(0, "rgba(40,97,245,0.1)"), p.addColorStop(1, "rgba(40,97,245,0)");
            var h = [13, 28, 19, 24, 43, 49, 40, 35, 42, 46];
            g.data("chart-data") && (h = g.data("chart-data").split(","));
            var C, b = new Chart(g, {
                type: "line",
                data: {
                    labels: ["1", "3", "6", "9", "12", "15", "18", "21", "24", "27"],
                    datasets: [{
                        label: "Balance",
                        fill: !0,
                        lineTension: .35,
                        backgroundColor: p,
                        borderColor: "#2861f5",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#2861f5",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 2,
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "#FC2055",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 3,
                        pointHitRadius: 10,
                        data: h,
                        spanGaps: !1
                    }]
                },
                options: {
                    legend: {
                        display: !1
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: "10",
                                fontColor: "#969da5"
                            },
                            gridLines: {
                                color: "rgba(0,0,0,0.0)",
                                zeroLineColor: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            display: !1,
                            ticks: {
                                beginAtZero: !0,
                                max: 55
                            }
                        }]
                    }
                }
            })
        }
        if ($("#liteLineChartV3").length) {
            var v = $("#liteLineChartV3"),
                m = v[0].getContext("2d").createLinearGradient(0, 0, 0, 70);
            m.addColorStop(0, "rgba(40,97,245,0.2)"), m.addColorStop(1, "rgba(40,97,245,0)");
            var k = [13, 28, 19, 24, 43, 49, 40, 35, 42, 46, 38];
            v.data("chart-data") && (k = v.data("chart-data").split(","));
            var y, w = new Chart(v, {
                type: "line",
                data: {
                    labels: ["", "FEB", "", "MAR", "", "APR", "", "MAY", "", "JUN", "", "JUL", ""],
                    datasets: [{
                        label: "Balance",
                        fill: !0,
                        lineTension: .15,
                        backgroundColor: m,
                        borderColor: "#2861f5",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#2861f5",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 2,
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "#FC2055",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 0,
                        pointRadius: 0,
                        pointHitRadius: 10,
                        data: k,
                        spanGaps: !1
                    }]
                },
                options: {
                    legend: {
                        display: !1
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: "10",
                                fontColor: "#969da5"
                            },
                            gridLines: {
                                color: "rgba(0,0,0,0.0)",
                                zeroLineColor: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            display: !1,
                            ticks: {
                                beginAtZero: !0,
                                max: 55
                            }
                        }]
                    }
                }
            })
        }
        if ($("#lineChart").length) var B = $("#lineChart"),
            x, S = new Chart(B, {
                type: "line",
                data: {
                    labels: ["1", "5", "10", "15", "20", "25", "30", "35"],
                    datasets: [{
                        label: "Visitors Graph",
                        fill: !1,
                        lineTension: .3,
                        backgroundColor: "#fff",
                        borderColor: "#047bf8",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        borderJoinStyle: "miter",
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "#141E41",
                        pointBorderWidth: 3,
                        pointHoverRadius: 10,
                        pointHoverBackgroundColor: "#FC2055",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 3,
                        pointRadius: 5,
                        pointHitRadius: 10,
                        data: [27, 20, 44, 24, 29, 22, 43, 52],
                        spanGaps: !1
                    }]
                },
                options: {
                    legend: {
                        display: !1
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: "11",
                                fontColor: "#969da5"
                            },
                            gridLines: {
                                color: "rgba(0,0,0,0.05)",
                                zeroLineColor: "rgba(0,0,0,0.05)"
                            }
                        }],
                        yAxes: [{
                            display: !1,
                            ticks: {
                                beginAtZero: !0,
                                max: 65
                            }
                        }]
                    }
                }
            });
        if ($("#barChart1").length) {
            var D = $("#barChart1"),
                A;
            new Chart(D, {
                type: "bar",
                data: {
                    labels: ["January", "February", "March", "April", "May", "June"],
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: ["#5797FC", "#629FFF", "#6BA4FE", "#74AAFF", "#7AAEFF", "#85B4FF"],
                        borderColor: ["rgba(255,99,132,0)", "rgba(54, 162, 235, 0)", "rgba(255, 206, 86, 0)", "rgba(75, 192, 192, 0)", "rgba(153, 102, 255, 0)", "rgba(255, 159, 64, 0)"],
                        borderWidth: 1,
                        data: [24, 42, 18, 34, 56, 28]
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: !1,
                            ticks: {
                                fontSize: "11",
                                fontColor: "#969da5"
                            },
                            gridLines: {
                                color: "rgba(0,0,0,0.05)",
                                zeroLineColor: "rgba(0,0,0,0.05)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: !0
                            },
                            gridLines: {
                                color: "rgba(0,0,0,0.05)",
                                zeroLineColor: "#6896f9"
                            }
                        }]
                    },
                    legend: {
                        display: !1
                    },
                    animation: {
                        animateScale: !0
                    }
                }
            })
        }
        if ($("#pieChart1").length) {
            var T = $("#pieChart1"),
                L;
            new Chart(T, {
                type: "pie",
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple"],
                    datasets: [{
                        data: [300, 50, 100, 30, 70],
                        backgroundColor: ["#5797fc", "#7e6fff", "#4ecc48", "#ffcc29", "#f37070"],
                        hoverBackgroundColor: ["#5797fc", "#7e6fff", "#4ecc48", "#ffcc29", "#f37070"],
                        borderWidth: 0
                    }]
                },
                options: {
                    legend: {
                        position: "bottom",
                        labels: {
                            boxWidth: 15,
                            fontColor: "#3e4b5b"
                        }
                    },
                    animation: {
                        animateScale: !0
                    }
                }
            })
        }
        if ($("#donutChart").length) {
            var H = $("#donutChart"),
                R;
            new Chart(H, {
                type: "doughnut",
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple"],
                    datasets: [{
                        data: [300, 50, 100, 30, 70],
                        backgroundColor: ["#5797fc", "#7e6fff", "#4ecc48", "#ffcc29", "#f37070"],
                        hoverBackgroundColor: ["#5797fc", "#7e6fff", "#4ecc48", "#ffcc29", "#f37070"],
                        borderWidth: 0
                    }]
                },
                options: {
                    legend: {
                        display: !1
                    },
                    animation: {
                        animateScale: !0
                    },
                    cutoutPercentage: 80
                }
            })
        }
        if ($("#donutChart1").length) {
            var F = $("#donutChart1"),
                W;
            new Chart(F, {
                type: "doughnut",
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple"],
                    datasets: [{
                        data: [300, 50, 100, 30, 70],
                        backgroundColor: ["#5797fc", "#7e6fff", "#4ecc48", "#ffcc29", "#f37070"],
                        hoverBackgroundColor: ["#5797fc", "#7e6fff", "#4ecc48", "#ffcc29", "#f37070"],
                        borderWidth: 6,
                        hoverBorderColor: "transparent"
                    }]
                },
                options: {
                    legend: {
                        display: !1
                    },
                    animation: {
                        animateScale: !0
                    },
                    cutoutPercentage: 80
                }
            })
        }
    }
    if ($(".mobile-menu-trigger").on("click", (function() {
            return $(".menu-mobile .menu-and-user").slideToggle(200, "swing"), !1
        })), os_init_sub_menus(), $(".content-panel-toggler, .content-panel-close, .content-panel-open").on("click", (function() {
            $(".all-wrapper").toggleClass("content-panel-active")
        })), $(".more-messages").on("click", (function() {
            return $(this).hide(), $(".older-pack").slideDown(100), $(".aec-full-message-w.show-pack").removeClass("show-pack"), !1
        })), $(".ae-list").perfectScrollbar({
            wheelPropagation: !0
        }), $(".ae-list .ae-item").on("click", (function() {
            return $(".ae-item.active").removeClass("active"), $(this).addClass("active"), !1
        })), "undefined" != typeof CKEDITOR && (CKEDITOR.disableAutoInline = !0, $("#ckeditorEmail").length && (CKEDITOR.config.uiColor = "#ffffff", CKEDITOR.config.toolbar = [
            ["Bold", "Italic", "-", "NumberedList", "BulletedList", "-", "Link", "Unlink", "-", "About"]
        ], CKEDITOR.config.height = 110, CKEDITOR.replace("ckeditor1"))), $(".ae-side-menu-toggler").on("click", (function() {
            $(".app-email-w").toggleClass("compact-side-menu")
        })), $(".ae-item").on("click", (function() {
            $(".app-email-w").addClass("forse-show-content")
        })), $(".app-email-w").length && (is_display_type("phone") || is_display_type("tablet")) && $(".app-email-w").addClass("compact-side-menu"), $(".chat-btn a").on("click", (function() {
            return e($(".chat-input input")), !1
        })), $(".chat-input input").on("keypress", (function(t) {
            if (13 == t.which) return e($(this)), !1
        })), $(".pipeline").length) var E = dragula($(".pipeline-body").toArray(), {}).on("drag", (function() {})).on("drop", (function(e) {})).on("over", (function(e, t) {
        $(t).closest(".pipeline-body").addClass("over")
    })).on("out", (function(e, t, o) {
        var a;
        $(t).closest(".pipeline-body").removeClass("over");
        var s = $(o).closest(".pipeline-body")
    }));
    if ($(".os-dropdown-trigger").on("mouseenter", (function() {
            $(this).addClass("over")
        })), $(".os-dropdown-trigger").on("mouseleave", (function() {
            $(this).removeClass("over")
        })), $('[data-toggle="tooltip"]').tooltip(), $('[data-toggle="popover"]').popover(), $(".tasks-header-toggler").on("click", (function() {
            return $(this).closest(".tasks-section").find(".tasks-list-w").slideToggle(100), !1
        })), $(".todo-sidebar-section-toggle").on("click", (function() {
            return $(this).closest(".todo-sidebar-section").find(".todo-sidebar-section-contents").slideToggle(100), !1
        })), $(".todo-sidebar-section-sub-section-toggler").on("click", (function() {
            return $(this).closest(".todo-sidebar-section-sub-section").find(".todo-sidebar-section-sub-section-content").slideToggle(100), !1
        })), $(".tasks-list").length) var J = dragula($(".tasks-list").toArray(), {
        moves: function e(t, o, a) {
            return a.classList.contains("drag-handle")
        }
    }).on("drag", (function() {})).on("drop", (function(e) {})).on("over", (function(e, t) {
        $(t).closest(".tasks-list").addClass("over")
    })).on("out", (function(e, t, o) {
        var a;
        $(t).closest(".tasks-list").removeClass("over");
        var s = $(o).closest(".tasks-list")
    }));
    $(".task-btn-done").on("click", (function() {
        return $(this).closest(".draggable-task").toggleClass("complete"), !1
    })), $(".task-btn-star").on("click", (function() {
        return $(this).closest(".draggable-task").toggleClass("favorite"), !1
    })), $(".task-btn-delete").on("click", (function() {
        if (confirm("Are you sure you want to delete this task?")) {
            var e = $(this).closest(".draggable-task");
            e.addClass("pre-removed"), e.append('<a href="#" class="task-btn-undelete">Undo Delete</a>'), r = setTimeout((function() {
                e.slideUp(300, (function() {
                    $(this).remove()
                }))
            }), 5e3)
        }
        return !1
    })), $(".tasks-list").on("click", ".task-btn-undelete", (function() {
        return $(this).closest(".draggable-task").removeClass("pre-removed"), $(this).remove(), void 0 !== r && clearTimeout(r), !1
    })), $(".fs-selector-trigger").on("click", (function() {
        $(this).closest(".fancy-selector-w").toggleClass("opened")
    })), $(".close-ticket-info").on("click", (function() {
        return $(".support-ticket-content-w").addClass("folded-info").removeClass("force-show-folded-info"), !1
    })), $(".show-ticket-info").on("click", (function() {
        return $(".support-ticket-content-w").removeClass("folded-info").addClass("force-show-folded-info"), !1
    })), $(".support-index .support-tickets .support-ticket").on("click", (function() {
        return $(".support-index").addClass("show-ticket-content"), !1
    })), $(".support-index .back-to-index").on("click", (function() {
        return $(".support-index").removeClass("show-ticket-content"), !1
    })), $(".onboarding-modal.show-on-load").modal("hide"), $(".onboarding-modal .onboarding-slider-w").length && ($(".onboarding-modal .onboarding-slider-w").slick({
        dots: !0,
        infinite: !1,
        adaptiveHeight: !0,
        slidesToShow: 1,
        slidesToScroll: 1
    }), $(".onboarding-modal").on("shown.bs.modal", (function(e) {
        $(".onboarding-modal .onboarding-slider-w").slick("setPosition")
    }))), $(".floated-colors-btn").on("click", (function() {
        return $("body").hasClass("color-scheme-dark") ? ($(".menu-w").removeClass("color-scheme-dark").addClass("color-scheme-light").removeClass("selected-menu-color-bright").addClass("selected-menu-color-light"), $(this).find(".os-toggler-w").removeClass("on")) : ($(".menu-w, .top-bar").removeClass((function(e, t) {
            return (t.match(/(^|\s)color-scheme-\S+/g) || []).join(" ")
        })), $(".menu-w").removeClass((function(e, t) {
            return (t.match(/(^|\s)color-style-\S+/g) || []).join(" ")
        })), $(".menu-w").addClass("color-scheme-dark").addClass("color-style-transparent").removeClass("selected-menu-color-light").addClass("selected-menu-color-bright"), $(".top-bar").addClass("color-scheme-transparent"), $(this).find(".os-toggler-w").addClass("on")), $("body").toggleClass("color-scheme-dark"), !1
    })), $(".autosuggest-search-activator").on("click", (function() {
        var e = $(this).offset();
        $(this).find('input[type="text"]') && (e = $(this).find('input[type="text"]').offset());
        var t = e.left,
            o = e.top;
        return $(".search-with-suggestions-w").css("left", t).css("top", o).addClass("over-search-field").fadeIn(300).find(".search-suggest-input").focus(), !1
    })), $(".search-suggest-input").on("keydown", (function(e) {
        27 == e.which && $(".search-with-suggestions-w").fadeOut(), 46 != e.which && 8 != e.which || ($(".search-with-suggestions-w .ssg-item:last-child").show(), $(".search-with-suggestions-w .ssg-items.ssg-items-blocks").show(), $(".ssg-nothing-found").hide()), 27 != e.which && 8 != e.which && 46 != e.which && ($(".search-with-suggestions-w .ssg-item:last-child").hide(), $(".search-with-suggestions-w .ssg-items.ssg-items-blocks").hide(), $(".ssg-nothing-found").show())
    })), $(".close-search-suggestions").on("click", (function() {
        return $(".search-with-suggestions-w").fadeOut(), !1
    })), $(".element-action-fold").on("click", (function() {
        var e = $(this).closest(".element-wrapper");
        e.find(".element-box-tp, .element-box").toggle(0);
        var t = $(this).find("i");
        return e.hasClass("folded") ? (t.removeClass("os-icon-plus-circle").addClass("os-icon-minus-circle"), e.removeClass("folded")) : (t.removeClass("os-icon-minus-circle").addClass("os-icon-plus-circle"), e.addClass("folded")), !1
    }))
}));