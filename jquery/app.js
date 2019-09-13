$(document).ready(function(){
  $.ajax({
    url: "data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
           var date = [];
           var Block = [];
	       var Deblock = [];
	       var Request = [];
	 
      for(var i in data) {
        date.push("Date:- " + data[i].a);
        Block.push(data[i].b);
		Deblock.push(data[i].c);
		Request.push(data[i].d);
      }

      var chartdata = {
        labels: date,date,date,
        datasets : [
          {
            label: 'Block Count',
            backgroundColor: '#98FB98',
            borderColor: '#98FB98',
            data: Block
          },{
            label: 'Deblock Count',
            backgroundColor: '#b2beb5',
            borderColor: '#b2beb5',
            data: Deblock
          },{
            label: 'Request Count',
            backgroundColor: '#87CEEB',
            borderColor: '#87CEEB',
            data: Request
          }
        ]
		
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});