// JavaScript
let lastScrollTop = 0; // Biến để lưu vị trí cuộn trước đó
const menu = document.querySelector('.header'); // Lấy phần tử menu

window.addEventListener('scroll', function() {
  let currentScroll = document.documentElement.scrollTop;
  if (currentScroll > lastScrollTop){
    // Kéo xuống
    menu.style.top = '-130px'; // Giả sử menu có chiều cao là 50px
  } else {
    // Kéo lên
    if (currentScroll == 0){
      // Kéo xuống
      menu.style.top = '0'; // Giả sử menu có chiều cao là 50px
    }
    else{
      menu.style.top = '-30.5px';
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
const radioButtons = document.querySelectorAll(".size__btn input[type='radio']");

// Thêm sự kiện change cho mỗi input radio
radioButtons.forEach((radio) => {
  radio.addEventListener("click", function () {
    // Lấy giá trị của input radio được chọn
    const selectedValue = this.value;
    console.log("Selected value:", selectedValue);
    document.getElementById('size_value').innerHTML=selectedValue;
  });
});
