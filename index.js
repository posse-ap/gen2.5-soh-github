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
})