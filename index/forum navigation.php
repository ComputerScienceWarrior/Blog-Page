<html>
        <head>
            <link rel="stylesheet" type="text/css" href="Forum navigation.css">
        </head>

        <body>
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">List of Blogs</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="/BlogEntry.php?name1=value1&name2=value2">Link 0</a>
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div>
        <script>/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {

                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }</script>
        </body>
</html>


