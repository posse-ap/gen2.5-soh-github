'use strict';

$(function(){
  $('.tweetButton').click(function () { 
    $(this).find('i').toggleClass('checkcircle-color-checked');
  });
  $('.testbox').click(function () { 
    $(this).find('i').toggleClass("checkcircle-color-checked");
    $(this).toggleClass('testbox-checked');
  });


})