<html>

<head>

<script
  src="https://code.jquery.com/jquery-3.5.0.js"
  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
  crossorigin="anonymous"></script>
	<script type="text/javascript" 
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>

	<script type="text/javascript">
        
			
		 $(document).on('click','#ajaxBtn',function(){

            const proxyurl = "https://cors-anywhere.herokuapp.com/";
            const url = "https://api.playground.klarna.com/checkout/v3/orders";
            var obj = {
    "purchase_country": "GB",
    "purchase_currency": "GBP",
    "locale": "en-GB",
    "order_amount": 50000,
    "order_tax_amount": 4545,
    "order_lines": [
        {
            "type": "physical",
            "reference": "19-402-USA",
            "name": "facial kit",
            "quantity": 5,
            "quantity_unit": "pcs",
            "unit_price": 10000,
            "tax_rate": 1000,
            "total_amount": 50000,
            "total_discount_amount": 0,
            "total_tax_amount": 4545
        }
        ],
    "merchant_urls": {
        "terms": "https://www.example.com/terms.html",
        "checkout": "https://www.example.com/checkout.html",
        "confirmation": "https://www.example.com/confirmation.html",
        "push": "https://www.example.com/api/push"
    }
};
		 	
		 	var username = 'PK19329_f0d9f885feff';
		 	var password = 'wWGkKjIqKhllFEVF';
			
			$.ajax({
				url : '/payment.php',
				type: 'POST',  // http method
				data: {'param' : JSON.stringify(obj)},  // data to submit
				success: function (data, status, xhr) {
					var newData = JSON.parse(data);
					$('#KCO').val(newData.html_snippet);
					console.log(newData.html_snippet);
				},
				error: function (jqXhr, textStatus, errorMessage) {
						$('p').append('Error: ' + errorMessage);
					}
			}).then(function getCodeDemo(){
            var checkoutContainer = document.getElementById('my-checkout-container')
        checkoutContainer.innerHTML = (document.getElementById("KCO").value).replace(/\\"/g, "\"").replace(/\\n/g, "");
        var scriptsTags = checkoutContainer.getElementsByTagName('script')
        for (var i = 0; i < scriptsTags.length; i++) {
            var parentNode = scriptsTags[i].parentNode
            var newScriptTag = document.createElement('script')
            newScriptTag.type = 'text/javascript'
            newScriptTag.text = scriptsTags[i].text
            parentNode.removeChild(scriptsTags[i])
            parentNode.appendChild(newScriptTag)
        }
         });
		});

		 

    
    </script>

</head>

<body>

	<input type="button" id="ajaxBtn" value="Place Order" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;" />

	<textarea style="display: none" id="KCO">

    </textarea>



	<div id="my-checkout-container"></div>


</body>

</html>