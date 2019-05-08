$(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    $('#calendar').fullCalendar({
        header: {
            left: 'prev, next today',
            center: 'title',
            right: 'month, basicWeek, basicDay'
        },
        // events: "Calendar.asmx/EventList",
        // defaultView: 'dayView'
       
        
    });
  var data=[{'date':y+"-"+m+"-"+d,'title':'hi'},{'date':'2018-10-14','title':'bye'}]
      $.each(data, function(i) {
       $('.fc-day[data-date="'+data[i]["date"]+'"]').html('<h4>'+data[i]["title"]+'</h4>');
       $('.fc-day[data-date="'+data[i]["date"]+'"]').css('background', '#ff9f89');
        
    });


});


                        