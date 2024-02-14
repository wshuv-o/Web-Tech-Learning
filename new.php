<Html>
    <head>
        <title>Registration</title>

    </head>
    <body>
    <form action="new.php" method="post" novalidate>
        <h1>Registration</h1>
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend> General Information:</legend>
                        <table>
                            <tr>
                                <td> First Name</td>
                                <td>:</td>
                                <?php
                                    echo"<td> $_POST[firstname] </td>";
                                    ?>
                            </tr>
                            <tr>
                                <td> Last Name</td>
                                <td>:</td>
                                <?php
                                    echo"<td> $_POST[lastname] </td>";
                                    ?>
                            </tr>
                            <tr>
                                <td> Gender</td>
                                <td>:</td>

                                <?php
                                    echo"<td> $_POST[gender] </td>";
                                    ?>
                            </tr>
                            <tr>
                                <td> Father's Name</td>
                                <td>:</td>
                                <?php
                                    echo"<td> $_POST[fathername] </td>";
                                    ?>
                            </tr>
                            <tr>
                                <td> Mother's Name</td>
                                <td>:</td>
                                <?php
                                    echo"<td> $_POST[mothername] </td>";
                                    ?>
                            </tr>
                            <tr>
                                <td> Blood Group</td>
                                <td>:</td>
                                <td>
                                <?php
                                    echo"<td> $_POST[blood] </td>";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td> Religion</td>
                                <td>:</td>
                                <td>
                                <?php
                                    echo"<td> $_POST[religion] </td>";
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Contact Information:</legend>
                        <table>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <?php
                                    echo"<td> $_POST[email] </td>";
                                    ?>                            </tr>
                            <tr>
                                <td>Phone/Mobile</td>
                                <td>:</td>
                                <?php
                                    echo"<td> $_POST[contactno] </td>";
                                    ?>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>:</td>
                                <?php
                                    echo"<td> $_POST[website] </td>";
                                    ?>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <?php
                                    echo"<td> $_POST[address],  $_POST[city] - $_POST[postcode], $_POST[country]  </td>";
                                ?>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>
                    <td>
                        <fieldset>
                            <legend>Account Information:</legend>
                            <table>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <?php
                                            echo"<td> $_POST[username] </td>";
                                            ?>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <?php
                                            echo"<td> $_POST[pass] </td>";
                                            ?>                                </tr>
                                
                            </table>
                        </fieldset>
                        <br>
                        <input type="submit" id="register" value="Register">
                    </td>

                </td>
            </tr>
        </table>
    </form>
    </body>
</Html>

-----------------------------------------------------------------------------------------------------------------------------------------------------