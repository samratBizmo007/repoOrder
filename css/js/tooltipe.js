// Using JS is not necissary, it just simplifies the HTML.

// If you don't want to use JS, put a span with a class of `.inner` within the `.tooltip` element, and remove the `data-tooltip` attribute and put it's value within the span. 

var $info = $('.tooltip');
$info.each( function () {
  var dataInfo = $(this).data("tooltip");
  $( this ).append('<span class="inner" >' + dataInfo + '</span>');
});