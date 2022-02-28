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


  // グラフ
  // Load Charts and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Draw the chart when Charts is loaded.
  google.charts.setOnLoadCallback(learningContentsChart); //学習言語
  google.charts.setOnLoadCallback(learningLangageChart);  //学習コンテンツ
  google.charts.setOnLoadCallback(learningTimeChart);     //棒グラフ

  // Callback that draws the chart.
  //学習言語
  function learningContentsChart() {

    // Create the data table
    let data = new google.visualization.DataTable();
    data.addColumn('string', 'コンテンツ');
    data.addColumn('number', '割合');
    data.addRows([
      ["N予備校", 40],
      ["ドットインストール", 20],
      ["課題", 40]
    ]);

    // Set options for chart.
    let options = {
      pieHole: 0.5,
      pieSliceBorderColor: 'none',
      colors: ['#2245EC','#2371BD','#39BDDE'],
      chartArea:{width:'90%',height:'90%',backgroundColor:'#000'},
      legend:{position:'none'}
    };

    // Instantiate and draw the chart.
    let chart = new google.visualization.PieChart(document.getElementById('contents-chart'));
    chart.draw(data, options);
  }


  //学習コンテンツ
  function learningLangageChart() {

    // Create the data table
    let data = new google.visualization.DataTable();
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
    let options = {
      pieHole: 0.5,
      pieSliceBorderColor: 'none',
      colors: ['#2245EC','#2371BD','#39BDDE','#40CEFE','#B29FF3','#6D46EC','#4A17EF','#3105C0'],
      chartArea:{width:'90%',height:'90%',backgroundColor:'#000'},
      legend:{position:'none'}
    };

    // Instantiate and draw the chart.
    let chart = new google.visualization.PieChart(document.getElementById('lang-chart'));
    chart.draw(data, options);
  }


  //棒グラフ
  function learningTimeChart() {
      // 行の配列  30行
      var arr = new Array(30);
      // 列の配列  2列
      for (let i = 0; i < arr.length; i++){
          arr[i] = new Array(2);
      }
      //データ読み込み
     $.ajax({
      url: "http://posse-task.anti-pattern.co.jp/1st-work/study_time.json",
      dataType:"json",
      async: false
      }).then(function(json){
        for (let i = 0; i < arr.length; i++){
          arr[i][0] = json[i].day;
          arr[i][1] = json[i].time;
        }

        // Create the data table
        let data = new google.visualization.arrayToDataTable([
          ['day','time'],
          arr[0],
          arr[1],
          arr[2],
          arr[3],
          arr[4],
          arr[5],
          arr[6],
          arr[7],
          arr[8],
          arr[9],
          arr[10],
          arr[11],
          arr[12],
          arr[13],
          arr[14],
          arr[15],
          arr[16],
          arr[17],
          arr[18],
          arr[19],
          arr[20],
          arr[21],
          arr[22],
          arr[23],
          arr[24],
          arr[25],
          arr[26],
          arr[27],
          arr[28],
          arr[29],
        ]);

        // Set options for chart.
        let options = {
          chartArea:{width:'80%',height:'80%',},
          legend:{position:'none'},
          hAxis:{
            ticks: [2,4,6,8,10,12,14,16,18,20,22,24,26,28,30],
            gridlines:{color:'none'},
            baseline:'none',
            titleTextStyle: { color: '#137DC4' }
          },
          vAxis:{
            ticks: [0,2,4,6,8],
            gridlines:{color:'none'},
            baseline:'none',format:'#h',
            titleTextStyle: { color: '#137DC4' }
          }
        };

        // Instantiate and draw the chart.
        let chart = new google.visualization.ColumnChart(document.getElementById('time-graph'));
        chart.draw(data, options);
      });

  }
})