"use strict";
$(document).ready(function() {
  $(".assign-style").slimscroll({
    height: "449px",
    size: "5px"
  });
  $(".media-list").slimscroll({
    height: "405px",
    size: "5px"
  });
  $("#chat-conversation").slimscroll({
    height: "277px",
    size: "5px"
  });
  $(".table-assign-task").slimscroll({
    height: "440px",
    size: "5px"
  });
  desktopCalendar();
});

function desktopCalendar() {
  var startdate;
  var enddate;
  var today = new Date();
  var year = today.getFullYear();
  var month = today.getMonth();
  var day = today.getDate();
  $("#desktopCal").fullCalendar({
    defaultDate: today,
    defaultView: "month",
    navLinks: true,
    selectable: true,
    selectHelper: true,
    editable: true,
    header: {
      right: "prev,today,next"
    },
    events: [
      {
        title: "Holiday",
        start: new Date(year, month, day - 10),
        end: new Date(year, month, day - 8),
        backgroundColor: "#00bcd4"
      },
      {
        title: "Priya Sarma",
        start: new Date(year, month, day - 3, 13, 30),
        end: new Date(year, month, day - 3, 14, 10),
        backgroundColor: "#fe9701"
      },
      {
        title: "Meeting",
        start: new Date(year, month, day - 6, 17, 30),
        end: new Date(year, month, day - 6, 18, 10),
        backgroundColor: "#F3565D"
      },
      {
        title: "Sarah Smith",
        start: new Date(year, month, day, 19, 10),
        end: new Date(year, month, day, 19, 30),
        backgroundColor: "#1bbc9b"
      },
      {
        title: "Airi Satou",
        start: new Date(year, month, day + 1, 19, 10),
        end: new Date(year, month, day + 1, 19, 30),
        backgroundColor: "#DC35A9"
      },
      {
        title: "Angelica Ramos",
        start: new Date(year, month, day + 3, 21, 10),
        end: new Date(year, month, day + 3, 21, 30),
        backgroundColor: "#fe9701"
      },
      {
        title: "Palak Jani",
        start: new Date(year, month, day + 10, 11, 30),
        end: new Date(year, month, day + 10, 12, 10),
        backgroundColor: "#00bcd4"
      },
      {
        title: "Priya Sarma",
        start: new Date(year, month, day + 5, 2, 30),
        end: new Date(year, month, day + 7, 3, 10),
        backgroundColor: "#9b59b6"
      },
      {
        title: "Jay Soni",
        start: new Date(year, month, day + 17, 2, 30),
        end: new Date(year, month, day + 19, 3, 10),
        backgroundColor: "#1bbc9b"
      }
    ]
  });
}
