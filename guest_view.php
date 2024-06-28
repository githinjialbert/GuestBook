<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Guest Registration Form</title>
</head>
<body>
    <main>
        <h1>Guest Registration Form</h1>
        <p>Welcome to Moya Safari Villa, please fill out the details <br> below in order for us to check you in.</p>
        <form action="includes/guest_contr.inc.php" method="post" enctype="multipart/form-data">
        <label for="fname">Name</label>
        <input type="text" id="fname" name="fname" placeholder="Firstname" required>

        <input type="text" id="lname" name="lname" placeholder="Lastname" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="passport">Passport or Identity No</label>
        <input type="text" id="passport" name="passport" required>

        <label for="address">Street Address</label>
        <input type="text" id="address" name="address" required>

        <label for="address2">Street Address Line 2</label>
        <input type="text" id="address2" name="address2">

        <label for="city">City</label>
        <input type="text" id="city" name="city" required>

        <label for="county">County</label>
        <input type="text" id="county" name="county" required>

        <label for="postal">Postal/Zip Code</label>
        <input type="text" id="postal" name="postal" required>

        <label for="country">Nationality</label>
        <select id="country" name="country" required>
            <option value="" disabled selected>Select your nationality
            </option>
            <?php
            $countries = 
            [ 
                "Afghanistan", "Albania", "Algeria", "Andorra", "Angola",
                "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
                "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados",
                "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
                "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei",
                "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia",
                "Cameroon", "Canada", "Central African Republic", "Chad", "Chile",
                "China", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the",
                "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus",
                "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic",
                "East Timor (Timor-Leste)", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
                "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji",
                "Finland", "France", "Gabon", "Gambia", "Georgia",
                "Germany", "Ghana", "Greece", "Grenada", "Guatemala",
                "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras",
                "Hungary", "Iceland", "India", "Indonesia", "Iran",
                "Iraq", "Ireland", "Israel", "Italy", "Jamaica",
                "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
                "Korea, North", "Korea, South", "Kosovo", "Kuwait", "Kyrgyzstan",
                "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia",
                "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar",
                "Malawi", "Malaysia", "Maldives", "Mali", "Malta",
                "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia",
                "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco",
                "Mozambique", "Myanmar (Burma)", "Namibia", "Nauru", "Nepal",
                "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria",
                "North Macedonia", "Norway", "Oman", "Pakistan", "Palau",
                "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                "Philippines", "Poland", "Portugal", "Qatar", "Romania",
                "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
                "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal",
                "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia",
                "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Sudan",
                "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden",
                "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania",
                "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia",
                "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine",
                "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan",
                "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen",
                "Zambia", "Zimbabwe"
            ];
            foreach ($countries as $country) {
                echo "<option value=\"$country\">$country</option>";
            }
            ?>
        </select>

        <label for="file">Upload a picture</label>
        <input type="file" id="file" name="file" accept="image/*" required>

        <button type="submit">Submit</button>
    </form>
</main>
</body>
</html>
