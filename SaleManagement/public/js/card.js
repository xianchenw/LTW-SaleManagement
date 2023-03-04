//Nhấn vào icon giỏi hàng hiện lên section 
var scShowCard = document.querySelector("section.Cart_Product")
function showCard(){
    scShowCard.style.display = "block";
    
}


//Thêm vào giỏ hàng
const btn = document.querySelectorAll("button.product__main-info-cart-btn")
btn.forEach(function(button, index){
    button.addEventListener("click", function(event){{
        var btnItem = event.target
        var p = btnItem.parentElement
        var t =p.parentElement 
        var product = t.parentElement
        var ProductName = product.querySelector("h2").innerText
        var price = product.querySelector("span.product__panel-price-current").innerText
        addCard(ProductName, price)
    }})
})
function addCard(ProductName, price){
    var addtr = document.createElement("tr")
    var cartItem = document.querySelectorAll("tbody.tbd tr")
    for (var i = 0; i<cartItem.length;i++){
        var productT =document.querySelectorAll(".title")
        if (productT[i].innerHTML== ProductName){
            alert("Sản phẩm đã có trong giỏ hàng")
            return
        }
    }
    var trContent ='<tr><td class="cart__body-name-title" style=" padding: 8px;  font-size: 1.5rem;"><span class= "title" style="font-size: 1.5rem">'+ProductName+'</span></td><td style=" padding: 8px;  font-size: 1.5rem;"><span class="price" style="font-size: 1.5rem">'+price+'</span></td><td style=" padding: 8px;  font-size: 1.5rem;" ><input class="quantity" style="width:65px;text-align:center; cursor:pointer" type="number"  min="1" max="100" name="quantity" value="1"></td><td style = "cursor: pointer; padding: 8px;  font-size: 1.5rem;">Xóa</td></tr>'
    addtr.innerHTML = trContent
    var cartTable = document.querySelector("tbody.tbd")
    cartTable.append(addtr)
    cartTotal()
    deleteCart()
    inputchange()
}
///Tính Tổng Tiền
function cartTotal(){
    var cartItem = document.querySelectorAll("tbody.tbd tr")
    var totalB = 0
    for(var i=0;i<cartItem.length; i++){
        if(cartItem[i].querySelector("input.check").checked)
        {
            var inputValue = cartItem[i].querySelector("input.quantity").value
            // console.log(inputValue)
            var price = ((cartItem[i].querySelector(".price").innerHTML).match(/\d/g)).join("")
            // console.log(price)
            totalA = (inputValue*price)
            // console.log(totalB)
        }
        else
            totalA = 0
        totalB =(totalB + totalA)
    }
    var cartTotalA = document.querySelector(".price_total span")
    cartTotalA.innerHTML = totalB.toLocaleString('de-DE')
    // console.log(cartTotalA)
}
function deleteCart(){
    var cartItem = document.querySelectorAll("tbody.tbd tr")
    for (var i = 0; i<cartItem.length;i++){
        var productT =document.querySelectorAll("tbody.tbd tr td:last-child")
        productT[i].addEventListener("click", function(event){
            var cartDelete = event.target
            var cartitemR =cartDelete.parentElement
            cartitemR.remove()
            cartTotal()
            alert('Xóa đơn hàng thành công')
        })
        
    }
}
function inputchange(){
    var cartItem = document.querySelectorAll("tbody.tbd tr")
    for (var i = 0; i<cartItem.length;i++){
        var inputValue =cartItem[i].querySelector("input")
        inputValue.addEventListener("change", function(){
            cartTotal()
        })
        
    }
}
const closebtn = document.querySelector(".fa-times")
const cardshow = document.querySelector(".header__cart")
cardshow.addEventListener("click", function(){
    console.log(cardshow)
    document.querySelector(".Cart_Product").style.right = "0"
})
closebtn.addEventListener("click", function(){
    console.log(cardshow)
    document.querySelector(".Cart_Product").style.right = "-100%"
})
//Hiện form nhập thông tin mua hàng
var formOrder = document.querySelector("div.Order")
var BTO = document.querySelector(".bto")
function btorder(){
    event.preventDefault();
    formOrder.style.display = "block";
    BTO.style.display = "none";
    
}
function submitOrder(){
    event.preventDefault();
    
    let Customer_Name = document.getElementById('Customer_Name').value;
    let Customer_Phone = document.getElementById('Customer-Phone').value;
    let Customer_address = document.getElementById('Customer-address').value;
    console.log(Customer_Name, Customer_Phone, Customer_address)
    let error = {};
    if(Customer_Name.trim()==''|| Customer_Phone.trim()==''|| Customer_address.trim()=='')
    {
        if ( isNaN(Customer_Phone)) {
            alert('Số điện thoại bị sai định dạng! (không được có chữ cái abc.. và các ký tự đặc biệt @#$...')
        }
        else
            alert('Thông tin không được để trống!')
    }
    else{
        var dict = [];
        var cartItem = document.querySelectorAll("tbody.tbd tr");
        for(var i=0;i<cartItem.length; i++){
            if(cartItem[i].querySelector("input.check").checked)
            {
                var cartId = cartItem[i].querySelector("input.check").value;
                dict.push(cartId);
            }
        };
        fetch('/api/order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                "carts": dict
            }),
        }).then((response) => response.json()
        ).then((data) => {
            console.log('Success:', data);
            alert('Bạn Đã đặt hàng thành công! Chúng tôi sẽ sớm liên hệ bạn để hoàn thành hồ sơ (Nếu mua hàng trả góp)')
            location.reload();
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
      
} 
   
// Phần gửi kiểm tra form 

// document.querySelector('#FormOrderP').onsubmit = function(){
//     e.preventDefault();
//     let nameCustomer = document.getElementById('Customer_Name')
//     let phoneCustomer = document.getElementById('Customer-Phone')
//     let addressCustomer = document.getElementById('Customer-address')
    
//     let Customer_Name = nameCustomer.value
//     let Customer_Phone = phoneCustomer.value
//     let Customer_address = addressCustomer.value

//     let error = {};
//     if(Customer_Name.trim()==''){
//         error['Customer_Name'] = 'Họ và tên không đước để trống'
//         nameCustomer.parentElement.querySelector('.required')
//     }
// }
    


