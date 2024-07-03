// Post-wrapper   Post-carousel

  // Lấy phần tử postCarousel từ DOM
  const postCarousel = document.querySelector(".post-carousel");
  const firstImg = document.querySelector(".post-carousel .post-item");
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
    // console.log(postCarousel.scrollLeft);
    // console.log(scrollWidth);
    
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
  const images = postCarousel.querySelectorAll('.post-item-image');
  
  // Hàm khởi động kéo
  const dragStart = (e) => {
    e.preventDefault();

      // Cập nhật giá trị của các biến toàn cục khi sự kiện mousedown xảy ra
      isDragStart = true;
      prevPageX = e.pageX || e.touches[0].pageX;
      prevScrollLeft = postCarousel.scrollLeft;
  };

  // Hàm xử lý khi kéo
  const dragging = (e) => {
    
      // Cuộn hình ảnh/postCarousel sang trái dựa trên vị trí con trỏ chuột
      if (!isDragStart) return; // Nếu không kéo thì thoát
      images.forEach(function(img) {
        img.style.pointerEvents='none';
      });
      postCarousel.classList.remove("dragging2");
      postCarousel.classList.add("dragging");
      let positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX; // Tính khoảng cách di chuyển chuột
      postCarousel.scrollLeft = prevScrollLeft - positionDiff; // Cập nhật vị trí cuộn của postCarousel
      console.log(positionDiff);
      console.log(prevScrollLeft);

      setTimeout(() => showHideIcons() , 60);

  };

  // Hàm dừng kéo
  const dragStop = (e) => {
      images.forEach(function(img) {
        img.style.pointerEvents='all';
      });
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
