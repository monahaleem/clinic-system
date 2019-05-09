<script>

$(document).ready(function () {
	var calendar = $('#calendar-reservation').fullCalendar({
		header: {
			left: "prev,next today",
			center: "title",
			right: "month,agendaWeek,agendaDay"
		},
    editable: false,
    events: "",
    displayEventTime: true,
    selectable: true,
    selectHelper: false,
    select: function (start, end, allDay) {
			var title = prompt('Event Title:');

      if (title) {
        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

        $.ajax({
            url: 'add-event.php',
            data: 'title=' + title + '&start=' + start + '&end=' + end,
            type: "POST",
            success: function (data) {
                displayMessage("Added Successfully");
            }
        });
        calendar.fullCalendar('renderEvent',
	        {
	            title: title,
	            start: start,
	            end: end,
	            allDay: allDay
	        },
	        true
        );
      }
      calendar.fullCalendar('unselect');
    },
    editable: true,
    eventDrop: function (event, delta) {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      $.ajax({
          url: 'edit-event.php',
          data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
          type: "POST",
          success: function (response) {
              displayMessage("Updated Successfully");
          }
      });
    },
		eventClick: function (event) {
      var deleteMsg = confirm("Do you really want to delete?");
      if (deleteMsg) {
        $.ajax({
            type: "POST",
            url: "delete-event.php",
            data: "&id=" + event.id,
            success: function (response) {
                if(parseInt(response) > 0) {
                    $('#calendar').fullCalendar('removeEvents', event.id);
                    displayMessage("Deleted Successfully");
                }
            }
        });
      }
    }
	});
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
// $(document).ready(function(){
// 	$('#calendar-reservation').fullCalendar({
// 		header: {
// 			left: "prev,next today",
// 			center: "title",
// 			right: "month,agendaWeek,agendaDay"
// 		},
// 		eventLimit: true,
// 		events: [
// 			{
// 				id: 0,
// 				title: "Demo Event-2",
// 				allDay: true,
// 				start: "2019-05-09T00:00:00+00:00",
// 				end: "2019-05-11T00:00:00+00:00",
// 				color: "#f05050",
// 				url: "http:\/\/localhost:8000"
// 			}
// 		]
// 	});
// });

// $('#calendar-reservation').fullCalendar({
//     header: {
// 			left: "prev,next today",
// 			center: "title",
// 			right: "month,agendaWeek,agendaDay"
// 	  },
// 		selectable: true,
// 		selectHelper: true,
// 		editable: true,
// 		eventLimit: true,
//     height:'parent',
//     events : function(start, end, timezone, callback){
//         var month = $('#calendar-reservation').fullCalendar('getDate').format('YYYY-MM');
//         var url = '{{ route('events') }}';
//
//         $.ajax({
//             type : 'get',
//             data : {'date' : month},
//             url : url,
//             datatype : 'json',
//             success : function(data){
//                 console.log(data); // How do I use the data
//             }
//         });
//     }
// });

</script>
