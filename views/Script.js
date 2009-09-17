var tables = new Array();

var headerRowDivs = new Array();

var headerColumnDivs = new Array();

var bodyDivs = new Array();

var widths = new Array();

var heights = new Array();

var borderHorizontals = new Array();

var borderVerticals = new Array();

var tableWidths = new Array();

var tableHeights = new Array();

var arrayCount = 0;

var paddingTop = 0;

var paddingBottom = 0;

var paddingLeft = 0;

var paddingRight = 0;





function ScrollTableAbsoluteSize(table, width, height)

{

	ScrollTable(table, null, null, width, height);

}



function ScrollTableRelativeSize(table, borderHorizontal, borderVertical)

{

	ScrollTable(table, borderHorizontal, borderVertical, null, null);

}



function ScrollTable(table, borderHorizontal, borderVertical, width, height)

{

	var childElement = 0;

	if (table.childNodes[0].tagName == null)

	{

		childElement = 1;

	}

	

	var cornerDiv = table.childNodes[childElement].childNodes[0].childNodes[childElement].childNodes[childElement];

	var headerRowDiv = table.childNodes[childElement].childNodes[0].childNodes[(childElement + 1) * 2 - 1].childNodes[childElement];

	var headerColumnDiv = table.childNodes[childElement].childNodes[childElement + 1].childNodes[childElement].childNodes[childElement];

	var bodyDiv = table.childNodes[childElement].childNodes[childElement + 1].childNodes[(childElement + 1) * 2 - 1].childNodes[childElement];

	

	tables[arrayCount] = table;

	headerRowDivs[arrayCount] = headerRowDiv;

	headerColumnDivs[arrayCount] = headerColumnDiv;

	bodyDivs[arrayCount] = bodyDiv;

	borderHorizontals[arrayCount] = borderHorizontal;

	borderVerticals[arrayCount] = borderVertical;

	tableWidths[arrayCount] = width;

	tableHeights[arrayCount] = height;

	ResizeCells(table, cornerDiv, headerRowDiv, headerColumnDiv, bodyDiv);	

	

	widths[arrayCount] = bodyDiv.offsetWidth;

	heights[arrayCount] = bodyDiv.offsetHeight;

	arrayCount++;

	ResizeScrollArea();

	

	bodyDiv.onscroll = SyncScroll;

	if (borderHorizontal != null)

	{

		window.onresize = ResizeScrollArea;

	}

}



function ResizeScrollArea()

{

	var isIE = true;

	var scrollbarWidth = 17;

	if (!document.all)

	{

		isIE = false;

		scrollbarWidth = 19;

	}

	

	for (i = 0; i < arrayCount; i++)

	{

		bodyDivs[i].style.overflow = "scroll";

		bodyDivs[i].style.overflowX = "scroll";

		bodyDivs[i].style.overflowY = "scroll";

		var diffWidth = 0;

		var diffHeight = 0;

		var scrollX = true;

		var scrollY = true;

		

		var columnWidth = headerColumnDivs[i].offsetWidth;

		if (borderHorizontals[i] != null)

		{

			var width = document.documentElement.clientWidth - borderHorizontals[i] - columnWidth;

		}

		else

		{

			var width = tableWidths[i];

		}

		

		if (width > widths[i])

		{

			width = widths[i];

			bodyDivs[i].style.overflowX = "hidden";

			scrollX = false;

		}

		

		var columnHeight = headerRowDivs[i].offsetHeight;

		if (borderVerticals[i] != null)

		{

			var height = document.documentElement.clientHeight - borderVerticals[i] - columnHeight;

		}

		else

		{

			var height = tableHeights[i];

		}

		

		if (height > heights[i])

		{

			height = heights[i];

			bodyDivs[i].style.overflowY = "hidden";

			scrollY = false;

		}



		headerRowDivs[i].style.width = width + "px";

		headerRowDivs[i].style.overflow = "hidden";

		headerColumnDivs[i].style.height = height + "px";

		headerColumnDivs[i].style.overflow = "hidden";

		bodyDivs[i].style.width = width + scrollbarWidth + "px";

		bodyDivs[i].style.height = height + scrollbarWidth + "px";



		if (!scrollX && isIE)

		{

			bodyDivs[i].style.overflowX = "hidden";

			bodyDivs[i].style.height = bodyDivs[i].offsetHeight - scrollbarWidth + "px";

		}

		if (!scrollY && isIE)

		{

			bodyDivs[i].style.overflowY = "hidden";

			bodyDivs[i].style.width = bodyDivs[i].offsetWidth - scrollbarWidth + "px";

		}

		if (!scrollX && !scrollY && !isIE)

		{

			bodyDivs[i].style.overflow = "hidden";

		}

	}

}



function ResizeCells(table, cornerDiv, headerRowDiv, headerColumnDiv, bodyDiv)

{

	var childElement = 0;

	if (table.childNodes[0].tagName == null)

	{

		childElement = 1;

	}

	

	SetWidth(

		cornerDiv.childNodes[childElement].childNodes[childElement].childNodes[0].childNodes[childElement],

		headerColumnDiv.childNodes[childElement].childNodes[childElement].childNodes[0].childNodes[0]);

		

	SetHeight(

		cornerDiv.childNodes[childElement].childNodes[childElement].childNodes[0].childNodes[childElement],

		headerRowDiv.childNodes[childElement].childNodes[childElement].childNodes[0].childNodes[childElement]);

	

	var headerRowColumns = headerRowDiv.childNodes[childElement].childNodes[childElement].childNodes[0].childNodes;

	var bodyColumns = bodyDiv.childNodes[childElement].childNodes[childElement].childNodes[0].childNodes;

	for (i = 0; i < headerRowColumns.length; i++)

	{

		if (headerRowColumns[i].tagName == "TD" || headerRowColumns[i].tagName == "TH")

		{

			SetWidth(

				headerRowColumns[i], 

				bodyColumns[i], 

				i == headerRowColumns.length - 1);

		}

	}

	

	var headerColumnRows = headerColumnDiv.childNodes[childElement].childNodes[childElement].childNodes;

	var bodyRows = bodyDiv.childNodes[childElement].childNodes[childElement].childNodes;

	for (i = 0; i < headerColumnRows.length; i++)

	{

		if (headerColumnRows[i].tagName == "TR")

		{

			SetHeight(

				headerColumnRows[i].childNodes[0],

				bodyRows[i].childNodes[childElement],

				i == headerColumnRows.length - 1);

		}

	}

}



function SetWidth(element1, element2, isLastColumn)

{

	var diff = paddingLeft + paddingRight;

	

	if (element1.offsetWidth < element2.offsetWidth)

	{

		element1.childNodes[0].style.width = element2.offsetWidth - diff + "px";

		element2.childNodes[0].style.width = element2.offsetWidth - diff + "px";

	}

	else

	{

		element2.childNodes[0].style.width = element1.offsetWidth - diff + "px";

		element1.childNodes[0].style.width = element1.offsetWidth - diff + "px";

	}

}



function SetHeight(element1, element2, isLastRow)

{

	var diff = paddingTop + paddingBottom;

	

	if (element1.offsetHeight < element2.offsetHeight)

	{

		element1.childNodes[0].style.height = element2.offsetHeight - diff + "px";

		element2.childNodes[0].style.height = element2.offsetHeight - diff + "px";

	}

	else

	{

		element2.childNodes[0].style.height = element1.offsetHeight - diff + "px";

		element1.childNodes[0].style.height = element1.offsetHeight - diff + "px";

	}

}



function SyncScroll()

{

	for (i = 0; i < arrayCount; i++)

	{

		headerRowDivs[i].scrollLeft = bodyDivs[i].scrollLeft;

		headerColumnDivs[i].scrollTop = bodyDivs[i].scrollTop;

	}

}