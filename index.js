'use strict';

$(function(){
  $('.tweetButton').click(function () { 
    $(this).find('i').toggleClass('checkcircle-color-checked');
  });
  $('label').click(function () { 
    $(this).find('i').toggleClass("checkcircle-color-checked");
    $(this).parent().toggleClass('testbox-checked');
  });

  $('.modalPost').click(function(){
    let w = $('.modalWindow').width();
    let h = $('.modalWindow').height();
    $('.modalLeft').hide();
    $('.modalRight').hide();
    $('.completeContainer').show();
    $(this).hide();

    $('.modalWindow').width(w);
    $('.modalWindow').height(h);
  })

  // Load Charts and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Draw the chart when Charts is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Draw the pie chart for the Anthony's pizza when Charts is loaded.
  // google.charts.setOnLoadCallback(drawAnthonyChart);

  // Callback that draws the chart.
  function drawChart() {

    // Create the data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'コンテンツ');
    data.addColumn('number', '割合');
    data.addRows([
      ["N予備校", 40],
      ["ドットインストール", 20],
      ["課題", 40]
    ]);

    // Set options for chart.
    var options = {
      pieHole: 0.5,
      colors: ['#2245EC','#2371BD','#39BDDE'],
      chartArea:{width:'100%',height:'100%'},
      legend:{position:'none'}
    };

    // Instantiate and draw the chart.
    var chart = new google.visualization.PieChart(document.getElementById('contents-chart'));
    chart.draw(data, options);
  }
})