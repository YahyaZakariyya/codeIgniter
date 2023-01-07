<?php include "header.php"; ?>
<div class="container">
<div class="row justify-content-between">
    <div class="col-auto">
        <h1><?php echo $heading; ?></h1>
    </div>
    <?php if($heading == 'USERS' or $heading == 'COURSES'){ ?>
    <div class="col-auto align-self-center">
        <a class="btn btn-dark" href="http://localhost/NSSC/index.php/admin/add?<?php if($heading=='USERS'){echo 'user_id';}else{echo 'course_id';} ?>">Add <?php echo $heading ?></a>
    </div>
    <?php } ?>
</div>
<table class="table border-clr-5 my-3 text-center table-hover">
<?php if(!empty($table)){ ?>
<thead class="bg-info">
    <tr>
        <?php
        $colums = array_keys($table[0]);
        foreach ($colums as $values){
            echo "<th>{$values}</th>";
        }
        if($heading == 'USERS' or $heading == 'COURSES'){
        ?>
        <th>EDIT</th>
        <?php } ?>
        <th>DELETE</th>
    </tr>
</thead>
<tbody>
    <?php foreach($table as $rows){
        echo "<tr>";
        foreach($rows as $cell){
            echo "<td>{$cell}</td>";
        }
        if($heading == 'USERS' or $heading == 'COURSES'){
    ?>
        <td><a href="<?php echo 'http://localhost/NSSC/index.php/admin/update?'.http_build_query([key($rows) => reset($rows)]); ?>"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a></td>
    <?php } ?>
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