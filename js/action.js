        function action() {
            var h1Elements = document.getElementsByTagName("h3");
            var green = true;
            var margin1 = true;
    
            setInterval(function() {
                for (var i = 0; i < h1Elements.length; i++) {
                    if (green && margin1) {
                        h1Elements[i].style.color = "rgb(69, 115, 156)";
                    } else {
                        h1Elements[i].style.color = "gray";
                    }
                }
                green = !green;
                margin1 = !margin1;
            }, 1000); // Change la marge toutes les 1 seconde (1000 millisecondes)
        }
    
        window.onload = function() {
            action();
        }