<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Calls</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h2 class="p-3">Ajax Calls</h2>
    <div class="container"></div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        
        function onSuccess($successMsg , $data) {
            $( ".container").append( `
            <div class='alert alert-success'> 
                <h5> ` + $successMsg + `</h5> 
                <p> ` + $data + `</p> 
            </div>
            `);
        }

        function onError($jqXHR, $errorMsg, $thrownError) {

            $( ".container").append( `
            <div class='alert alert-danger'> 
                <h5> ` + $errorMsg + `</h5> 
                <p> <b>Error:</b> ` + $thrownError + `</p> 
            </div>
            `);
        }

        function Ajax($url, $data, $success, $errorMsg) {
            $.ajax({
                url: $url,
                type: "POST",
                data: $data,
                success: function (data) {
                    onSuccess($success, data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    onError(jqXHR,$errorMsg,errorThrown);
                }

            });
        }

        $file1Data = {
            name: "file1.php",
            size: 300,
            createdBy: "Masnoor Khan"
        };

        $file2Data = {
            name: "file2.php",
            size: 300,
            createdBy: "Jawad Khan"
        };

        $file3Data = {
            name: "file34.php",
            size: 300,
            createdBy: "Aizaz Khan"
        };

        Ajax($file1Data.name,$file1Data, "Data Recieved  At " + $file1Data.name + " Is ", "Error Occured in Calling : " + $file1Data.name);
        Ajax($file2Data.name,$file2Data, "Data Recieved  At " + $file2Data.name + " Is ", "Error Occured in Calling :  " + $file2Data.name);
        Ajax($file3Data.name,$file3Data, "Data Recieved  At " + $file3Data.name + " Is ", "Error Occured in Calling :  " + $file3Data.name);

    </script>
</body>
</html>