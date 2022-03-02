<!DOCTYPE html>
<html>
    <head>
        <script src="./jquery/jquery-3.6.0.min.js"></script>
    <head>
    <body>
        This is an updated week 5 website using ajax!
        <form onsubmit ="return(insertInfo())">
            <input type = text id = firstname>
            <input type = text id = lastname>
            <input type = text id = telephone>
            <input type=submit value=submit>
        </form>


        <div id=showinfo ></div>
        <script>
            function insertInfo(){
                val1 = $("#firstname").val();
                val2 = $("#lastname").val();
                val3 = $("#telephone").val();

                $.get("./week7ajax.php", {"cmd": "create", "firstname" : val1, "lastname" : val2, "telephone" : val3}, function(data) {
                    $("#showinfo").html(data); 
                } );
                return(false);
            }

            function deleteInfo(id){
                $.get("./week7ajax.php", {"cmd": "delete", "id" : id}, function(data) {
                    $("#showinfo").html(data); 
                } );
                return(false);
            }

            function showinfo() {
                $.get("./week7ajax.php", {"cmd": ""}, function(data) {
                    $("#showinfo").html(data);
                    
                } );
                return (false);
            }
            showinfo();
            

        </script>
    <body>
</html>




