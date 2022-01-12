

const targetDiv = document.getElementById("third");
const btn = document.getElementById("toggle");

let count;

function openDiv1() {
var x = document.getElementById("appearingHomepageAnnouncementDIV");
var y = document.getElementById("appearingHomepageNewsArticleDIV");
var z = document.getElementById("appearingHomepageEventsDIV");
var colorMaroon = "#800107";
var background = "#f3f4f6";
var unselectedTextTitle = "#810100";

    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";

    document.getElementById("openDivHolder1").style.backgroundColor = colorMaroon;
    document.getElementById("openDivTitle1").style.color = "white";

    document.getElementById("openDivHolder2").style.backgroundColor = background;
    document.getElementById("openDivTitle2").style.color = unselectedTextTitle;

    document.getElementById("openDivHolder3").style.backgroundColor = background;
    document.getElementById("openDivTitle3").style.color = unselectedTextTitle;


}
function openDiv2() {
	var x = document.getElementById("appearingHomepageAnnouncementDIV");
var y = document.getElementById("appearingHomepageNewsArticleDIV");
var z = document.getElementById("appearingHomepageEventsDIV");
var colorMaroon = "#800107";
var background = "#f3f4f6";
var unselectedTextTitle = "#810100";
    x.style.display = "none";
    y.style.display = "block";
    z.style.display = "none";

    document.getElementById("openDivHolder2").style.backgroundColor = colorMaroon;
    document.getElementById("openDivTitle2").style.color = "white";

    document.getElementById("openDivHolder1").style.backgroundColor = background;
    document.getElementById("openDivTitle1").style.color = unselectedTextTitle;

    document.getElementById("openDivHolder3").style.backgroundColor = background;
    document.getElementById("openDivTitle3").style.color = unselectedTextTitle;

}
function openDiv3() {
	var x = document.getElementById("appearingHomepageAnnouncementDIV");
var y = document.getElementById("appearingHomepageNewsArticleDIV");
var z = document.getElementById("appearingHomepageEventsDIV");
var colorMaroon = "#800107";
var background = "#f3f4f6";
var unselectedTextTitle = "#810100";
    x.style.display = "none";
    y.style.display = "none";
    z.style.display = "block";

    document.getElementById("openDivHolder3").style.backgroundColor = colorMaroon;
    document.getElementById("openDivTitle3").style.color = "white";

    document.getElementById("openDivHolder2").style.backgroundColor = background;
    document.getElementById("openDivTitle2").style.color = unselectedTextTitle;

    document.getElementById("openDivHolder1").style.backgroundColor = background;
    document.getElementById("openDivTitle1").style.color = unselectedTextTitle;


}


function onloadFunctions() {

}


function openAllNewsNewsPage() {
	var newspagePaginate = document.getElementById("appearingAllNewsDIV");
}

function onloadOrgFunctions() {
	console.log('2');
}




function hello() {
	console.log('hello world');
}