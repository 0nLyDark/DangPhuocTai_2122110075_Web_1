// JavaScript
// window.addEventListener("resize",()=>{
//   let html = document.querySelector(".product");
//   html.style.fontSize = parseFloat( window.innerWidth /1440 )*16 +"px";
// });



let lastScrollTop = 0; // Biến để lưu vị trí cuộn trước đó
const header = document.querySelector('.header'); // Lấy phần tử header
const headerTop = document.querySelector('.header-top'); // Lấy phần tử header
window.addEventListener('scroll', function() {
  let currentScroll = document.documentElement.scrollTop;
  if (currentScroll > lastScrollTop){
    // Kéo xuống
    header.style.top = `-${header.offsetHeight }px`; // Giả sử header có chiều cao là 50px

  } else {
    // Kéo lên
    if (currentScroll == 0){
      // Kéo xuống
      header.style.top = '0'; // Giả sử header có chiều cao là 50px
    }
    else{
      header.style.top = `-${headerTop.offsetHeight + 0.5}px`;
    }
  }
  lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Cập nhật vị trí cuộn trước đó
}, false);



const labels = document.querySelectorAll(".size__btn label");
// Thêm sự kiện click cho mỗi label
labels.forEach((label) => {
  label.addEventListener("click", function () {
    // Loại bỏ lớp "active" khỏi tất cả các label
    labels.forEach((otherLabel) => {
      otherLabel.classList.remove("active");
    });

    // Thêm lớp "active" cho label được click
    this.classList.add("active");
  });
});
// Lấy tất cả các phần tử input radio trong class "size__btn"
const radioButtons = document.querySelectorAll(".size__btn input[name='size_product']");

// Thêm sự kiện change cho mỗi input radio
radioButtons.forEach((radio) => {
  radio.addEventListener("click", function () {
    // Lấy giá trị của input radio được chọn
    const selectedValue = this.value;
    console.log("Selected value:", selectedValue);
    document.getElementById('size_value').innerHTML=selectedValue;
  });
});

  // quantity-plus-minus

const quantityPlusMinus = document.querySelectorAll(".quantity-plus-minus");
quantityPlusMinus.forEach((quantity) => {
  let valueQuantity = quantity.querySelector("input");
  let minus = quantity.querySelector(".minus");
  let plus = quantity.querySelector(".plus");
  valueQuantity.addEventListener("change",function(){
    let value = parseInt(valueQuantity.value);
    if(isNaN(value))
      {
        value = 1; 
        valueQuantity.value=String(value);
      }
      console.log(value);
  });
  minus.addEventListener("click",function(){
    let value = parseInt(valueQuantity.value);
    if(value >1)
      {
        value -= 1; 
        valueQuantity.value=String(value);
      }
      console.log(value);
  });
  plus.addEventListener("click",function(){
    let value = parseInt(valueQuantity.value);
    value += 1;
    valueQuantity.value=String(value);

    console.log(value);

  });
});











// Post-wrapper   Post-carousel

  // Lấy phần tử postCarousel từ DOM
  const postCarousel = document.querySelector(".post-carousel");
  const firstImg = postCarousel.querySelector(".post-item");
  const arrowIcons = document.querySelectorAll(".post-wrapper i");


  postCarousel.scrollLeft=0;
  // Khai báo biến toàn cục
  let isDragStart = false, prevPageX, prevScrollLeft;
  let scrollWidth = postCarousel.scrollWidth - postCarousel.clientWidth ; // lấy chiều rộng cuộn tối đa
  let firstImgWidth = firstImg.clientWidth + 10  ; // lấy chiều rộng của hình ảnh đầu tiên và thêm  giá trị lề

  window.addEventListener("resize",()=>{
    scrollWidth = postCarousel.scrollWidth - postCarousel.clientWidth; // lấy chiều rộng cuộn tối đa
    firstImgWidth = firstImg.clientWidth + 10  ; // lấy chiều rộng của hình ảnh đầu tiên và thêm  giá trị lề
    console.log(isDragStart);
    console.log(scrollWidth);
    console.log(firstImgWidth);
    console.log( postCarousel.scrollWidth);
    console.log( postCarousel.clientWidth);

  });

  const showHideIcons = () => {
    console.log(postCarousel.scrollLeft);
    console.log(scrollWidth);
    
      arrowIcons[0].style.display = postCarousel.scrollLeft == 0 ? "none" : "block";
      arrowIcons[1].style.display = postCarousel.scrollLeft == scrollWidth  ? "none" : "block";
  }

  arrowIcons.forEach(icon => {
      icon.addEventListener("click", () => {
        console.log(icon.id);
          // nếu biểu tượng bên trái được nhấp, giảm giá trị từ vị trí cuộn của carousel, ngược lại thì thêm vào nó
          if(icon.id == "btnPost-left")
            {
              postCarousel.scrollLeft -=  firstImgWidth ;
            }else{
              postCarousel.scrollLeft +=  firstImgWidth ;
            }
          if(postCarousel.scrollLeft > scrollWidth)
            {
              postCarousel.scrollLeft = 0;
            }
          setTimeout(() => showHideIcons() , 60);
          
      });
  });
  // Hàm khởi động kéo
  const dragStart = (e) => {
      // Cập nhật giá trị của các biến toàn cục khi sự kiện mousedown xảy ra

      isDragStart = true;
      prevPageX = e.pageX || e.touches[0].pageX;
      prevScrollLeft = postCarousel.scrollLeft;
  };

  // Hàm xử lý khi kéo
  const dragging = (e) => {
      // Cuộn hình ảnh/postCarousel sang trái dựa trên vị trí con trỏ chuột
      if (!isDragStart) return; // Nếu không kéo thì thoát
      postCarousel.classList.remove("dragging2");
      postCarousel.classList.add("dragging");
      let positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX; // Tính khoảng cách di chuyển chuột
      postCarousel.scrollLeft = prevScrollLeft - positionDiff; // Cập nhật vị trí cuộn của postCarousel
      setTimeout(() => showHideIcons() , 60);

  };

  // Hàm dừng kéo
  const dragStop = () => {
      isDragStart = false; // Đặt biến isDragStart về false khi kéo dừng lại
      postCarousel.classList.remove("dragging");
      postCarousel.classList.add("dragging2");

      if(postCarousel.scrollLeft > scrollWidth)
        {
          postCarousel.scrollLeft = 0  ;
        }

  };

  // Thêm các sự kiện cho postCarousel
  postCarousel.addEventListener("mousedown", dragStart);
  postCarousel.addEventListener("touchstart", dragStart);

  postCarousel.addEventListener("mousemove", dragging);
  postCarousel.addEventListener("touchmove", dragging);

  postCarousel.addEventListener("mouseup", dragStop);
  postCarousel.addEventListener("mouseleave", dragStop);
  postCarousel.addEventListener("touchend", dragStop);



const headerBottom = document.querySelector('.header-bottom');
function openSearch(){
  let searchMini = document.querySelector(".search-wrap");
  searchMini.style.display="block";
}
function closeSearch(){
  let searchMini = document.querySelector(".search-wrap");
  searchMini.style.display="none";
}

//       MENU - MOBILE

function openMenu(){
  let menuMobile = document.querySelector('.menu-mobile');
  menuMobile.style.right = '0';
}
function closeMenu(){
  let menuMobile = document.querySelector('.menu-mobile');
  menuMobile.style.right = '-300px';
}

  const listMenu = document.querySelectorAll('.menu-mobile ul li');
  listMenu.forEach((list)=>{
    const btnList = list.querySelector(".menu-mobile-item .icon-menu-mobile");
    const listItem = list.querySelector(".menu-mobile-item + ul");
    if (btnList && listItem) {
      btnList.addEventListener('click', function() {
        btnList.querySelectorAll("i").forEach((btn)=>{
          if (btn.style.display === 'none') {
            btn.style.display = 'inline-block';
          } else {
            btn.style.display = 'none';
          }
        });

        if (listItem.style.display === 'block') {
          listItem.style.display = 'none';
        } else {
          listItem.style.display = 'block';
        }
        if (listItem.style.height === 'auto') {
          listItem.style.height = "0";
        } else {
          listItem.style.height = "auto";
        }
      });
    }
  });
  
  const scrollMenu = document.querySelector(".menu-mobile");
  let isMenuStart = false, prevPageY, prevScrollTop;
  const MenuStart = (e) => {
    // Cập nhật giá trị của các biến toàn cục khi sự kiện mousedown xảy ra

    isMenuStart = true;
    prevPageY = e.pageY || e.touches[0].pageY;
    prevScrollTop = scrollMenu.scrollTop;
};
  // Hàm xử lý khi kéo
  const menuging = (e) => {
    // Cuộn hình ảnh/postCarousel sang trái dựa trên vị trí con trỏ chuột
    if (!isMenuStart) return; // Nếu không kéo thì thoát
    scrollMenu.classList.add("dragging");
    let positionDiff = (e.pageY || e.touches[0].pageY) - prevPageY; // Tính khoảng cách di chuyển chuột
    scrollMenu.scrollTop = prevScrollTop - positionDiff; // Cập nhật vị trí cuộn của postCarousel

};

// Hàm dừng kéo
const MenuStop = () => {
    isMenuStart = false; // Đặt biến isDragStart về false khi kéo dừng lại
    scrollMenu.classList.remove("dragging");

};
  scrollMenu.addEventListener("mousedown", MenuStart);
  scrollMenu.addEventListener("touchstart", MenuStart);

  scrollMenu.addEventListener("mousemove", menuging);
  scrollMenu.addEventListener("touchmove", menuging);

  scrollMenu.addEventListener("mouseup", MenuStop);
  scrollMenu.addEventListener("mouseleave", MenuStop);
  scrollMenu.addEventListener("touchend", MenuStop);
  


