$('.homeHeroCaro').owlCarousel({
  loop: true,
  // margin:10,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});

// Navbar - Start
function togShow() {
  document.getElementById("tog-show").classList.add("show");
  document.getElementById('tog-btn').setAttribute("onclick", "togHide()")
}
function togHide() {
  document.getElementById('tog-show').classList.remove("show");
  document.getElementById('tog-btn').setAttribute("onclick", "togShow()")
}
// Navbar - End

// qty increase and decrease
var buttonPlus = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

var incrementPlus = buttonPlus.click(function () {
  var $n = $(this)
    .parent(".qty-container")
    .find(".input-qty");
  $n.val(Number($n.val()) + 1);
});

var incrementMinus = buttonMinus.click(function () {
  var $n = $(this)
    .parent(".qty-container")
    .find(".input-qty");
  var amount = Number($n.val());
  if (amount > 0) {
    $n.val(amount - 1);
  }
});
// gift box qty
var buttonPlus = $(".gft-qty-btn-plus");
var buttonMinus = $(".gft-qty-btn-minus");

var incrementPlus = buttonPlus.click(function () {
  var $n = $(this)
    .parent(".gft-qty-container")
    .find(".input-qty");
  $n.val(Number($n.val()) + 1);
});

var incrementMinus = buttonMinus.click(function () {
  var $n = $(this)
    .parent(".gft-qty-container")
    .find(".input-qty-gft");
  var amount = Number($n.val());
  if (amount > 0) {
    $n.val(amount - 1);
  }
});