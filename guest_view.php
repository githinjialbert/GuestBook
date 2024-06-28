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
        <form action="upload.php" method="post" enctype="multipart/form-data">
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
            <option value="" disabled selected>Select your nationality</option>
            <?php 
            ?>
        </select>

        <label for="file">Upload a picture</label>
        <input type="file" id="file" name="file" accept="image/*" required>

        <button type="submit">Submit</button>
    </form>
</main>
</body>
</html>
