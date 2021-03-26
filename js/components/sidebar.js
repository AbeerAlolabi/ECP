class Sidebar extends HTMLElement {
    constructor() {
      super();
    }
    connectedCallback() {
        this.innerHTML = `
        <style>
        
            .sidebar {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #eee;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }
            .sidebarLink{
                padding-top: 25px;
            }
            
            .sidebar a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 16px;
                color: #064E4a;
                display: block;
                transition: 0.3s;
                font-weight: 600;
            }
            
            .sidebar a:hover {
                color: rgb(255,139,0);
            }
                        
            .sidebar .closebtn {
                position: absolute;
                top: 0;
                right: 10px;
                font-size: 36px;
                margin-left: 50px;
            }
        </style>

        <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="sidebarLink">
          <a href="adminHomePage.html"> Admin Home Page </a>
          <a href="#">Review User's Post</a>
          <a href="#">Add A New Event</a>
          <a href="adminPost.html">Create A Blog</a>
          <a href="#">Create Account</a>
        </div>
      </div>
        `;}
}

customElements.define('sidebar-component', Sidebar);

function openNav() {
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
  }
  
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
