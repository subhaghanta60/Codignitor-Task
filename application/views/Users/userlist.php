<html>
    <head>
        <title>User Details </title>

    </head>
    <body>
        <!-- <?php  print_r($users) ?> -->
        <h1>User Details</h1>

        <table>
            <tr>
                <td>First name </td>
                <td>Phone number</td>
            </tr> 
            <?php foreach($users as $user):  ?>
               
        
            <tr>
                <td><?php echo $user->Firstname ; ?></td> 
                <td><?php echo $user->Phone ; ?> </td>  
               
            </tr> 
            <?php endforeach; ?>            

        </table>

        

    </body>   


</html>