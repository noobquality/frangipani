// JavaScript Document
var request;
function createrequest()
{
	try
	{
		request = new XMLHttpRequest();
		}
		catch (trymicrosoft)
		{
			try
			{
				request = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch (othermicrosost)
				{
					try
					{
						request = new ActiveXObject("Microsoft.XMLHTTP");
						}
						catch (failed)
						{
							request = false;
							}
					}
			}
			if (!request)
			alert ("Error initialing ajax request, silahkan update browser anda!");
	}

function getData()
{
	var category = document.getElementById('category').value;
	var variable = 'ax_product.php?category='+category;
	request.open('get',variable);
	request.onreadystatechange = parseGetData;
	request.send('');
} 
function parseGetData()
{
	if (request.readyState == 4){
	var answer = request.responseText;
	document.getElementById("listData").innerHTML = answer;
	}
	else{
		var answer = "<div><img src=''images/spinner.gif''></div>";
		document.getElementById("listData").innerHTML = answer;
		}
}

function getUser()
{
	var username = document.getElementById('username').value;
	var variable = 'ax_user.php?username='+username;
	request.open('get',variable);
	request.onreadystatechange = parseGetUser;
	request.send('');
}
function parseGetUser()
{
	if (request.readyState == 4)
	{
		var answer = request.responseText;
		document.getElementById("listData").innerHTML = answer;
		}
	else{
		var answer = "<div><img src='images/spinner.gif' height='15px'></div>";
		document.getElementById("listData").innerHTML = answer;
		}
} 