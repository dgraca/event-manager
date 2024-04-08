// (function () {
//     "use strict";

//     if ($("#calendar").length) {
//         if ($("#calendar-event").length) {
//             new Draggable($("#calendar-event")[0], {
//                 itemSelector: ".event",
//                 eventData: function (eventEl) {
//                     return {
//                         title: $(eventEl).find(".event__title").html(),
//                         duration: {
//                             days: parseInt(
//                                 $(eventEl).find(".event__days").text()
//                             ),
//                         },
//                     };
//                 },
//             });
//         }

//         let calendar = new Calendar($("#calendar")[0], {
//             plugins: [
//                 interactionPlugin,
//                 dayGridPlugin,
//                 timeGridPlugin,
//                 listPlugin,
//             ],
//             droppable: true,
//             headerToolbar: {
//                 left: "prev,next today",
//                 center: "title",
//                 right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
//             },
//             initialDate: "2021-01-12",
//             navLinks: true,
//             editable: true,
//             dayMaxEvents: true,
//             event: [
//                 {
//                     title: "Vue Vixens Day",
//                     start: "2021-01-05",
//                     end: "2021-01-08",
//                 },
//                 {
//                     title: "VueConfUS",
//                     start: "2021-01-11",
//                     end: "2021-01-15",
//                 },
//                 {
//                     title: "VueJS Amsterdam",
//                     start: "2021-01-17",
//                     end: "2021-01-21",
//                 },
//                 {
//                     title: "Vue Fes Japan 2019",
//                     start: "2021-01-21",
//                     end: "2021-01-24",
//                 },
//                 {
//                     title: "Laracon 2021",
//                     start: "2021-01-24",
//                     end: "2021-01-27",
//                 },
//             ],
//             drop: function (info) {
//                 if (
//                     $("#checkbox-event").length &&
//                     $("#checkbox-event")[0].checked
//                 ) {
//                     $(info.draggedEl).parent().remove();

//                     if ($("#calendar-event").children().length == 1) {
//                         $("#calendar-no-event").removeClass("hidden");
//                     }
//                 }
//             },
//         });

//         calendar.render();
//     }
// })();
