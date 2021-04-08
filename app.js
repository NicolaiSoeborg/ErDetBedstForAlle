var UAis = function (s) {
  return navigator.platform.indexOf(s) != -1;
}

if (UAis("iPhone") || UAis("iPad")) { // Fix crappy browsers
  $("#overlayer").detach();
  var crap = true;
  $("#content").click(function () {
    if ($("#Spg").hasClass("hidden") && crap) {
      crap = false; // avoid stack overflows
      $("#Ja").trigger("click");
      crap = true;
    }
  });
}

var extra = 0.0;

/*$.ajax({
  method: "GET",
  url: "ajax.php?r=" + Math.random(),
  dataType: "text",
  success: function(data) {
    if (data === "Ja") {
      extra = 0.1;
    } else if ((xhr.getResponseHeader("content-type") || "").indexOf("text/plain") == -1) {
      data = "Ukendt"
    }
    $("footer").html("Er kælderbaren åben? <a href=\"http://xn--erklderbarenben-slbh.dk/\" target=\"_blank\" style=\"color:dodgerblue;\">" + data + "</a>.");
    $("footer").removeClass("hidden");
  },
  error: function(err) {
    console.log(err);
  }
});*/

var bedstforalle = function() {
  return Math.random() + extra >= 0.5;
}

var duration = 100; // very fast
$( "#Spg" ).click(function() {
  $(this).animate({opacity: 0}, duration, function() {
    $(this).addClass("hidden"); // #Spg
    $( bedstforalle() ? "#Ja" : "#Nej" ).animate({opacity: 1}, duration, function() {
      $(this).removeClass("hidden") // #Ja || #Nej
    })
  })
});

$( "#overlayer, #Ja, #Nej" ).click(function() {
  $( "#Ja, #Nej" ).each(function() {
    $(this).animate({opacity: 0}, duration/2, function() {
      $(this).addClass("hidden"); // #Ja || #Nej
      $( "#Spg" ).animate({opacity: 1}, duration/2, function() {
        $(this).removeClass("hidden") // #Spg
      })
    })
  })
});
