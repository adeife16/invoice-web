localStorage.clear();
var loading = '<div class="loadingio-spinner-rolling-0nfej7pbipad"><div class="ldio-iwkzeba1xr"><div></div></div><div>';
(function ($) {
    "use strict";

    // hide page preloader
    $(window).on('load', function(){
        $(".loader").hide(1000, 'linear');
        $(".page-loader").hide(1000, 'linear');
    });
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

})(jQuery);

// current converter
function nairaConvert(num){
  num = parseInt(num);
  const formatter = new Intl.NumberFormat('en-NG', {
    style: 'currency',
    currency: 'NGN',
    maximumFractionDigits: 0
    });
  return formatter.format(num);
}

// get session details from backend
function getSession(){
  $.ajax({
    url: 'backend/session.php?getSession=get',
    type: 'GET',
    cache: false,
  })
  .done(function(response) {
    // if response status is success, create session variables
    data = JSON.parse(response);
    // console.log(data);
    if(data[0].status == "success"){
      var session_details = data[1];
      setSession(session_details);
    }
    else{
      // window.location.replace ('logout.php');
    }
    });
  }

    // Hide or display login and signup, profile and logout link depending on session availability
    function setSession(session_details){
      if(session_details === null){
        // window.location.replace ('logout.php');
      }
      else{
        sessionStorage.removeItem("session_id")
        sessionStorage.removeItem("username")
        for(var index in session_details) {
          sessionStorage.setItem(index, session_details[index]);
        }
      }
      var sessionId = sessionStorage.getItem("session_id");
      var sessionType = sessionStorage.getItem("session_type");
      var session_name = sessionStorage.getItem("session_name");
      if(sessionId == "" || sessionId === null){

        // window.location.replace ('logout.php');

      }
      else{
        // Include Rider or Company search in header

        if(sessionType == 'merchant'){
            $("#session").html(`
                <div class="dropdown">
                  <a class="dropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    `+session_name+`
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="dashboard/index.php">Dashboard</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
                </div>
                `)
        }
        else if(sessionType == 'buyer'){
            $("#session").html(`
                <div class="dropdown">
                  <a class="dropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    `+session_name+`
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
                </div>
                `)
        }
        else {

        }


      }
    }
function setLogoutTimer() {
var myTimeout;
if (window.sessionStorage) {

    myTimeout = sessionStorage.timeoutVar;
    if (myTimeout) {
        clearTimeout(myTimeout);
    }

}

myTimeout = setTimeout(function () { logoutNow(); }, 18000000);  //adjust the time.
if (window.sessionStorage) {
    sessionStorage.timeoutVar = myTimeout;
}
}

function logoutNow() {
if (window.sessionStorage) {
    sessionStorage.timeoutVar = null;
}
//MAKE AN AJAX CALL HERE THAT WILL CALL YOUR FUNCTION IN
// CONTROLLER AND RETURN A URL TO ANOTHER PAGE
      sessionStorage.clear();

window.location.replace('logout.php')
}



$(document).ready(function() {
    getSession();
    // setLogoutTimer();
});



// number to words generator]
const arr = x => Array.from(x);
const num = x => Number(x) || 0;
const str = x => String(x);
const isEmpty = xs => xs.length === 0;
const take = n => xs => xs.slice(0,n);
const drop = n => xs => xs.slice(n);
const reverse = xs => xs.slice(0).reverse();
const comp = f => g => x => f (g (x));
const not = x => !x;
const chunk = n => xs =>
  isEmpty(xs) ? [] : [take(n)(xs), ...chunk (n) (drop (n) (xs))];

// numToWords :: (Number a, String a) => a -> String
let numToWords = n => {
  
  let a = [
    '', 'one', 'two', 'three', 'four',
    'five', 'six', 'seven', 'eight', 'nine',
    'ten', 'eleven', 'twelve', 'thirteen', 'fourteen',
    'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
  ];
  
  let b = [
    '', '', 'twenty', 'thirty', 'forty',
    'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
  ];
  
  let g = [
    '', 'thousand', 'million', 'billion', 'trillion', 'quadrillion',
    'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion'
  ];
  
  // this part is really nasty still
  // it might edit this again later to show how Monoids could fix this up
  let makeGroup = ([ones,tens,huns]) => {
    return [
      num(huns) === 0 ? '' : a[huns] + ' hundred ',
      num(ones) === 0 ? b[tens] : b[tens] && b[tens] + '-' || '',
      a[tens+ones] || a[ones]
    ].join('');
  };
  
  let thousand = (group,i) => group === '' ? group : `${group} ${g[i]}`;
  
  if (typeof n === 'number')
    return numToWords(String(n));
  else if (n === '0')
    return 'zero';
  else
    return comp (chunk(3)) (reverse) (arr(n))
      .map(makeGroup)
      .map(thousand)
      .filter(comp(not)(isEmpty))
      .reverse()
      .join(' ');
};


// full date generator
function getDate(){
    var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = dd + '-' + mm + '-' + yyyy;
return today;

}