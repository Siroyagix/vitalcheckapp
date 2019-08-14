$(function () {
    $('table tr[id*="table_low"]').mouseover(function () {
      $('#'+this.id).css("backgroundColor", "yellow");
    });
    $('table tr[id*="table_low"]').mouseout(function () {
      $('#'+this.id).css("backgroundColor", "white");
    });
  });