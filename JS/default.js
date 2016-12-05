document.addEventListener("DOMContentLoaded",function()
{
    var login = document.getElementById("login-button");
    login.addEventListener("click",function(){
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    if(username.value=="admin" && password.value=="admin1001"){
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function(){
        if (xmlHttp.readyState==4 && xmlHttp.status == 200)
        {
            document.getElementsByClassName("login-div")[0].innerHTML=xmlHttp.responseText;
              var header=document.getElementById("header");
               var button=document.createElement("BUTTON");
               var text=document.createTextNode("Logout");
               button.appendChild(text);
               button.setAttribute("id", "logoutclick");
               header.appendChild(button);
                logout();
        }
            
        };
        xmlHttp.open("GET","../HTML/add.html",true);
        xmlHttp.send();
    }
    if(username.value !="admin"){
         var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
        if (xmlHttp.readyState==4 && xmlHttp.status == 200)
        {
            var user_data = xmlHttp.responseText.split(" ");
            if (username.value == user_data[3] && password.value == user_data[4] )
            {
                document.getElementsByClassName("login-div")[0].innerHTML=xmlHttp.responseText;
                compose();
                logout();
            }
        }
    };
     xmlHttp.open("GET","../PHP/default.php?username="+username.value,true);
     xmlHttp.send();
    }
   /**/
    });
    
    
     function compose()
      {
          var m=document.getElementById("comp");
       m.addEventListener("click",function()
       {
           var xmlhhh=new XMLHttpRequest();
           xmlhhh.onreadystatechange= function()
           {
            if(xmlhhh.readyState==4 && xmlhhh.status ==200)
            {
                document.getElementsByClassName("login")[0].innerHTML=xmlhhh.responseText;
            }
           };
           xmlhhh.open("GET","../HTML/compose.html", true);
           xmlhhh.send();
       });
      }
    
    
            function logout(){
            var logout=document.getElementById("logoutclick");
            logout.addEventListener("click",function()
       {
           var xmlh = new XMLHttpRequest();
        xmlh.onreadystatechange = function()
         {
        if (xmlh.readyState == 4 && xmlh.status == 200) 
            {
                
        document.body.innerHTML=xmlh.responseText;
            }
             
         };
    xmlh.open("GET", "../PHP/logout.php", true);
    xmlh.send();
       });
       }
 
});
