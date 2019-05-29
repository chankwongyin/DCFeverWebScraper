<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>DCFever Web Scraper</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>DCFever Web Scraper</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- <form action="scraper.php" method="GET"> -->
                    <form action="" method="">

                        <div class="form-group">
                            <label for="item" id="label">Search: </label>
                            <input type="text" name="item" id="item" class="form-control"
                                placeholder="Enter search item" />
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <div class="form-check-inline">
                                <input type="number" name="min" min=0 id="min" value="" class="form-control"
                                    placeholder="Min" />
                                <span>to</span>
                                <input type="number" name="max" id="max" class="form-control" value=""
                                    placeholder="Max" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning" name="search" id="search" onclick=scrape()>
                            Search
                        </button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <br />
                    <ul class="list-group">
                        <!-- <li class="list-group-item">
                            <div class="row">
                                <div class="col-10 item-info">test</div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-info price-info">Info</button>
                                </div>
                            </div>
                        </li> -->
                        <?php
include 'scraper.php';
?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <script>
    function scrape() {
        if (str.length == 0) {
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            var item = document.getElementById("item").value;
            var min = document.getElementById("min").value;
            var max = document.getElementById("max").value;
            xmlhttp.open("GET", "scraper.php?item="+item+"&min="+min+"&max="+max+"&search=" ,true);
            xmlhttp.send();
        }
    }
    </script>
</body>

</html>