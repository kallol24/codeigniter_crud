<!doctype html>
<html lang="en">
  <head>
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Form Validation</title>
  </head>
  <body>
  <div class="container">
    <div class="row">
    <div class="col align-self-center">
    <h3>Insert Delete and Update</h3>
    <form method="post" action="<?php echo base_url(); ?>main/form_validation">
      <?php
        if($this->uri->segment(2)=="inserted")
        {
          echo '<p class="text-success">Data Inserted</p>';
        }
        if($this->uri->segment(2)=="updated")
        {
          echo '<p class="text-success">Data Updated</p>';
        }
      ?>
    
    
    
    <?php
      if(isset($user_data))
      {
        foreach($user_data as $row)
        {
      ?>
      
       <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo $row->first_name; ?>"/>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $row->last_name; ?>"/>
        </div>
        <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" class="form-control"/>
        <input type="submit" name="update" value="Update" class="btn btn-primary"/>
    <?php
        }
      }
      else
      {
    ?>
    
  
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname">
            <span class="text danger"><?php echo form_error("firstname");?></span>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname">
            <span class="text danger"><?php echo form_error("lastname");?></span>
        </div>
        <input type="submit" name="insert" value="Insert" class="btn btn-primary"/>
    </div>
    </div>
    <?php
      }
    ?>
    </form>
    
    <div class="row mt-5">
      <div class="col align-self-center">
      <h3>Data</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col"> Delete</th>
              <th scope="col"> Edit</th>
            </tr>
          <thead>
          <tbody>
            <?php
              if($fetch_data->num_rows() > 0)
              {
                foreach($fetch_data->result() as $row)
                {
                  ?>
                    <tr>
                      <td><?php echo $row->id; ?></td>
                      <td><?php echo $row->first_name; ?></td>
                      <td><?php echo $row->last_name; ?></td>
                      <td><a href="<?php echo base_url(); ?>/main/delete_data/<?php echo $row->id; ?>" class="delete_data" id="<?php echo $row->id; ?>">Delete</a></td>
                      <td><a href="<?php echo base_url(); ?>/main/update_data/<?php echo $row->id; ?>">Edit</a></td>
                    </tr>
                  <?php
                }
              }
              else{
                ?> <tr><td colspan="3">No Data Found</td></tr> <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    <!-- <script>
        $(document).ready(function(){
          $('.delete_data').click(function(){
            var id = $(this).attr("id");
            if(confirm("Are you sure?")){
              window.location="<?php echo base_url(); ?>main/delete_data/"+id;
            }
            else{
              return false;
            }
          });
        });
    </script> -->

   
    
  </body>
</html>