<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./style.css">
</head>
<body>

<div class="container">
	<header class="header">
		<h1 id="title" class="text-center">Online Form</h1>
		<p id="description" class="text-center">
			Please fill out the form below to submit your application.
		</p>
	</header>
	<div class="form-wrap">
		<form id="online_form"
              action="<?php echo htmlspecialchars("process.php"); ?>"
              method="post"
              enctype="multipart/form-data">

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="first_name" class="<?php echo isset($_SESSION['validation_errors']['first_name']) ? 'text-danger' : ''; ?>">
                            * <?php echo isset($_SESSION['validation_errors']['first_name']) ? $_SESSION['validation_errors']['first_name'] : 'First name'; ?>
                        </label>
						<input type="text"
                               value="<?php echo $_SESSION['first_name'] ?? ''; ?>"
                               name="first_name"
                               id="first_name"
                               placeholder="First name..."
                               class="form-control"
                               required />
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="middle_name" class="<?php echo isset($_SESSION['validation_errors']['middle_name']) ? 'text-danger' : ''; ?>">
                            <?php echo isset($_SESSION['validation_errors']['middle_name']) ? $_SESSION['validation_errors']['middle_name'] : 'Middle name'; ?>
                        </label>
						<input type="text"
                               value="<?php echo $_SESSION['middle_name'] ?? ''; ?>"
                               name="middle_name"
                               id="middle_name"
                               placeholder="Middle name (optional)"
                               class="form-control" />
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="last_name" class="<?php echo isset($_SESSION['validation_errors']['last_name']) ? 'text-danger' : ''; ?>">
                            * <?php echo isset($_SESSION['validation_errors']['last_name']) ? $_SESSION['validation_errors']['last_name'] : 'Last name'; ?>
                        </label>
						<input type="text"
                               value="<?php echo $_SESSION['last_name'] ?? ''; ?>"
                               name="last_name"
                               id="last_name"
                               placeholder="Last name..."
                               class="form-control"
                               required />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label for="address" class="<?php echo isset($_SESSION['validation_errors']['address']) ? 'text-danger' : ''; ?>">
                            * <?php echo isset($_SESSION['validation_errors']['address']) ? $_SESSION['validation_errors']['address'] : 'Address'; ?>
                        </label>
						<input type="text"
                               value="<?php echo $_SESSION['address'] ?? ''; ?>"
                               name="address"
                               id="address"
                               class="form-control"
                               placeholder="Address"
                               required />
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="state" class="<?php echo isset($_SESSION['validation_errors']['state']) ? 'text-danger' : ''; ?>">
                            * <?php echo isset($_SESSION['validation_errors']['state']) ? $_SESSION['validation_errors']['state'] : 'State'; ?>
                        </label>
						<select id="state" name="state" class="form-control" required>
                            <option value="CA" <?php echo $_SESSION['state'] ? ($_SESSION['state'] == 'CA' ? 'selected' : '') : 'selected' ?>>CA</option>
							<option value="AL" <?php echo $_SESSION['state'] == 'AL' ? 'selected' : ''; ?>>AL</option>
							<option value="AK" <?php echo $_SESSION['state'] == 'AK' ? 'selected' : ''; ?>>AK</option>
							<option value="AZ" <?php echo $_SESSION['state'] == 'AZ' ? 'selected' : ''; ?>>AZ</option>
							<option value="AR" <?php echo $_SESSION['state'] == 'AR' ? 'selected' : ''; ?>>AR</option>
							<option value="CO" <?php echo $_SESSION['state'] == 'CO' ? 'selected' : ''; ?>>CO</option>
							<option value="CT" <?php echo $_SESSION['state'] == 'CT' ? 'selected' : ''; ?>>CT</option>
							<option value="DE" <?php echo $_SESSION['state'] == 'DE' ? 'selected' : ''; ?>>DE</option>
							<option value="DC" <?php echo $_SESSION['state'] == 'DC' ? 'selected' : ''; ?>>DC</option>
							<option value="FL" <?php echo $_SESSION['state'] == 'FL' ? 'selected' : ''; ?>>FL</option>
							<option value="GA" <?php echo $_SESSION['state'] == 'GA' ? 'selected' : ''; ?>>GA</option>
							<option value="HI" <?php echo $_SESSION['state'] == 'HI' ? 'selected' : ''; ?>>HI</option>
							<option value="ID" <?php echo $_SESSION['state'] == 'ID' ? 'selected' : ''; ?>>ID</option>
							<option value="IL" <?php echo $_SESSION['state'] == 'IL' ? 'selected' : ''; ?>>IL</option>
							<option value="IN" <?php echo $_SESSION['state'] == 'IN' ? 'selected' : ''; ?>>IN</option>
							<option value="IA" <?php echo $_SESSION['state'] == 'IA' ? 'selected' : ''; ?>>IA</option>
							<option value="KS" <?php echo $_SESSION['state'] == 'KS' ? 'selected' : ''; ?>>KS</option>
							<option value="KY" <?php echo $_SESSION['state'] == 'KY' ? 'selected' : ''; ?>>KY</option>
							<option value="LA" <?php echo $_SESSION['state'] == 'LA' ? 'selected' : ''; ?>>LA</option>
							<option value="ME" <?php echo $_SESSION['state'] == 'ME' ? 'selected' : ''; ?>>ME</option>
							<option value="MD" <?php echo $_SESSION['state'] == 'MD' ? 'selected' : ''; ?>>MD</option>
							<option value="MA" <?php echo $_SESSION['state'] == 'MA' ? 'selected' : ''; ?>>MA</option>
							<option value="MI" <?php echo $_SESSION['state'] == 'MI' ? 'selected' : ''; ?>>MI</option>
							<option value="MN" <?php echo $_SESSION['state'] == 'MN' ? 'selected' : ''; ?>>MN</option>
							<option value="MS" <?php echo $_SESSION['state'] == 'MS' ? 'selected' : ''; ?>>MS</option>
							<option value="MO" <?php echo $_SESSION['state'] == 'MO' ? 'selected' : ''; ?>>MO</option>
							<option value="MT" <?php echo $_SESSION['state'] == 'MT' ? 'selected' : ''; ?>>MT</option>
							<option value="NE" <?php echo $_SESSION['state'] == 'NE' ? 'selected' : ''; ?>>NE</option>
							<option value="NV" <?php echo $_SESSION['state'] == 'NV' ? 'selected' : ''; ?>>NV</option>
							<option value="NH" <?php echo $_SESSION['state'] == 'NH' ? 'selected' : ''; ?>>NH</option>
							<option value="NJ" <?php echo $_SESSION['state'] == 'NJ' ? 'selected' : ''; ?>>NJ</option>
							<option value="NM" <?php echo $_SESSION['state'] == 'NM' ? 'selected' : ''; ?>>NM</option>
							<option value="NY" <?php echo $_SESSION['state'] == 'NY' ? 'selected' : ''; ?>>NY</option>
							<option value="NC" <?php echo $_SESSION['state'] == 'NC' ? 'selected' : ''; ?>>NC</option>
							<option value="ND" <?php echo $_SESSION['state'] == 'ND' ? 'selected' : ''; ?>>ND</option>
							<option value="OH" <?php echo $_SESSION['state'] == 'OH' ? 'selected' : ''; ?>>OH</option>
							<option value="OK" <?php echo $_SESSION['state'] == 'OK' ? 'selected' : ''; ?>>OK</option>
							<option value="OR" <?php echo $_SESSION['state'] == 'OR' ? 'selected' : ''; ?>>OR</option>
							<option value="PA" <?php echo $_SESSION['state'] == 'PA' ? 'selected' : ''; ?>>PA</option>
							<option value="RI" <?php echo $_SESSION['state'] == 'RI' ? 'selected' : ''; ?>>RI</option>
							<option value="SC" <?php echo $_SESSION['state'] == 'SC' ? 'selected' : ''; ?>>SC</option>
							<option value="SD" <?php echo $_SESSION['state'] == 'SD' ? 'selected' : ''; ?>>SD</option>
							<option value="TN" <?php echo $_SESSION['state'] == 'TN' ? 'selected' : ''; ?>>TN</option>
							<option value="TX" <?php echo $_SESSION['state'] == 'TX' ? 'selected' : ''; ?>>TX</option>
							<option value="UT" <?php echo $_SESSION['state'] == 'UT' ? 'selected' : ''; ?>>UT</option>
							<option value="VT" <?php echo $_SESSION['state'] == 'VT' ? 'selected' : ''; ?>>VT</option>
							<option value="VA" <?php echo $_SESSION['state'] == 'VA' ? 'selected' : ''; ?>>VA</option>
							<option value="WA" <?php echo $_SESSION['state'] == 'WA' ? 'selected' : ''; ?>>WA</option>
							<option value="WV" <?php echo $_SESSION['state'] == 'WV' ? 'selected' : ''; ?>>WV</option>
							<option value="WI" <?php echo $_SESSION['state'] == 'WI' ? 'selected' : ''; ?>>WI</option>
							<option value="WY" <?php echo $_SESSION['state'] == 'WY' ? 'selected' : ''; ?>>WY</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="city" class="<?php echo isset($_SESSION['validation_errors']['city']) ? 'text-danger' : ''; ?>">
                            * <?php echo isset($_SESSION['validation_errors']['city']) ? $_SESSION['validation_errors']['city'] : 'City'; ?>
                        </label>
						<input type="text"
                               value="<?php echo $_SESSION['city'] ?? ''; ?>"
                               name="city"
                               id="city"
                               class="form-control"
                               placeholder="City"
                               required />
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="zip_code" class="<?php echo isset($_SESSION['validation_errors']['zip_code']) ? 'text-danger' : ''; ?>">
                            * <?php echo isset($_SESSION['validation_errors']['zip_code']) ? $_SESSION['validation_errors']['zip_code'] : 'Zip code'; ?>
                        </label>
						<input type="number"
                               value="<?php echo $_SESSION['zip_code'] ?? ''; ?>"
                               name="zip_code"
                               id="zip_code"
                               class="form-control"
                               placeholder="Zip code"
                               required />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label for="email" class="<?php echo isset($_SESSION['validation_errors']['email']) ? 'text-danger' : ''; ?>">
                            * <?php echo isset($_SESSION['validation_errors']['email']) ? $_SESSION['validation_errors']['email'] : 'Email'; ?>
                        </label>
						<input type="email"
                               value="<?php echo $_SESSION['email'] ?? ''; ?>"
                               name="email"
                               id="email"
                               class="form-control"
                               placeholder="Email"
                               required />
					</div>
				</div>
				<div class="col-md-4">
					<label for="phone" class="<?php echo isset($_SESSION['validation_errors']['phone']) ? 'text-danger' : ''; ?>">
                        * <?php echo isset($_SESSION['validation_errors']['phone']) ? $_SESSION['validation_errors']['phone'] : 'Phone'; ?>
                    </label>
					<input type="tel"
                           value="<?php echo $_SESSION['phone'] ?? ''; ?>"
                           name="phone"
                           id="phone"
                           class="form-control"
                           placeholder="Phone"
                           required />
				</div>
				<div class="col-md-3">
					<label for="ssn" class="<?php echo isset($_SESSION['validation_errors']['ssn']) ? 'text-danger' : ''; ?>">
                        * <?php echo isset($_SESSION['validation_errors']['ssn']) ? $_SESSION['validation_errors']['ssn'] : 'SSN'; ?>
                    </label>
					<input type="text"
                           value="<?php echo $_SESSION['ssn'] ?? ''; ?>"
                           name="ssn"
                           id="ssn"
                           class="form-control"
                           placeholder="SSN"
                           required />
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<label for="attachments" class="<?php echo isset($_SESSION['validation_errors']['attachments']) ? 'text-danger' : ''; ?>">
                        <?php echo isset($_SESSION['validation_errors']['attachments']) ? $_SESSION['validation_errors']['attachments'] : 'Attachments'; ?>
                    </label>
					<div id="files_drop_area" class="form-group">
						<p>Click here to select or drag and drop file(s) here</p>
						<input type="file"
                               id="attachments"
                               name="attachments[]"
                               multiple
                               style="display: none;">
					</div>
					<ul id="files_list"></ul>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 offset-md-4">
					<button type="submit" id="submit" class="btn btn-primary btn-block">Submit</button>
				</div>
			</div>

		</form>
	</div>
</div>

<div id="modal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center" style="background-color: <?php echo $_SESSION["mail_error"] ? "#f44336" : "#28a745"; ?>;">
                <div class="icon-box">
                    <i class="<?php echo $_SESSION["mail_error"] ? "fa fa-times" : "fa fa-check"; ?>"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4><?php echo $_SESSION["mail_error"] ? "Error!" : "Success!"; ?></h4>
                <p><?php echo $_SESSION["message"]; ?></p>
                <button class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>
	const fileDropArea = document.getElementById("files_drop_area");
	const fileInput = document.getElementById("attachments");
	const fileList = document.getElementById("files_list");

	fileDropArea.addEventListener("click", () => {
		fileInput.click();
	});

	// Prevent the default behavior of the browser when a file is dragged over the drop area
	fileDropArea.addEventListener("dragover", (e) => {
		e.preventDefault();
	});

	// Handle the drop event
	fileDropArea.addEventListener("drop", (e) => {
		e.preventDefault(); // Prevent the default behavior
		handleFiles(e.dataTransfer.files); // Pass the dropped files to the handleFiles function
	});

	fileInput.addEventListener("change", (e) => {
		handleFiles(e.target.files);
	});

	function handleFiles(files) {
		for (let i = 0; i < files.length; i++) {
			const file = files[i];
			const listItem = document.createElement("li");
			listItem.className = "file-item";
			listItem.innerHTML = `${file.name} <button class="btn btn-danger btn-sm" data-file="${file.name}" onclick="removeFile(this)"><i class="fa fa-remove"></i></button>`;
			fileList.appendChild(listItem);
		}
	}

	function removeFile(button) {
		const fileName = button.getAttribute("data-file");
		const listItem = button.parentElement;
		fileList.removeChild(listItem);
	}
</script>

<?php

if (isset($_SESSION["message"])) {
    echo '<script>$("#modal").modal("show");</script>';
}

unset($_SESSION["message"]);
unset($_SESSION["validation_errors"]);
unset($_SESSION["mail_error"]);

unset($_SESSION["first_name"]);
unset($_SESSION["middle_name"]);
unset($_SESSION["last_name"]);
unset($_SESSION["address"]);
unset($_SESSION["state"]);
unset($_SESSION["city"]);
unset($_SESSION["zip_code"]);
unset($_SESSION["email"]);
unset($_SESSION["phone"]);
unset($_SESSION["ssn"]);

?>

</body>
</html>