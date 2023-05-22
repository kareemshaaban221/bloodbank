

$(document).ready(function () {
  // $('#dataTable').DataTable();
  var mySwiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    loop: true,
    effect: 'coverflow',
    autoplay: true,
    grabCursor: true,
    centeredSlides: true,
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 2,
      },
      640: {
        slidesPerView: 1,
      },
      320: {
        slidesPerView: 1,
      }
    }
  });

  ///////////////////////// WOW Animation ////////////////////////////////


  var wow = new WOW(
    {
      boxClass: 'wow',      // default
      animateClass: 'animated', // default
      offset: 0,          // default
      mobile: false,      // default
    }
  )
  wow.init();


});

function filter(e) {
  console.log(e);
  var selection = e;
  var selected;

  [...selection.children].forEach((elem) => {
    if (elem.selected)
      selected = elem;
  });


  var table = e.parentElement.nextElementSibling.children[0].getElementsByTagName('tbody')[0];
  table.childNodes.forEach((elem) => {
    if (elem.tagName == 'TR') {
      td = elem.children[1];
      if (selected.innerText == '--') {
        elem.style.display = 'table-row';
      } else {
        if (! (td.innerHTML + "").includes(selected.innerText)) {
          elem.style.display = 'none';
        } else {
          elem.style.display = 'table-row';
        }
      }
    }
  });
}


