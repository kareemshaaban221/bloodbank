

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



function getPosition(element) {
  var e = element;
  var left = 0;
  var top = 0;

  do {
      left += e.offsetLeft;
      top += e.offsetTop;
  } while (e = e.offsetParent);

  return [left, top];
}

document.addEventListener('scroll', () => {
  var reqs = document.getElementById('reqs');
  var bloodtypes = document.getElementById('bloodtypes');
  var callus = document.getElementById('call-us');

  var reqsLink = document.querySelector('a[href="#reqs"]');
  var bloodtypesLink = document.querySelector('a[href="#bloodtypes"]');
  var callusLink = document.querySelector('a[href="#call-us"]');
  var indexLink = document.querySelector('a[href="index.html"]');

  reqsLink.classList.remove('selected');
  bloodtypesLink.classList.remove('selected');
  callusLink.classList.remove('selected');
  indexLink.classList.remove('selected');

  // console.log('doc: ' + this.scrollY);
  // console.log('reqs: ' + getPosition(reqs)[1]);
  // console.log('bloodtypes: ' + getPosition(bloodtypes)[1])

  if (this.scrollY >= getPosition(reqs)[1] && this.scrollY < getPosition(bloodtypes)[1] - 50) {
    bloodtypesLink.classList.remove('selected');
    callusLink.classList.remove('selected');
    indexLink.classList.remove('selected');

    reqsLink.classList.add('selected');
  }
  else if (this.scrollY >= getPosition(bloodtypes)[1] - 50 && this.scrollY < getPosition(callus)[1]) {
    reqsLink.classList.remove('selected');
    callusLink.classList.remove('selected');
    indexLink.classList.remove('selected');

    bloodtypesLink.classList.add('selected');
  }
  else if (this.scrollY >= getPosition(callus)[1] && this.scrollY < getPosition(document.getElementById('footer'))[1]) {
    reqsLink.classList.remove('selected');
    bloodtypesLink.classList.remove('selected');
    indexLink.classList.remove('selected');

    callusLink.classList.add('selected');
  }
  else {
    reqsLink.classList.remove('selected');
    bloodtypesLink.classList.remove('selected');
    callusLink.classList.remove('selected');
    
    indexLink.classList.add('selected');
  }
})
