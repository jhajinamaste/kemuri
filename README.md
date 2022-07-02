<h1>Stock Trading Anazlyzer</h1>

<div>
  <b>Developer:</b> Shubham Kumar Jha
</div>
<br>
<div>
  <b>Brief Description</b>: This application contains a tool that analyzes the stock data and returns the maximum possible profit and minimum loss that the trader could have come accross.
</div>
<br>
<div>
  <h3>How to run</h3>
  To run this application follow the steps below:<br><br>
  <ol>
    <li>Create a database and import the SQL file.</li>
    <li>Go to the root directory of the application and open <i><b>functions.php</b></i> file.</li>
    <li>Update the database class with the details of your database <i>host</i>, <i>username</i> and <i>password</i>.</li>
    <li>Run the application on your local server. If you followed the steps correctly then you should see the application running without any errors.</li>
  </ol>
</div>
<br>
<div>
  <h3>How to use</h3>
  To use this application follow the steps below:<br><br>
  <ol>
    <li>When running for the first time you will see that the list under the field <i>Select Stock</i> is empty. Hence, you must supply the data to be able to use it.</li>
    <li>To supply the data go to the page <i>Upload File</i> from the Nav Menu on top.</li>
    <li>Browse the file to upload and click on upload button. The format only accepts <i>csv</i> files.</li>
    <li>Once the file is successfully uploaded you will get a successful alert message.</li>
    <li>Navigate back to the <i>Analyzer Tool</i> from the navigation menu, select the desired stock from the list and input a valid date range and click on <i>Analyze</i> button.</li>
    <li>If the inputs are correct and valid then you should see the analyzed data immediately. Else, you will receive an error alert message.</li>
  </ol>
</div>
<br>
<div>
  <h3>Features</h3>
  This amazing tool is enriched with the following features:<br><br>
  <ol>
    <li>A user friendly clean and elegant minimalistic UI.</li>
    <li>Responsive to mobile devices for screen width upto 480px.</li>
    <li>Beautiful and uniquely styled datepicker. Went a bit creative!</li>
    <li>Select2 plugin used for making Stock List dropdown searchable.</li>
    <li>Sweet Alert 2 plugin used for making alerts beautiful and more user friendly and interactive.</li>
    <li>Multiple date formats accepted from the CSV file. It changes to the database format (YYYY-MM-DD) in the background while insertion into the database.</li>
    <li>Object Oriented Programming (OOP) approach taken for building the tool.</li>
    <li>Unsorted CSV files are accepted. No matter which column lies in which position it will always be processed correctly.</li>
    <li>Beautiful pre loader with overlay added to give UI an additional charm.</li>
    <li>Checks for duplicate records using all fields Stock Name, Price and Date before inserting.</li>
    <li>Invalid price check added. If any price column in CSV file is invalid then the user will receive an error message along with the ID of the field where the error exists. The upload process will be aborted. Only files with correct price data are processed.</li>
    <li>CSV file type validation (MIME) done from the backend while uploading the file.</li>
 </ol>
</div>
