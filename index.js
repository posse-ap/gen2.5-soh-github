'use strict';

$(function(){
  $('.tweetButton').click(function () { 
    $(this).find('i').toggleClass('checkcircle-color-checked');
  });
  $('label').click(function () { 
    $(this).find('i').toggleClass("checkcircle-color-checked");
    $(this).parent().toggleClass('testbox-checked');
  });


})