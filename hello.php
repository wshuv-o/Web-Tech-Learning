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
                                <td><input type="text" name="firstname" id="firstname"></td>
                            </tr>
                            <tr>
                                <td> Last Name</td>
                                <td>:</td>
                                <td><input type="text" name="lastname" id="lastname"></td>
                            </tr>
                            <tr>
                                <td> Gender</td>
                                <td>:</td>
                                <td>
                                    <input type="radio" id="male" name="gender" value="Male"> <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="Female"> <label for="female">Female</label>
                                </td>
                            </tr>
                            <tr>
                                <td> Father's Name</td>
                                <td>:</td>
                                <td><input type="text" name="fathername" id="fathername"></td>
                            </tr>
                            <tr>
                                <td> Mother's Name</td>
                                <td>:</td>
                                <td><input type="text" name="mothername" id="mothername"></td>
                            </tr>
                            <tr>
                                <td> Blood Group</td>
                                <td>:</td>
                                <td>
                                    <select name="blood" id="blood">
                                        <option value="a+">A+</option>
                                        <option value="a-">A-</option>
                                        <option value="b+">B+</option>
                                        <option value="b-">B-</option>
                                        <option value="ab+">AB+</option>
                                        <option value="ab-">AB-</option>
                                        <option value="o+">O+</option>
                                        <option value="o-">O-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> Religion</td>
                                <td>:</td>
                                <td>
                                    <select name="religion" id="religion">
                                        <option value="islam">Islam</option>
                                        <option value="christian">Christian</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddhist">Buddhist</option>
                                    </select>
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
                                <td><input type="text" name="email" id="email"></td>
                            </tr>
                            <tr>
                                <td>Phone/Mobile</td>
                                <td>:</td>
                                <td><input type="text" name="contactno" id="contactno"></td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>:</td>
                                <td><input type="text" name="website" id="website" ></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td>
                                    <fieldset>
                                        <legend>Present Address:</legend>
                                        <select name="country" id="country">
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Singapore">Singapore</option>
                                        </select>
                                        <select name="city" id="city">
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Islambad">Islambad</option>
                                            <option value="abc">ABC</option>
                                        </select>
                                        <br>
                                        <br>
                                        <textarea name="address" id="" cols="30" rows="4" placeholder="Road/Street/City"></textarea>
                                        <br>
                                        <br>
                                        <input type="text" name="postcode" id="postcode" placeholder="Post Code">
                                    </fieldset>
                                </td>
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
                                    <td><input type="text" id="username" name="username"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td><input type="text" id="pass" name="pass"></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td>:</td>
                                    <td><input type="text" id="confirmpass" name="confirmpass"></td>
                                </tr>
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