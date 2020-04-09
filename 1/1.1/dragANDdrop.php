<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop</title>
    <link rel="stylesheet" href="../../assets/b-4/css/bootstrap.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .subjects {
            font-size: 20px; 
            border: 1px solid blue; 
            border-radius: 5px;
            color: grey;
        }
        span::selection {
            color: none;
            background: none;
        }
        @media screen and (max-width: 990px) {
            .subjects {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
        <div class="container">
            <div class="row my-4">
                <div class="container-fluid">
                    <div class="row text-dark" style="text-decoration: underline;"><h2>SUBJECTS:</h2></div>
                    <div class="row my-1">
                        <div class="col-md-4">
                            <div class="text-center bg-dark py-2 mx-5 subjects"><td><span>ENGLISH</span></td></div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center bg-dark py-2 mx-5 subjects"> <span>COMPUTER</span></div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center bg-dark py-2 mx-5 subjects"> <span>URDU</span></div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-4">
                            <div class="text-center bg-dark py-2 mx-5 subjects"> <span>MATHEMATICS</span></div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center bg-dark py-2 mx-5 subjects"> <span>ELECTRONICS</span></div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center bg-dark py-2 mx-5 subjects"> <span>CALCULUS</span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center bg-dark py-2 mx-5 subjects"> <span>DLD</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center bg-dark py-2 mx-5 subjects"> <span>DATA STRUCTURE</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped table-dark" id="table1">
                        <thead>
                            <tr>
                            <th>DAYS</th>
                            <th>08:00 - 09:00</th>
                            <th>09:00 - 10:00</th>
                            <th>10:00 - 11:00</th>
                            <th>11:00 - 12:00</th>
                            <th>BREAK</th>
                            <th>01:00 - 02:00</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th>MONDAY</th>
                            <td>kjggsdlkjg</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>-</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th>TUESDAY</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>-</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th>WEDNESDAY</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>-</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th>THURSDAY</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>-</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th>FRIDAY</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>-</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th>SATURDAY</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>-</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th>SUNDAY</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>-</td>
                            <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    <script src="../../assets/b-4/js/jquery-3.4.1.min.js"></script>
    <script src="../../assets/b-4/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        

        $(function () {
            $(".subjects").find("span").addClass("draggable");
            $("#table1").find("td").addClass("draggable droppable");

            $("#table1 tr td").filter(function() {
                return $(this).text() == "-";
            }).removeClass("draggable droppable");


            $('.draggable').draggable({
                revert: "invalid",
                stack: ".draggable",
                helper: 'clone'
            });

            $('.droppable').droppable({
                accept: ".draggable",
                drop: function (event, ui) {
                    var droppable = $(this);
                    var draggable = ui.draggable;
                    droppable.empty();
                    draggable.clone().appendTo(droppable);
                }
            });
        });


    </script>
</body>
</html>