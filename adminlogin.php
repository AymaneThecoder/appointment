<?php 



	include("connection.php");
	


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$admin_name = $_POST['admin_name'];
		$password = $_POST['password'];

		if(!empty($admin_name) && !empty($password) && !is_numeric($admin_name))
		{

			
			$query = "select * from admin where admin_name = '$admin_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$admin_data = mysqli_fetch_assoc($result);
					
					if($admin_data['password'] === $password &&$admin_data['admin_name'] === $admin_name)
					{

						
						header("Location: display.php");
						die;
					}
				}
			}
			
			echo "<p style:'font-weight:bold ; padding-left:50px'>Le nom ou le mot  de Passe n'est Pas Correcte ! ";
		}else
		{
			echo "<p> style:'font-weight:bold ; padding-left:50px'Le nom ou le mot Passe n'est Pas Correcte ! ";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Se connecter</title>
</head>
<style>
	/*CSS Reset*/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
button,form, fieldset, input, textarea {
margin: 0;
padding: 0;
outline: 0;
border: 0;
background: transparent;
vertical-align: baseline;
font-size: 100%;
}
body {line-height: 1;}
h1, h2, h3, h4, h5, h6 {font-weight: normal;}
ol, ul {list-style: none;}
blockquote, q {quotes: none;}
blockquote:before, blockquote:after,
q:before, q:after {content: '';content: none;}

:focus {outline: 0;}

ins {text-decoration: none;}
del {text-decoration: line-through;}

table {border-spacing: 0;border-collapse: collapse;}
address, caption, cite, code, dfn, em, strong, var { font-weight: normal; font-style: normal;}
caption, th { text-align: left; font-weight: normal; font-style: normal;}
html{background-color: #3a3a3a;}
body{
min-height: 100%;
height: 100%;
background:url(http://subtlepatterns.subtlepatterns.netdna-cdn.com/patterns/navy_blue.png) repeat;
font-weight: lighter;
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
-webkit-font-smoothing: subpixel-antialiased;
}
a{color: #b1c;text-decoration: none;}
p{display: block;width: 300px;margin-left: -180px;margin-top: -5px;}
p a{color: #a4a4a4;font-size: 10px;text-decoration: none;}
p a:hover{color: #be1dcc;border-bottom: 1px solid gray}
#warp{
position: relative;
margin: 50px auto 0;
width: 400px;
text-align:center;
color:white;
}
form{
display: block;
width: 400px;
height: 300px;}
h1{
color: #b6b6b6;
font-weight: bolder;
font-size: 60px;
}
.admin{
height: 250px;
float: left;
width: 200px;
border-right: 1px solid #333333;
text-align: left;
left:0;
top:0;
transition: all 200ms ease-in 100ms;
}
.cms{
height: 250px;
top: 70px;
left: -62px;
float: right;
width: 150px;
text-align: right;
transition: all 200ms ease-in 100ms;
}
.admin,.cms{
position: relative;
display: block;
overflow: hidden;
transform: rotate(30deg);
}
.cms h1{
margin-left: -10px;
color:#838385;
}
.roti,.rota{
position: relative;
display: block;
transform: rotate(-30deg);
}
.admin:hover h1,
.cms:hover h1{color: #be1dcc;}
.rota{margin-top: 80px;margin-left: 35px;}
.roti{margin-top: 80px;margin-right: 55px;}
input,button{
margin: 4px;
padding: 8px 6px;
width: 350px;
background: white;
color:black;
font-size: 10px;
transition: all 1s ease-out;
}
button{
margin-left: -230px;
background:#303030;
color:white;
text-align: right;
cursor: pointer;
transition: all 1s ease-out;
}
button:hover{
background:#be1dcc;
transition: all 0.3s ease-in;
}
input:hover{box-shadow: inset 0 0 5px rgba(190,29,204,0.6) }
input:focus{background: gray;color: white}
.up{
  top:100px;
  left:-60px;
}
.down{
  top:-100px;
  left:60px;
}
</style>
<body>

<div id="warp">
 Admin Login Commune
  <form  action="" id="formu" method="post">
    	<div class="admin">
			      <div class="rota">
				        <h1>ADMIN</h1>
        				<input id="username" type="text" name="admin_name" placeholder="name"/><br />
				        <input id="password" type="password" name="password" value="" placeholder="Password"/>
      			</div>
    		</div>
    		<div class="cms">
      			<div class="roti">
			        	<h1>Commune</h1>
				        <button id="valid" type="button" name="submit">Valid
							<input type="submit" style="background-color: black;color:white;">
						</button><br />
				        
      </div>
    		</div>
  	</form>
</div>
	
		
</body>
</html>