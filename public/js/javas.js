

const targetDiv = document.getElementById("third");
const btn = document.getElementById("toggle");

let count;

function LatestFunction() {
    // var latestDiv = document.getElementById("LatestNewsDiv");

    // latestDiv.style.display = "none";
    console.log('Latest News');
    var x = document.getElementById("homepageLatestNewsDiv");
    var y = document.getElementById("homepageFeaturedNewsDiv");
    x.style.display = "block";
    y.style.display = "none";

    // document.getElementById("openDivHolder2").style.backgroundColor = colorMaroon;
}
function FeaturedFunction() {
    console.log('Featured News');
    var x = document.getElementById("homepageLatestNewsDiv");
    var y = document.getElementById("homepageFeaturedNewsDiv");
    x.style.display = "none";
    y.style.display = "block";
}

function homepageNewsFunction() {
    console.log(3);
    var x = document.getElementById("homepageLatestNewsDiv");
    var y = document.getElementById("homepageFeaturedNewsDiv");
    x.style.display = "block";
    y.style.display = "none";
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
    console.log(3);
    var x = document.getElementById("homepageLatestNewsDiv");
    var y = document.getElementById("homepageFeaturedNewsDiv");
    x.style.display = "block";
    y.style.display = "none";
}


function openAllNewsNewsPage() {
	var newspagePaginate = document.getElementById("appearingAllNewsDIV");
}

function onloadOrgFunctions() {
	console.log('2');
    console.log("authOnload");
}

function updateSelectedPasswordUserData() {
    var selected_User_Update_Modal = document.getElementById("SelectedUserUpdateData");
    var selected_User_Pass_Update_Modal = document.getElementById("SelectedUserPasswordUpdateData");
    var selected_User_Role_Update_Modal = document.getElementById("SelectedUserRoleUpdateData");

    selected_User_Update_Modal.style.display="none";
    selected_User_Pass_Update_Modal.style.display = "block";
    selected_User_Role_Update_Modal.style.display = "none";

}

function updateSelectedRoleUserData() {
    var selected_User_Update_Modal = document.getElementById("SelectedUserUpdateData");
    var selected_User_Pass_Update_Modal = document.getElementById("SelectedUserPasswordUpdateData");
    var selected_User_Role_Update_Modal = document.getElementById("SelectedUserRoleUpdateData");

    selected_User_Update_Modal.style.display="none";
    selected_User_Pass_Update_Modal.style.display = "none";
    selected_User_Role_Update_Modal.style.display = "block";
    
}

function updateSelectedUserData() {
    var selected_User_Role_Update_Modal = document.getElementById("SelectedUserRoleUpdateData");
    var selected_User_Update_Modal = document.getElementById("SelectedUserUpdateData");
    var selected_User_Password_Update_Modal = document.getElementById("SelectedUserPasswordUpdateData");
    
    selected_User_Update_Modal.style.display="block";
    selected_User_Password_Update_Modal.style.display="none";
    selected_User_Role_Update_Modal.style.display = "none";
}
function authOnload() {
    var selected_User_Update_Modal = document.getElementById("SelectedUserUpdateData");
    var selected_User_Password_Update_Modal = document.getElementById("SelectedUserPasswordUpdateData");
    var selected_User_Role_Update_Modal = document.getElementById("SelectedUserRoleUpdateData");
    
    selected_User_Update_Modal.style.display="none";
    selected_User_Password_Update_Modal.style.display="none";
    selected_User_Role_Update_Modal.style.display = "none";
}

function hello() {
	console.log('hello world');
}