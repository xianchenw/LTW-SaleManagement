
// lọc sản phẩm theo tên

let catSelect = document.getElementById('categorySelect')
let clickAll = document.getElementById('C-All') 
let clickP = document.getElementById('C-All-P')
let clickM = document.getElementById('C-All-M') 
let clickL = document.getElementById('C-All-L')
let nameSelect = document.getElementById('productNameSelect')
let cickBtnSelect = document.getElementsByClassName('header__search-btn')[0];
// lọc sản phẩm theo phân loại
catSelect.onchange = function(){
    // lựa chọn được select
    let selectId= this.value;
    for(let i=1;i<4;i++){
        let id="category"+i
        if(selectId==0){
            document.getElementById('category1').style.display = "block"
            document.getElementById('category2').style.display = "block"
            document.getElementById('category3').style.display = "block"
        }else
            if(selectId==i){
                document.getElementById(id).style.display = "block"
            }
            else
            document.getElementById(id).style.display = "none"
    }
}
clickAll.addEventListener("click", function(event){
    var cartaLL = event.target
    var clickAll =cartaLL.parentElement
    var vl = clickAll.value;
    // console.log(vl)
    for(let i=1;i<4;i++){
        let id="category"+i
        if(vl==0){
            document.getElementById('category1').style.display = "block"
            document.getElementById('category2').style.display = "block"
            document.getElementById('category3').style.display = "block"
        }else
            if(vl==i){
                document.getElementById(id).style.display = "block"
            }
            else
            document.getElementById(id).style.display = "none"
    }

})
clickP.addEventListener("click", function(event){
    var cartaLL = event.target
    var clickP =cartaLL.parentElement
    var vl = clickP.value;
    // console.log(vl)
    for(let i=1;i<4;i++){
        let id="category"+i
        if(vl==0){
            document.getElementById('category1').style.display = "block"
            document.getElementById('category2').style.display = "block"
            document.getElementById('category3').style.display = "block"
        }else
            if(vl==i){
                document.getElementById(id).style.display = "block"
            }
            else
            document.getElementById(id).style.display = "none"
    }

})
clickM.addEventListener("click", function(event){
    var cartaLL = event.target
    var clickM =cartaLL.parentElement
    var vl = clickM.value;
    // console.log(vl)
    for(let i=1;i<4;i++){
        let id="category"+i
        if(vl==0){
            document.getElementById('category1').style.display = "block"
            document.getElementById('category2').style.display = "block"
            document.getElementById('category3').style.display = "block"
        }else
            if(vl==i){
                document.getElementById(id).style.display = "block"
            }
            else
            document.getElementById(id).style.display = "none"
    }

})
clickL.addEventListener("click", function(event){
    var cartaLL = event.target
    var clickL =cartaLL.parentElement
    var vl = clickL.value;
    // console.log(vl)
    for(let i=1;i<4;i++){
        let id="category"+i
        if(vl==0){
            document.getElementById('category1').style.display = "block"
            document.getElementById('category2').style.display = "block"
            document.getElementById('category3').style.display = "block"
        }else
            if(vl==i){
                document.getElementById(id).style.display = "block"
            }
            else
            document.getElementById(id).style.display = "none"
    }

})
cickBtnSelect.onclick= function(){
    let productName= document.getElementsByClassName('product__panel-link')
    for( i=0 ; i < productName.length;i++){
     if(   productName[i].textContent==nameSelect.value)
    {
        alert(productName[i].textContent)
  return;
    } 
    
}
alert("Sản phẩm không có trong thư mục")

}
nameSelect.onchange= function(){
    let productName= document.getElementsByClassName('product__panel-link')
    for( i=0 ; i < productName.length;i++){
     if(   productName[i].textContent==nameSelect.value)
    {
        alert(productName[i].textContent)
  return;
    } 
    
}
alert("Sản phẩm không có trong thư mục")

}
// bấm vào header hiện danh mục tương ứng
let headernavSearch = document.getElementsByClassName("header__nav-item")
headernavSearch.ondbclick= function (){
    let headernavSearch = document.getElementsByClassName("header__nav-item")
    let searchId= this.value;
    for(let i=1;i<4;i++){
        let id="category"+i
        if(searchId==i){
            document.getElementById(id).style.display = "block"
        }
        else
        document.getElementById(id).style.display = "none"
    }
}
// tạm thời chưa chạy , có thời gian sẽ sửa sau