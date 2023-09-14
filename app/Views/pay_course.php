<title>Donate</title>
    <body>
        <br>
        <div id="side_navbar">
        <?php
            if(!$userInfo['photo']){
                echo '<br><img src="writable/uploads_photo/default.png"width="180px" height="" alt="profile_photo">'.'<br>';
            } else {
            echo '<br><img src="writable/uploads_photo/'.($userInfo['photo']).'"width="180px" height="" alt="profile_photo">'.'<br>';
            }
            echo '<h3>'.($username['username']).'</h3><br>';
        ?>
            <nav class="nav flex-column">
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>profile_display">Profile</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>course">Courses</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>messages">Messages</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>favourite">Favourite</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>pay_course">Donate</a></li>
                <li><a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>wishlist">Wishlist</a></li>
                <form action="<?php echo base_url(); ?>upload_video" method="get">
                    <button type="submit">Upload Course</button>
                </form>
            </nav>
        </div>
        

        <div id="pay_course">
            <div id="my_pay">
                <h2>Donate</h2>
                <p>You can donate funds to the website here</p>
            </div>
            <!-- Set up a container element for the button -->
            <div style="margin-top:200px; margin-left:230px;"id="paypal-button-container"></div>
             <!-- Include the PayPal JavaScript SDK -->
            <script src="https://www.paypal.com/sdk/js?client-id=AX_vMiufp-v-iowaaVpEz52erHti8xHbPR4-xQLtjBwcQaiyy2olOa1fBraYP8jUVPswI5_zb-XtI1Kr"></script> 
            <script>    
            // Render the PayPal button into #paypal-button-container
                paypal.Buttons({
                    // Set up the transaction
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '1.00'
                                }
                            }]
                        });
                        },
                    // Finalize the transaction
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(orderData) {
                            // Successful capture! For demo purposes:
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            let transaction = orderData.purchase_units[0].payments.captures[0];
                                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                            });
                        }
                }).render('#paypal-button-container');
            </script>
        </div>

        <div style="margin-left:230px; margin-top:100px;"class="map-header">
        <div id="my_pay">
            <h2>My Google Maps</h2>
        </div>
            <button class="map_button" style="margin-top:20px;color:red;" id="locate">Locate Me</button>
        </div>
        <!--The div element for the map -->
        <div id="map" style="margin-left:200px; width: 900px;height:600px;"></div>
    </body>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqF3CLz0GwYWZizJzUQD4fuhnwiMgZiu4&callback=initMap"></script>
<script>
    function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -27.4698, lng: 153.0251},
    zoom: 10,
    });

    const locateButton = document.getElementById("locate");
    locateButton.addEventListener("click", () => {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
        (position) => {
            const userLocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
            };

            const marker = new google.maps.Marker({
            position: userLocation,
            map,
            title: "Your Location",
            });

            map.setCenter(userLocation);
        },
        () => {
            alert("Unable to retrieve your location");
        }
        );
    } else {
        alert("Geolocation is not supported by your browser");
    }
    });
    }
</script>