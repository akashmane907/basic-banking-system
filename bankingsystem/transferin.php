
<style>
  form {
    margin: 20px;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 4px;
  }
.button {
            display: inline-block;
            background-color: #4CAF50;
            border: none;
            color: #f0f5f6;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

  label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
  }

  input[type="text"],
  input[type="number"] {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
  }

  input[type="submit"] {
    display: inline-block;
    background-color: #4CAF50;
    border: none;
    color: #f0f5f6;
    padding: 12px 24px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>

<form action="transfer.php" method="POST">
  <input type="hidden" name="source_account" value="<?php echo $_GET['source_account']; ?>">

  <label for="destination_account">DESTINATION ACCOUNT NO.:</label>
  <input type="text" name="destination_account" id="destination_account" required>

  <label for="transfer_amount">ENTER AMOUNT TO TRANSFER :</label>
  <input type="number" name="transfer_amount" id="transfer_amount" required>

  <input type="submit" value="Transfer"> <a class="button" href="bs_table.php?source_account=' . $row['accountno'] . '">Back</a>
</form>

