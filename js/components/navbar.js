class Navbar extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
      <link rel="icon" href="images/icon.png" type="image/icon type">
        <style>
                
          .navbar-brand{
            padding: 0px 20px;
          }
  
          .navbar-nav{
            padding: 25px 0px 0px 50px;
          
          }
  
          .navbar{
            background-color: rgb(3,153,144);
          }
  
          .nav-link{
            color: rgb(244, 250, 246);
            font-size: large;
            font-weight: bold;
            margin: 0px 15px;
          }
  
          .nav-link:hover{
            color: rgb(255,139,0);
          }
  
          .dropdown-menu{
            margin: 0px 15px;
            padding-bottom: 0px;
            background-color: rgb(3,153,144);
            
          }
  
          .dropdown-menu > li{
            padding: 2px 10px;
            border-bottom: 2px solid rgba(0, 63,63,0.2);
          }
  
          .dropdown-menu > li:hover{
            background-color: rgb(255,139,0);
          }
  
          .dropdown-menu > li > a{
            color: rgb(244, 250, 246);
          }
  
          .dropdown-menu > li > a:hover{
  
          text-decoration: none;
          }
  
          .navbar-toggler{
            border: 1px solid rgba(244, 250, 246,0.8);
            background-color: rgba(55, 55, 55,0.1);
          }
  
          /* end of nav bar style */
  
        </style>
  
        
        <nav class="navbar navbar-expand-lg  ">
          <div class="container align-items-end" justify-content-center>
            <div class="navbar-header">
              <a class="navbar-brand" href="index.html"><img width= "100px" src="images/logo.png" alt="logo"></a>
            </div>
  
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon "></span>
            </button>
            
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="nav navbar-nav ">
                <li class="active nav-item"><a href="index.html" class="nav-link ">Home</a></li>
                <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">About<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#" class="">About us</a></li>
                    <li><a href="#">Our Members</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a href="blogs.html" class="nav-link">Blogs</a></li>
                <li class="nav-item"><a href="events.html" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact us</a></li>
              </ul>
            </div>
          </div>
        </nav>
        `;  
    }
  }
      customElements.define('navbar-component', Navbar);