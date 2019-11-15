<html>
<head>
<title>PHP Test</title>
<link rel="stylesheet" type="text/css" href="style.css">

<script>


var currentPage;
window.onload = function(){
  if (window.location.href.indexOf('?page') == -1)
  {
    setPage("presentation.php");
  }else{
    getPage();
  }
}

function getPage() {
  var currentPage= "<?php if(isset($_GET['page'])){echo $_GET['page'];} ?>";

  var buttonsMenu = document.getElementsByClassName("menuButton");
  for(let i =0; i<buttonsMenu.length;i++)
  {
    buttonsMenu[i].classList.remove('isPage')
  }
  if(currentPage == 'presentation.php'){
    buttonsMenu[0].classList.add('isPage');
  }
  if(currentPage == 'projets.php'){
    buttonsMenu[1].classList.add('isPage');
  }
  if(currentPage == 'contact.php'){
    buttonsMenu[2].classList.add('isPage');
  }
  var myRequest = new XMLHttpRequest();
  myRequest.open('GET', currentPage);
  myRequest.onreadystatechange = function () {
    if (myRequest.readyState === 4) {
      document.getElementById('ajax-content').innerHTML = myRequest.responseText;
    }
  };
  myRequest.send();
}

function setPage(link) {
  window.location.href = "admin.php?page="+link+"";
  getPage();


}

</script>

</head>
<body>

<div id="header">
  <div id="corner" onclick="setPage('presentation.php')">
    <div id="name">Jean Rimlinger</div>
    <div id="titre">Game Maker</div>
  </div>
  <div id="menu">
    <div class="menuSpace"></div>
    <div class="menuButton" onclick="setPage('presentation.php')"><p class="textCenter">Accueil</p></div>
    <div class="menuSpace"></div>
    <div class="menuButton" onclick="setPage('projets.php')"><p class="textCenter">Mes projets</p></div>
    <div class="menuSpace"></div>
    <div class="menuButton" onclick="setPage('contact.php')"><p class="textCenter">Contact</p></div>
  </div>
</div>
<div id="mainPage">
  <div id="ajax-content"></div>

</div>
</body>
</html>
