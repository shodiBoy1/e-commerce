<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>SI NO</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th> 
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_brand = "SELECT * FROM brands";
        $result_brand = mysqli_query($con, $select_brand);
        $number=0;
        while($row_cat=mysqli_fetch_assoc($result_brand)){
            $brand_id=$row_cat['brand_id'];
            $brand_title=$row_cat['brand_title'];
            $number++;
            ?>
            <tr class="text-center">
                <td><?php echo $number?></td>
                <td><?php echo $brand_title?></td>
                <td><a href='index.php?edit_brands=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_brands=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>






