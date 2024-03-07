$(document).ready(function(){
  $.ajax({
    url: "http://localhost/ADB_project/Product_category.php",
    method: "GET",
    success: function(data){
    var Category_type = [];
    var count =[];
    for (var i in data)
    {
      Category_type.push("Category "+ data[i].Category);
      count.push(data[i].count);

    }



    var chartdata = {
       labels: Category_type,
       datasets : [
         {
           label: Category_type,
           data: count
         }
       ]
     };


     var ctx = $("#product-category-chart");

           var barGraph = new Chart(ctx, {
             type: 'bar',
             data: chartdata
           });



    },
    error: function(data){

      console.log(data);
      alert('not working');
    },

  });

});
