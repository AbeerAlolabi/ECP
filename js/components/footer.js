class Footer extends HTMLElement {
    constructor(){
        super();
    }
    connectedCallback() {
        this.innerHTML =`
            <style>
            /* footer styling */

            footer{
                background-color:  rgb(6,78,74) ;
                margin-bottom: 0px;
                padding: 25px 0px;
                display: flex;
                margin-top:10px
            }
            
            footer h3 {
                color:rgb(255,254,246);
                font-size: 26px ;
            }
            
            footer p{
                color: rgb(151, 155, 152);
            }
            
            .related_sites{
                color: rgb(151, 155, 152);
                text-decoration: underline;
            }
            
            .related_sites:hover{
                color: rgb(255,139,0);
            }
            
            .material-icons{
               color: rgb(255,139,0);
               border: 1px solid rgba(244, 250, 246,0.8);
               padding: 3px;
               border-radius: 50%;
               font-size: 20px;
               align-items: flex-endS;
            }
            
            .material-icons:hover{
                border: 1px solid rgb(255,139,0);
             }
            
            .left_footer p{
                margin-left: 40px;
            }
            
            .middle_footer p{
                margin-left: 44px;
            }
            
            .right_footer p{
                margin-left: 43px;
            }
            .socialMedia{
                background-color: #eee;
                color: #064e4a;
                padding: 5px;
                text-align: center;
              }
              .socialMedia i{
                padding: 10px;
              }
            </style>
            <!-- font awesome icon link -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <footer>
            <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-12 col-md-4 left_footer ">
                    <h3><i class="material-icons">location_on</i> Address</h3> 
                    <p>
                    University of Toronto<br>
                    Ontario Institute for Studies in Education<br>
                    252 Bloor Street West<br>
                    Toronto, ON M5S 1V6<br>
                    </p>
                </div>
                
                <div class="col-12 col-md-4 col-lg-3  middle_footer"> 
                <h3> <i class="material-icons">&#xe7fb;</i> Related site</h3>
                <p><a href="https://www.oise.utoronto.ca/cidec/" class="related_sites">www.oise.utoronto.ca</a></p>
                </div>
        
                <div class="col-12 col-md-4  right_footer ">
                    <h3><i class="material-icons">&#xe159;</i> Email</h3>
                    <p>ecp.oise@gmail.com </p>
                </div>
        
            </div> 
            </div>
        </footer>
        <div class="container-fluid ">
        <div class="row justify-content-center socialMedia">
          <div class="col-12 col-md-4 ">
            <a href="https://www.facebook.com/"><i class="fa fa-facebook-square" style="font-size:36px;color:#064e4a;"></i></a>
            <a href="https://twitter.com/"><i class="fa fa-twitter" style="font-size:36px;color:#064e4a;"></i></a>
            <a href="https://www.linkedin.com/"><i class="fa fa-linkedin-square" style="font-size:36px;color:#064e4a;"></i></a>
    
          </div>
        </div>
      </div>
        `;
    }
}

customElements.define('footer-component', Footer);
//facebook color :	#4267B2
//Twitter color : #006192

