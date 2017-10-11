
$(document).ready(main);
var contador=1;
function main()
{
	$('header').click(function()
	{
		if(contador==1)
		{
			$('#navMenu').animate(
			{
				left:'0'
			})
			contador=0;
		}
		else
		{	contador==1;
		
			$('#navMenu').animate(
			{
				left:'-100%'
			})
			contador=0;
		}
	});
}