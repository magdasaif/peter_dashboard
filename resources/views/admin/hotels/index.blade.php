@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-categories"></span> نتائج البحث
				</div>
				<div class="col-12 col-lg-4 p-2">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					<a onclick="javascript:getData();">
					<span class="btn btn-primary"><span class="fas fa-plus"></span>بحث</span>
					</a>
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... ">
					
				
					<input type="text" id="city_code" name="city_code" value="364">
					<input type="text" id="fromDate" name="fromDate" value="1652684686">
					<input type="text" id="toDate" name="toDate" value="1653071564">
					<input type="text" id="room_no" name="rooms_no" value="2">
					<input type="text" id="adultsCode" name="adultsCode" value="2">
					<input type="text" id="childern_no" name="childern_no" value="0">
					<input type="text" id="rateBasis" name="rateBasis" value="-1">

				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>الرابط</th>
						<th>الشعار</th>
						<th>العنوان</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
		</div>
	</div>
</div>
@endsection
<!-- <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script> -->
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('/js/xml2json.js') }}"></script>

<script>
	function  getData(){

		var city_code=document.getElementById('city_code').value;
		var fromDate=document.getElementById('fromDate').value;
		var toDate=document.getElementById('toDate').value;
		var room_no=document.getElementById('room_no').value;
		var adultsCode=document.getElementById('adultsCode').value;
		var childern_no=document.getElementById('childern_no').value;
		var rateBasis=document.getElementById('rateBasis').value;
// alert(city_code);

		var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/xml");
		myHeaders.append("Cookie", "PHPSESSID=a5e5275f688d83b6caffedda753cd5a2");

        var x2js = new X2JS();

       
        //get all hotels
        // var raw = "<customer>\n    <username>Amnahvisitor1</username>\n    <password>7ea4255960e43cb18bbcd5eb94b72318</password>\n    <id>1789605</id>\n      <source>1</source>\n    <product>hotel</product>\n        <language>en</language>\n    <request command=\"searchhotels\">\n        <bookingDetails>\n            <fromDate>1643806863</fromDate>\n            <toDate>1643806938</toDate>\n            <currency>1</currency>\n            <rooms no=\"1\">\n                <room runno=\"0\">\n                    <adultsCode>1</adultsCode>\n                    <children no=\"0\"></children>\n                    <rateBasis>-1</rateBasis>\n                </room>\n            </rooms>\n        </bookingDetails>\n        <return>\n            <filters xmlns:a=\"http://us.dotwconnect.com/xsd/atomicCondition/\" xmlns:c=\"http://us.dotwconnect.com/xsd/complexCondition\">\n                <city>364</city>\n                <noPrice>true</noPrice>\n            </filters>\n            <fields>\n                <field>noOfRooms</field>\n                <field>hotelName</field>\n                <field>cityName</field>\n                <field>cityCode</field>\n                <field>countryName</field>\n            </fields>\n        </return>\n    </request>\n</customer>";

		//getallcities
		//var raw = "<customer>\n    <username>Amnahvisitor1</username>\n    <password>7ea4255960e43cb18bbcd5eb94b72318</password>\n    <id>1789605</id>\n      <source>1</source>\n        <request command=\"getallcities\">  \n        <return>  \n            <filters>  \n                <countryCode></countryCode>  \n                <countryName></countryName>  \n            </filters>  \n            <fields>  \n                <field>countryName</field>  \n                <field>countryCode</field>  \n            </fields>  \n        </return>  \n    </request> \n    </customer>";
       
        //search hotels
		var raw = "<customer>\n    <username>Amnahvisitor1</username>\n    <password>7ea4255960e43cb18bbcd5eb94b72318</password>\n    <id>1789605</id>\n      <source>1</source>\n    <product>hotel</product>  \n    <request command=\"searchhotels\">  \n        <bookingDetails>  \n            <fromDate>"+fromDate+"</fromDate>  \n            <toDate>"+toDate+"</toDate>  \n            <currency>520</currency>  \n            <rooms no=\""+room_no+"\">  \n                <room runno=\"0\">  \n                    <adultsCode>"+adultsCode+"</adultsCode>  \n                    <children no=\""+childern_no+"\"></children>  \n                    <rateBasis>"+rateBasis+"</rateBasis>  \n                    <passengerNationality>81</passengerNationality>  \n                    <passengerCountryOfResidence>72</passengerCountryOfResidence>  \n                </room>  \n                <room runno=\"1\">  \n                    <adultsCode>2</adultsCode>  \n                    <children no=\"1\">  \n                        <child runno=\"0\">6</child>  \n                    </children>  \n                    <rateBasis>-1</rateBasis>  \n                    <passengerNationality>81</passengerNationality>  \n                    <passengerCountryOfResidence>72</passengerCountryOfResidence>  \n                </room>  \n            </rooms>  \n        </bookingDetails>  \n        <return>  \n            <filters xmlns:a=\"http://us.dotwconnect.com/xsd/atomicCondition\" xmlns:c=\"http://us.dotwconnect.com/xsd/complexCondition\">  \n                <city>"+city_code+"</city>  \n                <nearbyCities>false</nearbyCities>  \n                <c:condition>  \n                    <a:condition>  \n                        <fieldName>rating</fieldName>  \n                        <fieldTest>equals</fieldTest>  \n                        <fieldValues>  \n                            <fieldValue>563</fieldValue>  \n                        </fieldValues>  \n                    </a:condition>  \n                    <operator>AND</operator>  \n                    <a:condition>  \n                        <fieldName>price</fieldName>  \n                        <fieldTest>between</fieldTest>  \n                        <fieldValues>  \n                            <fieldValue>150</fieldValue>  \n                            <fieldValue>300</fieldValue>  \n                        </fieldValues>  \n                    </a:condition>  \n                </c:condition>  \n            </filters>  \n        </return>  \n    </request>  \n</customer>";



		//var raw = "<customer>\n    <username>Amnahvisitor1</username>\n    <password>7ea4255960e43cb18bbcd5eb94b72318</password>\n    <id>1789605</id>\n      <source>1</source>\n    <product>hotel</product>  \n    <request command=\"searchhotels\">  \n        <bookingDetails>  \n            <fromDate>1652684686</fromDate>  \n            <toDate>1653071564</toDate>  \n            <currency>520</currency>  \n            <rooms no=\"2\">  \n                <room runno=\"0\">  \n                    <adultsCode>2</adultsCode>  \n                    <children no=\"0\"></children>  \n                    <rateBasis>-1</rateBasis>  \n                    <passengerNationality>81</passengerNationality>  \n                    <passengerCountryOfResidence>72</passengerCountryOfResidence>  \n                </room>  \n                <room runno=\"1\">  \n                    <adultsCode>2</adultsCode>  \n                    <children no=\"1\">  \n                        <child runno=\"0\">6</child>  \n                    </children>  \n                    <rateBasis>-1</rateBasis>  \n                    <passengerNationality>81</passengerNationality>  \n                    <passengerCountryOfResidence>72</passengerCountryOfResidence>  \n                </room>  \n            </rooms>  \n        </bookingDetails>  \n        <return>  \n            <filters xmlns:a=\"http://us.dotwconnect.com/xsd/atomicCondition\" xmlns:c=\"http://us.dotwconnect.com/xsd/complexCondition\">  \n                <city>364</city>  \n                <nearbyCities>false</nearbyCities>  \n                <c:condition>  \n                    <a:condition>  \n                        <fieldName>rating</fieldName>  \n                        <fieldTest>equals</fieldTest>  \n                        <fieldValues>  \n                            <fieldValue>563</fieldValue>  \n                        </fieldValues>  \n                    </a:condition>  \n                    <operator>AND</operator>  \n                    <a:condition>  \n                        <fieldName>price</fieldName>  \n                        <fieldTest>between</fieldTest>  \n                        <fieldValues>  \n                            <fieldValue>150</fieldValue>  \n                            <fieldValue>300</fieldValue>  \n                        </fieldValues>  \n                    </a:condition>  \n                </c:condition>  \n            </filters>  \n        </return>  \n    </request>  \n</customer>";
        
		var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
        };

		fetch("https://xmldev.dotwconnect.com/gatewayV4.dotw", requestOptions)
        .then(response => response.text())
       // .then(result => console.log(result))
      //   .then(result => console.log(JSON.stringify(x2js.xml_str2json(result),null,2)))

       .then(result => {
            alert('iii');
          // document.getElementById('response').innerHTML=JSON.stringify(x2js.xml_str2json(result),null,2);
           //console.log(x2js.xml_str2json(result),null,2);
		   console.log(JSON.stringify(x2js.xml_str2json(result),null,2));
        })
        .catch(error => console.log('error', error));
	}

function xx(){

	var data = "<customer>\n    <username>Amnahvisitor1</username>\n    <password>7ea4255960e43cb18bbcd5eb94b72318</password>\n    <id>1789605</id>\n      <source>1</source>\n    <product>hotel</product>  \n    <request command=\"searchhotels\">  \n        <bookingDetails>  \n            <fromDate>1652684686</fromDate>  \n            <toDate>1653071564</toDate>  \n            <currency>520</currency>  \n            <rooms no=\"2\">  \n                <room runno=\"0\">  \n                    <adultsCode>2</adultsCode>  \n                    <children no=\"0\"></children>  \n                    <rateBasis>-1</rateBasis>  \n                    <passengerNationality>81</passengerNationality>  \n                    <passengerCountryOfResidence>72</passengerCountryOfResidence>  \n                </room>  \n                <room runno=\"1\">  \n                    <adultsCode>2</adultsCode>  \n                    <children no=\"1\">  \n                        <child runno=\"0\">6</child>  \n                    </children>  \n                    <rateBasis>-1</rateBasis>  \n                    <passengerNationality>81</passengerNationality>  \n                    <passengerCountryOfResidence>72</passengerCountryOfResidence>  \n                </room>  \n            </rooms>  \n        </bookingDetails>  \n        <return>  \n            <filters xmlns:a=\"http://us.dotwconnect.com/xsd/atomicCondition\" xmlns:c=\"http://us.dotwconnect.com/xsd/complexCondition\">  \n                <city>364</city>  \n                <nearbyCities>false</nearbyCities>  \n                <c:condition>  \n                    <a:condition>  \n                        <fieldName>rating</fieldName>  \n                        <fieldTest>equals</fieldTest>  \n                        <fieldValues>  \n                            <fieldValue>563</fieldValue>  \n                        </fieldValues>  \n                    </a:condition>  \n                    <operator>AND</operator>  \n                    <a:condition>  \n                        <fieldName>price</fieldName>  \n                        <fieldTest>between</fieldTest>  \n                        <fieldValues>  \n                            <fieldValue>150</fieldValue>  \n                            <fieldValue>300</fieldValue>  \n                        </fieldValues>  \n                    </a:condition>  \n                </c:condition>  \n            </filters>  \n        </return>  \n    </request>  \n</customer>";

	var xhr = new XMLHttpRequest();
	xhr.withCredentials = true;

	xhr.addEventListener("readystatechange", function() {
	if(this.readyState === 4) {
		console.log(this.responseText);
	}
	});

	xhr.open("POST", "https://xmldev.dotwconnect.com/gatewayV4.dotw");
	xhr.setRequestHeader("Content-Type", "application/xml");
	xhr.setRequestHeader("Cookie", "PHPSESSID=a5e5275f688d83b6caffedda753cd5a2");

	xhr.send(data);
}
</script>
@endsection