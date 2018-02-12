var table = document.getElementById('table-container');
var cart = document.getElementById('cart-container');
var json = {
	data : []
};
function jsonClass(productId,requiredQuantity){
	this.product_id = productId;
	this.required_quantity = requiredQuantity;
}
function alreadyExists (productId){
	for(i=0;i<json.data.length;i++){
		if(json.data[i].product_id == productId){
			return i;
		}
	}
	return -1;
}
function displayCart(){
	if(json.data.length!=0){
	var contents = '<table id = "invoice-table"><tr><th>PRODUCT ID</th><th>PRODUCT NAME</th><th>UNIT PRICE</th><th>REQUIRED QUANTITY</th><th></th></tr>';
	for(i = 0 ;i < json.data.length;i++){
		productDetails = document.getElementsByClassName('productDetails-'+json.data[i].product_id);
		productName = productDetails[1].innerHTML;
		productPrice = productDetails[2].innerHTML;
		contents = contents + '<tr data-id = "'+i+'""><td>'+json.data[i].product_id+'</td><td>'+productName+'</td><td>'+productPrice+'</td><td>'+json.data[i].required_quantity+'</td><td><input type = "button" value = "Delete Product" data-id="'+i+'" ></td></tr>';
	}
	data = {};
	data['products'] = json.data;
	data = JSON.stringify(data);
	console.log(data);
	contents = contents + '</table><form action = "createInvoiceController.php" method = "post"><input type = "hidden" name = "data" value = '+data+' ><input id = "create-invoice" class = "innvoice-button" type = "submit" name = "create-invoice" value = "CREATE INVOICE"></form>';
	cart.innerHTML=contents;
	document.getElementById('create-invoice').addEventListener('click',getInvoice);
	document.getElementById('invoice-table').addEventListener('click',deleteFromCart);
}
}

function deleteFromCart(event){
	target = event.target;
	if(target.value == "Delete Product"){
		position = event.target.dataset.id;
		json.data.splice(position,1);
		tableRowElement = document.querySelector('tr[data-id="'+position+'"]'); 
		tableRowElement.remove();
		displayCart();
	}
}

function addToCart(event){
	if(cart.classList.contains("display-none")){
		cart.classList.remove("display-none");
	}
	target = event.target;
	if(target.value == "ADD TO CART"){
	productId = event.target.dataset.id;
	productDetails = document.getElementsByClassName('productDetails-'+productId);
	requiredQuantity = document.getElementById('quantity-'+productId).value;
	productName = productDetails[1].innerHTML;
	productPrice = productDetails[2].innerHTML;
	productQuantity = Number(productDetails[3].innerHTML);
	showAlertFlag = 1;
	if(requiredQuantity && requiredQuantity>0){
		var position = alreadyExists(productId);
		if(position == -1){
			if(requiredQuantity <= productQuantity){
			var temp = new jsonClass(productId,requiredQuantity);
			json.data.push(temp);
			showAlertFlag = 0;
		}
	}else {
		requiredQuantity = Number(json.data[position].required_quantity) + Number(requiredQuantity);
		console.log(requiredQuantity);
		if(requiredQuantity <= productQuantity){
			json.data[position].required_quantity = requiredQuantity; 
			showAlertFlag = 0;
		}
	}
	if(showAlertFlag == 1)	{
		alert("You cannot add "+productName+" to cart total avaliable stock is "+productQuantity);
	}else {
		displayCart();
	}
	console.log(json.data);
	}
}
}

function printInvoice() {
	window.print();
}


table.addEventListener('click',addToCart);