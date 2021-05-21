function aalert( )
{
	//formValidation();
	
	var x1,x2,x3,x4,x5;
	var txt, slen;

	txt = document.getElementById("x_name").value;

	slen = txt.length;
	if (slen<2)
	{
		window.alert("Name cannot be so short");
	}

	x1 = document.getElementById("x_name").value;
	x2 = document.getElementById("x_date").value;
	x3 = document.getElementById("x_mail").value;
	x4 = document.getElementById("x_pn").value;

	//if (x3 == "")
	//{
		if (x1 != "" && x2 != "" && x3 != "" && x4 != "")
		{
			window.alert("A verification code has been sent to your email.");
		}
	//}
}


function my_un()
{
    document.getElementById("uni").style.display='block';
}
function vis()
{
    document.getElementById("vis").style.display='block';
}

