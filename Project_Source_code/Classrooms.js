var count=1;
function changebuttoncolor(btn)
{
	var property = document.getElementById(btn);

	var color1 = property.style.backgroundColor;
	
	if(color1 == "white")
	{
		property.style.backgroundColor = "black";
		property.style.color = "white";
		count = 1;
	}
	else
	{
		property.style.backgroundColor = "white";
		property.style.color = "black";
		count = 0;
	}
}

function GetID()
{

	var str="";
	var el = document.getElementById("f1");
	var i;
	var b=["b1","b2","b3","b4","b5","b6","b7","b8","b9","b10"];
	for(i=0;i<b.length;i++)
	{
		var property = document.getElementById(b[i]);
		var x = property.style.backgroundColor;
		if(x == 'white')
		{
			str+=property.value;
			str+=",";
		}	
	}
		el.elements['classes'].value=str;
}
