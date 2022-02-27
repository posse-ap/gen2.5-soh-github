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
  google.charts.setOnLoadCallback(learningContentsChart);

  google.charts.setOnLoadCallback(learningLangageChart);

  // Callback that draws the chart.
  function learningContentsChart() {

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
      pieSliceBorderColor: 'none',
      colors: ['#2245EC','#2371BD','#39BDDE'],
      chartArea:{width:'90%',height:'90%',backgroundColor:'#000'},
      legend:{position:'none'}
    };

    // Instantiate and draw the chart.
    var chart = new google.visualization.PieChart(document.getElementById('contents-chart'));
    chart.draw(data, options);
  }
  function learningLangageChart() {

    // Create the data table
    var data = new google.visualization.DataTable();
    data.addColumn('string', '言語');
    data.addColumn('number', '割合');
    data.addRows([
      ["HTML", 30],
      [ "CSS", 20],
      ["JavaScript", 10],
      ["PHP", 5],
      ["Laravel", 5],
      ["SQL", 20],
      ["SHELL", 20],
      ["その他", 10]
    ]);

    // Set options for chart.
    var options = {
      pieHole: 0.5,
      pieSliceBorderColor: 'none',
      colors: ['#2245EC','#2371BD','#39BDDE','#40CEFE','#B29FF3','#6D46EC','#4A17EF','#3105C0'],
      chartArea:{width:'90%',height:'90%',backgroundColor:'#000'},
      legend:{position:'none'}
    };

    // Instantiate and draw the chart.
    var chart = new google.visualization.PieChart(document.getElementById('lang-chart'));
    chart.draw(data, options);
  }
})