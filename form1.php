<?php
include("connection1.php");
?>


<?php
      $age = "age";
      $dateofbirth = "dob";
      if (isset($_POST['dob']))
      { 
       $dateofbirth = $_POST['dob'];
       $today = date("y-m-d");
       $diff = date_diff(date_create($dateofbirth),date_create($today));
       $age = $diff->format('%y Years,%m Months, %d Days');
       /*echo "<script>alert('Your age is: $age');</script>"; */
      }
     ?>


     <?php
if(isset($_POST['save']))
{
	$reg      = $_POST['reg_no'];
	$rank     = $_POST['rank'];
	$name     = $_POST['name'];
	$dob      = $_POST['dob'];
	$age      = $_POST['age'];
	$doj      = $_POST['doj'];
	$unit     = $_POST['unit'];
	$ame      = $_POST['ame'];
	$ame_date = $_POST['ame_date'];
	$category = $_POST['category'];
	$lmc_date = $_POST['lmc_date'];
	$duration = $_POST['duration'];
	$due_date = $_POST['due_date'];
	$percent  = $_POST['percent'];
	$category = $_POST['category'];
	$diseases = $_POST['diseases'];
	
	$query = "INSERT INTO management(regt_no,rank,name,dob,age,doj,unit,ame_details,ame_date,category,lmc_date,duration,due_date,percentage_disability,category_after_lmc,diseases) VALUES ('$reg','$rank','$name','$dob','$age','$doj','$unit','$ame','$ame_date','$category','$lmc_date','$duration','$due_date','$percent','$category','$diseases')";

	$data = mysqli_query($conn,$query);

	if($data)
	{
		echo "Date saved into database";
	}
	else
	{
	    echo "Failed to save data";
	}
	
}
?>


     <?php
  if(isset($_POST['search']))

{
  $id  = $_POST['id'];
  $query = "SELECT * FROM management WHERE regt_no = '$id' ";
  $data = mysqli_query($conn,$query);

  $result = mysqli_fetch_assoc($data);

  $name = $result['name'];
  echo $name;
}
?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ANNUAL MEDICAL EXAMINATION</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>





	



	<div class="center">
		 <form  action="#" method="POST">
		<h1 class="heading">ANNUAL MEDICAL EXAMINATION</h1>	
    
	<div class="form">
        <div class="colm1">
        	<label class="a1"><b>Regimental no</b></label>
        	   <input type="text" name="reg_no" class="textfeild" name="id" placeholder="Enter Regimental no" value="<?php if(isset($_POST['search'])){echo $result['regt_no'];}?>">
        </div>
        
        <div class="colm1">
        <label class="a2"><b>Rank</b></label>
		<select  name="rank"  class="textfeild">
			<option value="Select Rank">Select Rank</option>
			<option value="Trademan">Trademan</option>
			<option value="ORS">ORS</option>
			<option value="SOS">SOS</option>
			<option value="Officers">Officers</option>
        </select>
        </div>	
        	 
        
        <div class="colm1">
        <label class="a1"><b>Full Name</b></label>
        <input type="text"  name="name" class="textfeild" name="" placeholder="Enter your Name" value="<?php if(isset($_POST['searchdata'])){echo htmlspecialchars ($result['name']);}?>">
        </div>		


        		
        <div class="colm1">			
        <label class="a2"><b>DOB</b></label>
        <div class="box">
        <input type="date" class="textfeild" name="dob" placeholder="Enter DOB" value="<?php echo htmlspecialchars($dateofbirth);?>>
        <button onclick="calculateAge()>Submit</button>
        </div>
                 	  
        
        <div class="colm1">	  
        <label class="a1"><b>Age</b></label>
        <input type="text" class="textfeild" name="age" placeholder="Enter your Age" value="<?php echo htmlspecialchars($age);?>">
        </div>	 
        	   

        <div class="colm1">
        <label class="a2"><b>DOJ</b></label>
        <div class="box">
        <input type="date" class="textfeild" name="doj" placeholder="Enter your DOJ">
        </div>
        
        
        	
        <div class="colm1"> 
        <label class="a1"><b>Unit</b></label>
        <input type="text" class="textfeild" name="unit" placeholder="Enter your unit">
        </div>	
             

        <div class="colm1">
        <label class="a2"><b>AME Details</b></label>
		<select name="ame" id="ame"  class="textfeild">
			<option>Select AME Details</option>
			<option>Done</option>
			<option>Not Done</option>
		</select>
        </div>


         <div class="colm1">
         <label class="a1"><b>Date of AME</b></label> 
         <div class="box">
         	<input type="date" name="ame_date" class="textfeild" name="" placeholder="Enter AME Date">
         </div>
         
        	
        	
        <div class="colm1">
        <label class="a2"><b>Details for Category</b></label>
        <select class="text" name="category">
			<option>S</option>
			<option>S1</option>
			<option>S2</option>
			<option>S3</option>
			<option>S4</option>
			<option>S5</option>
        </select>
	    <select class="text" name="category">
	    	<option>H</option>
			<option>H1</option>
			<option>H2</option>
			<option>H3</option>
			<option>H4</option>
			<option>H5</option>
      </select>

      <select class="text" name="category">
	    	<option>A</option>
			<option>A1</option>
			<option>A2</option>
			<option>A3</option>
			<option>A4</option>
			<option>A5</option>
      </select>

      <select class="text" name="category">
	    	<option>P</option>
			<option>P1</option>
			<option>P2</option>
			<option>P3</option>
			<option>P4</option>
			<option>P5</option>
      </select>

      <select class="text" name="category">
	    	<option>E</option>
			<option>E1</option>
			<option>E2</option>
			<option>E3</option>
			<option>E4</option>
			<option>E5</option>
      </select>
      <select class="text" name="category">
	    	<option>G</option>
			<option>G1</option>
			<option>G2</option>
			<option>G3</option>
			<option>G4</option>
			<option>G5</option>
      </select>
      </div>
        	
      
      <div class="colm1">
      <label class="a1"><b>Date of LMC</b></label>
      <div class="box">
      	<input type="date" class="textfeild" name="lmc_date" placeholder="">
      </div>


       <div class="colm1">
         <label class="a1"><b>Duration</b></label> 
         <div class="box">
         	<input type="number" class="textfeild" name="duration" placeholder="Enter Duration of LMC">
         </div>


          <div class="colm1">
         <label class="a1"><b>Due date</b></label> 
         <div class="box">
         	<input type="date" class="textfeild" name="due_date" placeholder="Enter Due Date">
         </div>



         <div class="colm1">
      <label class="a2"><b>Percentage of Disability</b></label>
      <input type="number" class="textfeild" name="percent" placeholder="">
      </div>




         <div class="colm1">
        <label class="a2"><b>Details for Category</b></label>
        <select class="text" name="category">
			<option>S</option>
			<option>S1</option>
			<option>S2</option>
			<option>S3</option>
			<option>S4</option>
			<option>S5</option>
        </select>
	    <select class="text" name="category">
	    	<option>H</option>
			<option>H1</option>
			<option>H2</option>
			<option>H3</option>
			<option>H4</option>
			<option>H5</option>
      </select>

      <select class="text" name="category">
	    	<option>A</option>
			<option>A1</option>
			<option>A2</option>
			<option>A3</option>
			<option>A4</option>
			<option>A5</option>
      </select>

      <select class="text" name="category">
	    	<option>P</option>
			<option>P1</option>
			<option>P2</option>
			<option>P3</option>
			<option>P4</option>
			<option>P5</option>
      </select>

      <select class="text" name="category">
	    	<option>E</option>
			<option>E1</option>
			<option>E2</option>
			<option>E3</option>
			<option>E4</option>
			<option>E5</option>
      </select>
      <select class="text" name="category">
	    	<option>G</option>
			<option>G1</option>
			<option>G2</option>
			<option>G3</option>
			<option>G4</option>
			<option>G5</option>
      </select> 
      </div>
         


         <div class="colm1">
      <label class="a2"><b>Diseases/Diagnosis</b></label>
      <input type="textarea" class="textfeild" name="diseases" placeholder="">
      </div>

         
      

       
      

      <div>
      <input type="submit" value="Search" name="searchdata" class="btn">
      <input type="submit" value="Save" name="save" class="btn" style="background-color: green;">
      <input type="submit" value="Modify" name="modify" class="btn" style="background-color: yellowgreen;">
      <input type="submit" value="Delete" name="delete" class="btn" style="background-color: skyblue;">
      <input type="submit" value="clear" name="clear" class="btn" style="background-color: orange;">
      </div>
	 
	 </div>
	</form>
</div>
   
             
       


      

</body>
</html>





























		
     <!--<div class="container1">
	 <p><label class="a1"><b>Regimental no</b></label><input type="text" class="textfeild" name="" placeholder="Enter Regimental no">
		
		<label class="a2"><b>Rank</b></label>
		<select class="textfeild">
			<option>Select Rank</option>
			<option>Trademan</option>
			<option>ORS</option>
			<option>SOS</option>
			<option>Officers</option>
        </select></p>
        
        <p><label class="a1"><b>Full Name</b></label><input type="text" class="textfeild" name="" placeholder="Enter your Name">
		<label class="a2"><b>DOB</b></label><input type="date" class="textfeild" name="" placeholder="Enter DOB"></p>

	
		<p><label class="a1"><b>Age</b></label><input type="text" class="textfeild" name="" placeholder="Enter your Age">
        <label class="a2"><b>DOJ</b></label><input type="date" class="textfeild" name="" placeholder="Enter your DOJ"></p>
    </div>	

   
    <div class="container2">
		<p><label class="a1"><b>Unit</b></label><input type="text" class="textfeild" name="" placeholder="Enter your unit">
		<label class="a2"><b>AME Details</b></label>
		<select class="textfeild">
			<option>Select AME Details</option>
			<option>Done</option>
			<option>Not Done</option>
		</select></p>
		
		<p><label class="a1"><b>Date of AME</b></label><input type="date" class="textfeild" name="" placeholder="Enter AME Date">
		<label class="a2"><b>Details for Category</b></label>
        <select class="text">
			<option>S</option>
			<option>S1</option>
			<option>S2</option>
			<option>S3</option>
			<option>S4</option>
			<option>S5</option>
        </select>
	    <select class="text">
	    	<option>H</option>
			<option>H1</option>
			<option>H2</option>
			<option>H3</option>
			<option>H4</option>
			<option>H5</option>
      </select>

      <select class="text">
	    	<option>A</option>
			<option>A1</option>
			<option>A2</option>
			<option>A3</option>
			<option>A4</option>
			<option>A5</option>
      </select>

      <select class="text">
	    	<option>P</option>
			<option>P1</option>
			<option>P2</option>
			<option>P3</option>
			<option>P4</option>
			<option>P5</option>
      </select>

      <select class="text">
	    	<option>E</option>
			<option>E1</option>
			<option>E2</option>
			<option>E3</option>
			<option>E4</option>
			<option>E5</option>
      </select><p>
     
      <p><label class="a1"><b>Date of Checkup</b></label><input type="date" class="textfeild" name="" placeholder="">
      <label class="a2"><b>Percentage of Disability</b></label><input type="text" class="textfeild" name="" placeholder=""></p>
    </div>
      <input type="submit" value="Search" name="" class="btn">
      <input type="submit" value="Save" name="" class="btn" style="background-color: green;">
      <input type="submit" value="Modify" name="" class="btn" style="background-color: yellowgreen;">
      <input type="submit" value="Delete" name="" class="btn" style="background-color: skyblue;">
      <input type="submit" value="clear" name="" class="btn" style="background-color: orange;">  -->

