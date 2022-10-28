/**
 *  Save and keep products
 *  Responsive
 */

import * as constants from "./constants.js";
import products from "./products.js";

//Prepare variables
const slides = [
  "assets/img/banner/slider4.jpg",
  "assets/img/banner/slider5.jpg",
  "assets/img/banner/slider6.jpg",
];


//function excute
function handleScrollEvent() {
  window.onscroll = function () {
    if (document.documentElement.scrollTop) {
      Object.assign(constants.navBar.style, {
        backgroundColor: "rgba(255,255,255,0.9)",
        boxShadow: "0 1px 3px rgb(0 0 0 / 11%)",
        marginTop: 0,
        animation: "slide-down 0.8s ease",
      });
      constants.slideUp.classList.add("open");
    } else {
      constants.navBar.removeAttribute("style");
      constants.slideUp.classList.remove("open");
    }
  };
}

function slideBanner(slides) {
  let index = 0;
  constants.slideRight.onclick = function () {
    index++;
    if (index < slides.length) {
      constants.containSlide.style.background = `url("${slides[index]}") no-repeat center/cover`;
    } else {
      index = 0;
      constants.containSlide.style.background = `url("${slides[index]}") no-repeat center/cover`;
    }
  };
  constants.slideLeft.onclick = function () {
    index--;
    if (index >= 0) {
      constants.containSlide.style.background = `url("${slides[index]}") no-repeat center/cover`;
    } else {
      index = slides.length - 1;
      constants.containSlide.style.background = `url("${slides[index]}") no-repeat center/cover`;
    }
  };
}

function handleOpenCart() {
  let isOpen = false;

  function handleAnimateSlide() {
    if (!isOpen) {
      isOpen = true;
      constants.overLay.classList.add("open");
      constants.overLay.classList.remove("close-slide");
      constants.cart.style.animation = `cartSlideIn 0.5s ease`;
      constants.overLay.style.backgroundColor = "rgba(0,0,0, 0.4)";
    } else {
      isOpen = false;
      constants.overLay.classList.add("close-slide");
      constants.cart.removeAttribute("style");
      constants.overLay.style.backgroundColor = "transparent";
      setTimeout(function () {
        constants.overLay.classList.remove("open");
      }, 500);
    }
  }

  constants.cartBag.onclick = function () {
    handleAnimateSlide();
  };

  constants.cartClose.onclick = function () {
    handleAnimateSlide();
  };

  constants.overLay.onclick = function () {
    handleAnimateSlide();
  };

  //Prevent propagation
  constants.cart.onclick = function (event) {
    event.stopPropagation();
  };
}

function handleSublist(id) {
  const subList = document.querySelector(`.category__sub-list.sub-${id}`);
  subList.style.margin = "2rem 0 3rem";
  switch (id) {
    case 0:
      subList.style.height = `216px`;
      break;
    case 1:
      subList.style.height = `132px`;
      break;
    case 2:
      subList.style.height = `130px`;
      break;
    case 3:
      subList.style.height = `260px`;
      break;
    default:
      return;
  }
}

function animateSubList() {
  const excuteAnimate = (item, key) => {
    const subList = document.querySelector(`.category__sub-list.sub-${key}`);
    const subListActive = document.querySelector(`.category__sub-list.active`);
    const itemActive = document.querySelector('.category__item.active');
    if(!item.matches('.active')) {
      item.classList.add('active');
      subList.classList.add('active');
      item.querySelector('i').style.rotate = '180deg';
      handleSublist(key)
    }
    if (itemActive) {
      itemActive.classList.remove('active');
      subListActive.classList.remove('active');
      itemActive.querySelector('i').style.rotate = '0deg';  
      subListActive.style.height = '0';
      subListActive.style.margin = '0';
    }
  }
  constants.categoryItems.forEach((item, key) => {
    item.onclick = () => {
      excuteAnimate(item, key)
    }
  })
}
//Render, add, remove products
const programing = {
  render() {
    const row = document.querySelector('.row-js')
    const htmls = products.map((product, index) => {
      return `
              <div class="col l-2-4 m-4 product__figure data-${index}">
              <div class="product__photo">
                  <img src="${product.image}" alt="tree" class="product__img">
                  <span>${product.discount}</span>
          
                  <div class="product__interactive">
                      <i class="product__inter-icon data-${index} transition-primary fa-solid fa-bag-shopping btn-add"></i>
                      <i class="product__inter-icon transition-primary fa-solid fa-sliders"></i>
                      <i class="product__inter-icon transition-primary far fa-heart"></i>
                      <i class="product__inter-icon transition-primary fa-solid fa-eye"></i>
                  </div>
              </div>

              <div class="product__content">
                  <div class="product__content-wrap">
                      <div class="product__stars">
                          <i class="product__star-icon far fa-star transition-primary"></i>
                          <i class="product__star-icon far fa-star transition-primary"></i>
                          <i class="product__star-icon far fa-star transition-primary"></i>
                          <i class="product__star-icon far fa-star transition-primary"></i>
                          <i class="product__star-icon far fa-star transition-primary"></i>
                      </div>
          
                      <p class="product__name">${product.name}</p>
          
                      <div class="product__price">
                          <span class="product__price-1">£${product.priceCurrent.toFixed(2)}</span>
                          <span class="product__price-2">£${product.priceOld.toFixed(2)}</span>
                      </div>
                  </div>
              </div>
          </div>
                      `;
    })
    .join("");
    row.innerHTML = htmls
  },
  renderCartList(button) {
    const cartList = document.querySelector(".cart-list");

    const getParrent = function(element) {
      while (!element.matches(".product__figure")) {
        element = element.parentElement;
      }
      return element;
    }

    const liElement = document.createElement("li");
    let cartItem = {
      image: getParrent(button).querySelector(".product__img").src,
      name: getParrent(button).querySelector(".product__name").innerText,
      price: getParrent(button).querySelector(".product__price-1").innerText,
    };

    liElement.innerHTML = `
            <img src="${cartItem.image}" alt="" class="cart-item__img">
            <div class="cart-content">
                <p class="cart-name transition-primary">${cartItem.name}</p>
                <p class="cart-price"> 1x <span>${cartItem.price}</span></p>
            </div>
            <i class="cart-close-item transition-primary fa-solid fa-xmark"></i>
        `;
    liElement.classList.add("cart-item");
    cartList.appendChild(liElement);
    return liElement;
  },
  handleProduct() {
    let counter = 0;
    const btnAdds = document.querySelectorAll(".btn-add");
    const cartList = document.querySelector(".cart-list");

    const addProduct = (btnAdd) => {
      this.renderCartList(btnAdd)
      localStorage.setItem("insideCart", cartList.innerHTML);
    }

    const removeProduct = () => {
        const liTags = document.querySelectorAll(".cart-close-item");
        if (liTags) {
          liTags.forEach(liTag => {
            liTag.onclick = function() {
              this.parentElement.remove();
              localStorage.setItem("insideCart", cartList.innerHTML);
              counterProduct();
              setTimeout(() => {
                calculateTotal();
              }, 500)
            }
          })
        }
    }

    const counterProduct = (request) => {
      if (request) {
        counter++; 
        constants.cartQuantity.innerText = counter;
      } else {
        counter--; 
        constants.cartQuantity.innerText = counter;
      }
    }

    const calculateTotal = () => {
      const prices = [];
      const priceProducts = document.querySelectorAll('.cart-price span');
      if (priceProducts.length === 0) {
        const total = 0;
        return constants.totals.forEach(totalspan => totalspan.innerText = `$${total}`)
      }
      priceProducts.forEach(priceProduct => prices.push(priceProduct.innerText));
      const result = prices.map(price => {
        return Number(price.slice(1));
      }).reduce((result, price) => result += price)
      constants.totals.forEach(totalspan => totalspan.innerText = `$${result}`)
    }

    btnAdds.forEach((btnAdd) => {
      btnAdd.onclick = function () {  
        addProduct(this);
        counterProduct(true);

        setTimeout(() => {
          removeProduct();
          calculateTotal();
        }, 1000);
      };
    });

    if(localStorage.getItem("insideCart")) {
      const liTags = document.querySelectorAll(".cart-close-item");
      constants.cartQuantity.innerText = liTags.length;
      counter = liTags.length;

      removeProduct();
      calculateTotal();
    }
  },
  handleSaveProduct() {
    const cartList = document.querySelector(".cart-list");
    const liElements = localStorage.getItem("insideCart");
    if(liElements) {
      cartList.innerHTML = liElements
    }
  },
  start() {
    this.render();
    setTimeout(() => {
      this.handleProduct();
    },  300);
    this.handleSaveProduct();
  },
};

//Excute programing
handleScrollEvent();
slideBanner(slides);
handleOpenCart();
programing.start();
animateSubList();
