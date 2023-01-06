<?php include "header.php"; ?>
<div class="container">
<div class="row justify-content-between">
    <div class="col-auto">
        <h1><?php echo $heading; ?></h1>
    </div>
    <?php if($heading == 'USERS' or $heading == 'COURSES'){ ?>
    <div class="col-auto align-self-center">
        <button class="btn btn-dark">Add <?php echo $heading ?></button>
    </div>
    <?php } ?>
</div>
<table class="table border-clr-5 my-3 text-center">
<?php if(!empty($table)){ ?>
<thead class="bg-info">
    <tr>
        <?php
        $colums = array_keys($table[0]);
        foreach ($colums as $values){
            echo "<th>{$values}</th>";
        }
        ?>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
</thead>
<tbody>
    <?php foreach($table as $rows){
        echo "<tr>";
        foreach($rows as $cell){
            echo "<td>{$cell}</td>";
        }
        
    ?>
        <td><a href="<?php echo 'http://localhost/NSSC/index.php/admin/update?'.http_build_query([key($rows) => reset($rows)]); ?>"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a></td>
        <td><a href="<?php echo 'http://localhost/NSSC/index.php/admin/delete?'.http_build_query([key($rows) => reset($rows)]); ?>"><i class="fa-sharp fa-solid fa-trash"></i></a></td=>
    <?php
        echo "</tr>";
    }
    ?>
</tbody>
<?php }else{
    echo "No {$heading}";
} ?>
</table>
</div>
<?php include "footer.php"; ?>