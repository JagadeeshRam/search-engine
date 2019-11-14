<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Autocomplete Textbox using Bootstrap Typehead with Ajax PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
 </head>
 <body onload="ld()">
 <script>
 function ld()
 {
	 document.search_box.search.focus()
 }
</script>
<script type="text/javascript">
     function getSuggestion(query){
		 var ajax;
		 if(window.XMLHttpRequest)
		 {
		 ajax=new XMLHttpRequest();
		 }		 
	      else
		 ajax=new ActiveXObject("Microsoft.XMLHTTP");
	     ajax.onreadystatechange=function(){
		 if(ajax.staus==200 && ajax.readyState==4)
		 {
			 ajax.onreadystatechange=function() {
				 document.getElementById("suggestion").innerHTML=ajax.response;
			 }
		 }
				ajax.open("GET","suggestion.php?query=" +query, false);
				ajax.send();
		 
		 } 
	 }
  </script>
<style>
body
{
	margin:10%
	
}
</style>
<div class="form-group">
				<div class="row">
				<label class="col-sm-2" for="About">About Store</label>
				</div>
				</div>
	
	<center>
	<form method="GET" action="search.php">
	<input type="hidden" name="page" value="0"/>
	<img src="mi.jpg" class="img-fulid" alt="search">
	<input type="text" name="country" id="country" class="form-control input-lg" autocomplete="off" placeholder="search here"  style="width:60%;margin-top:10px">

		<br>
	
	<input type="submit" class="btn btn-outline-primary"  value="google search now">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="reset" class="btn btn-outline-secondary"  value="i m feeling lucky">
	</div>
		</div>
		
	</center>
	</form>
<div id="suggestion" style="width:450px">
	 
	 
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#country').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>